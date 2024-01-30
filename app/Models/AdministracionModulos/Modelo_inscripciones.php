<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Modelo_inscripciones extends Model
{
    use HasFactory;



   public function mostrar_tabla_datos($tabla, $condiciones)
    {
        return DB::table($tabla)->whereRaw($condiciones)->get();
    }

public function mostrar_tabla_fila($tabla, $condiciones)
    {
        return DB::table($tabla)->whereRaw($condiciones)->first();
    }

     public function revisar_gestion_inscripcion($id_carrera, $condiciones = '')
    {
        return DB::table('habilitacion_gestion as g')
            ->join('habilitacion_inscripcion as i', 'g.id_habilitacion_gestion', '=', 'i.id_habilitacion_gestion')
            ->where('g.id_carrera', $id_carrera)
            ->where('g.estado_gestion', 1)
            ->whereRaw($condiciones)
            ->first();
    }

    public function revisar_mencion_estudiante($id_carrera, $id_estudiante)
    {
        // Revision de nivel
        $result = DB::table('nota_inscripcion as i')
            ->select('am.nivel')
            ->join('base_upea.asignatura_mencion as am', 'am.id', '=', 'i.id_asignatura_mencion')
            ->where('i.id_carrera', $id_carrera)
            ->where('i.id_estudiante', $id_estudiante)
            ->where('i.retiro_adicion', '1')
            ->whereRaw('IF(i.segundo_turno > 0, i.segundo_turno, i.nota_final) > 50')
            ->orderByDesc('am.nivel')
            ->first();

        if ($result && $result->nivel >= 6) {
            // Si corresponde mencion

            // Revision de mencion tomada
            $result = DB::table('carrera_mencion_estudiante as cm')
                ->select('m.nombre')
                ->join('base_upea.mencion as m', 'm.id', '=', 'cm.id_mencion')
                ->where('cm.id_carrera', $id_carrera)
                ->where('cm.id_estudiante', $id_estudiante)
                ->first();

            if ($result) {
                return $result->nombre;
            }

            // Listado de menciones
            $result = DB::table('base_upea.pensum as p')
                ->select('m.id as id_mencion', 'm.nombre as mencion', 'p.nombre as pensum')
                ->join('base_upea.mencion as m', 'm.pensum_id', '=', 'p.id')
                ->where('p.carrera_id', $id_carrera)
                ->where('m.estado', 'A')
                ->where('p.estado', 'A')
                ->where('m.nombre', '!=', 'AUXILIATURA')
                ->get();

            if ($result->count() > 0) {
                return $result;
            }
        }

        return false;
    }

      public function insertar_seleccion_mencion($datos_array)
    {
        $insert = DB::table('carrera_mencion_estudiante')->insert($datos_array);

        if ($insert) {
            return DB::getPdo()->lastInsertId();
        }

        return false;
    }
     public function lista_paralelos_habilitados($id_asignatura_mencion, $condition = '')
    {
        $query = DB::table('curso as cur')
            ->select(
                'cur.id_curso', 'cur.id_asignatura_mencion', 'cur.paralelo_curso', 'cur.turno_curso',
                'ges.gestion', 'ges.periodo',
                DB::raw("CONCAT_WS(' ', asidoc.persona, asidoc.paterno, asidoc.materno) as docente"),
                'carsed.sede'
            )
            ->join('base_upea.vista_mallas_curriculares as mc', 'mc.id', '=', 'cur.id_asignatura_mencion')
            ->join('habilitacion_gestion as hag', 'hag.id_habilitacion_gestion', '=', 'cur.id_habilitacion_gestion')
            ->join('base_upea.gestion as ges', 'ges.id', '=', 'hag.id_gestion')
            ->join('base_upea.vista_carrera_sede as carsed', 'carsed.id', '=', 'cur.id_carrera_sede')
            ->leftJoin('base_upea.vista_asignacion_control_docente as asidoc', 'asidoc.asignacion_id', '=', 'cur.id_asignacion')
            ->where('cur.estado_curso', '1')
            ->where('hag.estado_gestion', '1')
            ->where('mc.sigla_asignatura', function ($query) use ($id_asignatura_mencion) {
                $query->select('sigla_asignatura')
                    ->from('base_upea.vista_mallas_curriculares')
                    ->where('id', $id_asignatura_mencion)
                    ->groupBy('sigla_asignatura');
            })
            ->orderBy('cur.paralelo_curso');

        $results = $query->get();

        if ($results->count() > 0) {
            return $results;
        } else {
            return false;
        }
    }
 
function validacion_cursos_verano($id_carrera, $id_persona, $materias = '') {
    $h_gestion = DB::table('habilitacion_gestion')
        ->where('estado_gestion', '1')
        ->where('id_carrera', $id_carrera)
        ->first();
        
    $gestion = DB::table('base_upea.gestion')
        ->where('id', $h_gestion->id_gestion)
        ->first();
    
    if ($gestion->tipo_gestion == 'V') {
        // Verification of regular enrollment (enrolled in the previous academic term)
        $result = DB::table('vista_curso as cur')
            ->join('base_upea.gestion as ges', 'ges.id', '=', 'cur.id_gestion')
            ->join('base_upea.vista_carrera_sede as carsed', 'carsed.id', '=', 'cur.id_carrera_sede')
            ->join('nota_inscripcion as i', 'i.id_curso', '=', 'cur.id_curso')
            ->where('carsed.car_id', $id_carrera)
            ->whereRaw("ges.gestion = (SELECT SUBSTRING_INDEX(gestion, '-', 1) FROM base_upea.gestion WHERE id = '$h_gestion->id_gestion')")
            ->where('ges.periodo', 'II')
            ->where('i.id_estudiante', $id_persona)
            ->where('i.retiro_adicion', '1')
            ->count();

        if ($result == 0) {
            return "Estudiante No Regular: No se inscribió en la anterior gestión académica";
        }

        // Verification of consecutive levels in two levels
       $cadena = implode(',', $materias);
        
        $count = DB::table('base_upea.vista_mallas_curriculares')
            ->whereIn('id', $materias)
            ->where('carrera_id', $id_carrera)
            ->groupBy('nivel')
            ->havingRaw('COUNT(*) > 2')
            ->count();

        if ($count > 0) {
            $var = DB::table('base_upea.vista_mallas_curriculares')
                ->whereIn('id', $materias)
                ->where('carrera_id', $id_carrera)
                ->groupBy('nivel')
                ->pluck('nivel')
                ->implode(' - ');
            
            return "Varios Niveles: Los niveles no son consecutivos, se requiere por lo menos en dos niveles. Tiene para toma de materias los niveles $var";
        }

        // Verification of recovery / leveling / advancement by subject
    }

    // Control for summer term
    return false;
}
    

     public function validacion_cursos_verano_personalizada($id_carrera, $id_persona, $id_asimen)
    {
        $h_gestion = DB::table('habilitacion_gestion')
            ->where('estado_gestion', '1')
            ->where('id_carrera', $id_carrera)
            ->first();
        
        $gestion = DB::table('base_upea.gestion')
            ->where('id', $h_gestion->id_gestion)
            ->first();
        
        if ($gestion->tipo_gestion == 'V') {
            // Caso IAG
            // Listado de asignaturas cortas
            // $asig_largas = array('91','97','98','100','102','106','107','109','110','113','118','158','119','160','123','127');
            // $asig_largas = "91,97,98,100,102,106,107,109,110,113,118,158,119,160,123,127";
            
            // 1 Cantidad de inscripciones
            $inscripcionesCount = DB::table('curso as cur')
                ->join('nota_inscripcion as i', 'i.id_curso', '=', 'cur.id_curso')
                ->where('i.id_carrera', $id_carrera)
                ->where('cur.id_gestion', $h_gestion->id_gestion)
                ->where('i.id_estudiante', $id_persona)
                ->where('i.retiro_adicion', '1')
                ->count();

            if ($inscripcionesCount > 1) {
                return false; // "Cantidad de materias alcanzada para curso de verano.";
            }

            /* 
            // 2 Recuperación
            $recuperacionExists = DB::table('vista_curso as cur')
                ->join('base_upea.gestion as ges', 'ges.id', '=', 'cur.id_gestion')
                ->join('nota_inscripcion as i', 'i.id_curso', '=', 'cur.id_curso')
                ->where('i.id_carrera', $id_carrera)
                ->where('ges.gestion', DB::raw("(select SUBSTRING_INDEX(gestion, '-', 1) from base_upea.gestion where id='$h_gestion->id_gestion')"))
                ->where('ges.periodo', 'II')
                ->where('i.id_estudiante', $id_persona)
                ->where('cur.id_asignatura_mencion', $id_asimen)
                ->where(function ($query) {
                    $query->where('cur.segundo_turno', '>', 0)
                        ->orWhere('cur.nota_final', '<', 51)
                        ->orWhere('cur.nota_final', '>', 29);
                })
                ->where('i.retiro_adicion', '1')
                ->exists();

            if ($recuperacionExists) {
                return "RECUPERACION";
            }

            // Validación solo para asignaturas cortas
            if (!in_array($id_asimen, $asig_largas)) {
                // 3 Nivelación
                $nivelacion = DB::table('vista_curso as cur')
                    ->join('base_upea.gestion as ges', 'ges.id', '=', 'cur.id_gestion')
                    ->join('nota_inscripcion as i', 'i.id_curso', '=', 'cur.id_curso')
                    ->select('*', DB::raw('COUNT(nota_final) as cantidades'))
                    ->where('i.id_carrera', $id_carrera)
                    ->where('ges.gestion', DB::raw("(select SUBSTRING_INDEX(gestion, '-', 1) from base_upea.gestion where id='$h_gestion->id_gestion')"))
                    ->where('ges.periodo', 'II')
                    ->where('i.id_estudiante', $id_persona)
                    ->where(function ($query) {
                        $query->where('cur.segundo_turno', '>', 0)
                            ->orWhere('cur.nota_final', '>', 50);
                    })
                    ->where('i.retiro_adicion', '1')
                    ->groupBy('cur.nivel')
                    ->orderByDesc('cantidades')
                    ->first();

                if ($nivelacion && $nivelacion->cantidades > 3) {
                    return "NIVELACION";
                }

                // 4 Avance
                $avancePromedio = DB::table('nota_inscripcion')
                    ->where('id_carrera', $id_carrera)
                    ->where('id_estudiante', $id_persona)
                    ->where(function ($query) {
                        $query->where('segundo_turno', '>', 0)
                            ->orWhere('nota_final', '>', 50);
                    })
                    ->where('i.retiro_adicion', '1')
                    ->avg(DB::raw('IF(segundo_turno > 0, segundo_turno, nota_final)'));
                
                if ($avancePromedio > 74) {
                    return "AVANCE";
                }
            }
            
            // Ninguna opción encontrada
            return false;
            */
        }

        return true;
    }



 public function verificacion_estado_asignatura($id_asignatura_mencion, $id_estudiante, $id_carrera, $condition = '')
    {
        $result = DB::table('nota_inscripcion as ins')
            ->join('curso as cur', 'ins.id_curso', '=', 'cur.id_curso')
            ->leftJoin('habilitacion_gestion as ges', 'ges.id_gestion', '=', 'cur.id_gestion')
            ->whereIn('ins.id_asignatura_mencion', function ($query) use ($id_asignatura_mencion) {
                $query->select('id')
                    ->from('base_upea.vista_mallas_curriculares')
                    ->where('sigla_asignatura', function ($subQuery) use ($id_asignatura_mencion) {
                        $subQuery->select('sigla_asignatura')
                            ->from('base_upea.vista_mallas_curriculares')
                            ->where('id', $id_asignatura_mencion);
                    });
            })
            ->where('ges.estado_gestion', '1')
            ->where('ges.id_carrera', $id_carrera)
            ->where('ins.id_estudiante', $id_estudiante)
            ->whereRaw($condition)
            ->select('cur.id_curso', 'ins.id_nota_inscripcion', 'cur.turno_curso', 'cur.id_asignacion', 'ins.retiro_adicion')
            ->first();

        return $result ?: false;
    }


     public function insertar_inscripcion_estudiante($datos_array)
    {
        $inserted = DB::table('nota_inscripcion')->insertGetId($datos_array);

        if ($inserted) {
            return $inserted;
        }

        return false;
    }

       public function modificar_inscripcion_estudiante($datos_array, $id_nota_inscripcion)
    {
        return DB::table('nota_inscripcion')
            ->where('id_nota_inscripcion', $id_nota_inscripcion)
            ->update($datos_array);
    }

    /****
primera parte de validaciones de inscripciones
regis
***/
 public function MateriasAprobadas($CodPersona)
    {
        $result = DB::table('nota_inscripcion as i')
            ->join('base_upea.vista_mallas_curriculares as m', 'm.id', '=', 'i.id_asignatura_mencion')
            ->where('i.id_estudiante', $CodPersona)
            ->where(function ($query) {
                $query->where('i.segundo_turno', '>', 0)
                    ->orWhere('i.nota_final', '>', 50);
            })
            ->where('i.retiro_adicion', '1')
            ->orderByDesc('m.numero_plan')
            ->orderByDesc('m.nivel')
            ->select('i.id_curso', 'i.id_asignatura_mencion', 'm.numero_plan', 'm.nivel')
            ->get();

        return $result;
    }

    public function MateriasNoAprobadas($CodPersona, $Aprobadas, $carrera_id = '')
    {
        $aprobadassql = [];
        $num_plan_ultimo_aprobado = '';

        if (!empty($Aprobadas)) {
            $num_plan_ultimo_aprobado = $Aprobadas[0]->numero_plan;

            foreach ($Aprobadas as $value) {
                $dat = $this->validacionPlanesEstudioAprob($CodPersona, $value->id_asignatura_mencion, $carrera_id);

                if ($dat) {
                    $casus = DB::table('base_upea.vista_mallas_curriculares')
                        ->selectRaw("replace(sigla_asignatura, ' ', '') as sigla_asignatura")
                        ->where('id', $dat)
                        ->value('sigla_asignatura');

                    if (!empty($casus)) {
                        $aprobadassql[] = $casus;
                    }

                    $casu = DB::table('base_upea.vista_mallas_curriculares')
                        ->selectRaw("replace(sigla_asignatura, ' ', '') as sigla_asignatura")
                        ->where('id', $value->id_asignatura_mencion)
                        ->value('sigla_asignatura');

                    if (!empty($casu)) {
                        $aprobadassql[] = $casu;
                    }
                } else {
                    $casu = DB::table('base_upea.vista_mallas_curriculares')
                        ->selectRaw("replace(sigla_asignatura, ' ', '') as sigla_asignatura")
                        ->where('id', $value->id_asignatura_mencion)
                        ->value('sigla_asignatura');

                    if (!empty($casu)) {
                        $aprobadassql[] = $casu;
                    }
                }
            }
        }

        $this->session->set_userdata('numero_plan_estudiante', $num_plan_ultimo_aprobado);

        $query = DB::table('base_upea.vista_mallas_curriculares')
            ->select('id')
            ->where('carrera_id', $carrera_id)
            ->whereBetween('nivel', [1, 10])
            ->where(function ($query) use ($aprobadassql, $num_plan_ultimo_aprobado) {
                if (!empty($aprobadassql)) {
                    $query->whereNotIn(DB::raw("replace(sigla_asignatura, ' ', '')"), $aprobadassql)
                        ->where('numero_plan', $num_plan_ultimo_aprobado);
                }
            })
            ->orderBy('optativa')
            ->orderBy('nivel')
            ->orderBy('mencion')
            ->orderBy('sigla_asignatura')
            ->get();

        return $query;
    }
     private function validacionPlanesEstudioAprob($CodPersona, $asimen_id, $id_carrera)
    {
        $sql = "SELECT id_anterior_asimen, id_actual_asimen
                FROM base_upea.inno_convalcom
                WHERE id_anterior_asimen=$asimen_id
                AND carreras_id='$id_carrera'
                ";

        $query = DB::select($sql);

        if (!empty($query)) {
            foreach ($query as $row) {
                $sqlb = "SELECT id_curso, nota_final, segundo_turno, id_asignatura_mencion
                        FROM nota_inscripcion n
                        inner join base_upea.vista_mallas_curriculares v on v.id=n.id_asignatura_mencion 
                        WHERE id_estudiante='$CodPersona' 
                        and v.sigla_asignatura = (select m.sigla_asignatura from base_upea.vista_mallas_curriculares m where m.id='$row->id_anterior_asimen' )
                        and IF(segundo_turno>0, segundo_turno, nota_final)>50
                        ";
                
                $queryb = DB::select($sqlb);

                if (!empty($queryb)) {
                    $id_asimen_final = $row->id_actual_asimen;

                    $que = DB::table('base_upea.pensum')
                        ->where('carrera_id', $id_carrera)
                        ->orderBy('numero_plan', 'desc')
                        ->get();

                    foreach ($que as $rgs) {
                        $sqlconva = "SELECT id_anterior_asimen, id_actual_asimen FROM base_upea.inno_convalcom WHERE id_anterior_asimen='$id_asimen_final' AND carreras_id='$id_carrera'";
                        $conva = DB::select($sqlconva)[0];

                        if (!empty($conva)) {
                            $id_asimen_final = $conva->id_actual_asimen;
                        } else {
                            break;
                        }
                    }

                    return $id_asimen_final;
                }
            }
        }

        return false;
    }
    public function materias_para_inscripcion($id_persona, $id_carrera = '')
    {
        // Materias que un estudiante no ha vencido aún
        $Aprobadas = $this->MateriasAprobadas($id_persona); // Devuelve asignacion_id de innova

        $NoAprobadas = $this->MateriasNoAprobadas($id_persona, $Aprobadas, $id_carrera);

        $Inscribir = array();

        foreach ($NoAprobadas as $m) {
            if ($this->InscripcionHabilitada($id_persona, $m->id)) {
                $Inscribir[] = $m->id;
            }
        }

        // 3. Dos niveles consecutivos en base al nivel más bajo (general)
        $Inscribir = $this->validacion_niveles_consecutivos($id_persona, $Inscribir, $id_carrera);

        return $Inscribir;
    }

     private function InscripcionHabilitada($CodPersona, $Asignatura)
    {
        // Case 1: Only verification of prerequisites
        return $this->PrerequisitosAprobados($CodPersona, $Asignatura);
    }

    private function PrerequisitosAprobados($CodPersona, $Asignatura)
    {
        $Aprobado = false;
        $sql = "SELECT id_prerequisito_asignatura_mencion
                FROM base_upea.prerequisito_asignatura_mencion
                WHERE id_asignatura_mencion=$Asignatura";

        $query = DB::select($sql);

        if (empty($query)) {
            $Aprobado = true;
        }

        if (!empty($query)) {
            foreach ($query as $row) {
                $datos = $this->Aprobacion($CodPersona, $row->id_prerequisito_asignatura_mencion);

                if ($datos === false) {
                    $optativa = DB::select("SELECT id,observacion, optativa FROM base_upea.asignatura_mencion WHERE id=$Asignatura and optativa='S'")[0] ?? null;

                    if (!empty($optativa)) {
                        $caso = DB::select("SELECT id_prerequisito_asignatura_mencion FROM base_upea.prerequisito_asignatura_mencion WHERE id_asignatura_mencion=$Asignatura and id_prerequisito_asignatura_mencion IN (select id_asignatura_mencion from nota_inscripcion where id_estudiante='$CodPersona' and IF(segundo_turno>0,segundo_turno, nota_final)>50 and retiro_adicion='1')")[0] ?? null;
                        
                        if (empty($caso)) {
                            $Aprobado = true;
                        } else {
                            $Aprobado = true;
                        }
                    } else {
                        $Aprobado = false;
                        return $Aprobado;
                    }
                } elseif ($datos === true) {
                    $Aprobado = true;
                }
            }
        }

        return $Aprobado;
    }


     private function Aprobacion($CodPersona, $asimen_id)
    {
        $sqlb = "SELECT id_curso, nota_final,segundo_turno 
                FROM nota_inscripcion 
                WHERE id_estudiante='$CodPersona' and id_asignatura_mencion in 
                    (select id from base_upea.vista_mallas_curriculares where sigla_asignatura=(select sigla_asignatura from base_upea.vista_mallas_curriculares where id='$asimen_id')) and IF(segundo_turno>0, segundo_turno, nota_final)>50 and retiro_adicion='1'";
        
        $queryb = DB::select($sqlb);

        if (!empty($queryb)) {
            return true;
        } else {
            $datos = $this->validacionPlanesEstudio($CodPersona, $asimen_id);

            if ($datos === true) {
                return true;
            }
            
            return false;
        }
    }

     private function validacionPlanesEstudio($CodPersona, $asimen_id)
    {
        $asimen_idALT = 0;

        regis:
            $sql = "SELECT id_anterior_asimen
                    FROM base_upea.inno_convalcom
                    WHERE id_actual_asimen=$asimen_id";

            $query = DB::select($sql);

            if (!empty($query)) {
                foreach ($query as $row) {
                    $sqlb = "SELECT id_curso, segundo_turno, nota_final, id_asignatura_mencion
                            FROM nota_inscripcion
                            WHERE id_estudiante='$CodPersona' 
                            and id_asignatura_mencion='$row->id_anterior_asimen'
                            and IF(segundo_turno>0,segundo_turno, nota_final)>50
                            and retiro_adicion='1'";
                    
                    $queryb = DB::select($sqlb);

                    if (!empty($queryb)) {
                        return true;
                    } else {
                        $asimen_id = $row->id_anterior_asimen;
                    }
                }

                goto regis;
            }

        return false;
    }


private function validacion_niveles_consecutivos($id_persona, $inscribir, $id_carrera) {
    $ins_new = [];

    if (!empty($inscribir)) {
        $cadena = implode(',', $inscribir);

        $materias = DB::table('vista_mallas_curriculares')
            ->whereIn('id', $inscribir)
            ->orderBy('optativa')
            ->orderBy('nivel')
            ->get(['nivel', 'id']);

        $nivel = 0;
        $conta = 0;

        foreach ($materias as $val) {
            if ($val->nivel != $nivel) {
                $conta++;
                $nivel = $val->nivel;
            }
            $ins_new[] = $val->id;
        }

        session(['materias' => $cadena]);

        $nivelMaxAgro = DB::table('vista_mallas_curriculares')
            ->whereIn('id', $inscribir)
            ->where('optativa', 'N')
            ->groupBy('nivel')
            ->orderByDesc(DB::raw('count(*)'))
            ->value('nivel');

        session(['nivel_max_agro' => $nivelMaxAgro]);
    }

    return $ins_new;
}

      public function rgs_securyty($id_curso, $id_carrera, $id_estudiante, $id_e)
    {
        if ($id_estudiante != ($id_e - 1158)) {
            DB::table('dp_auth_users')
                ->where('id_persona', $id_estudiante)
                ->where('carrera_id', $id_carrera)
                ->update(['active' => '0']);

            Auth::logout();
        }

        if (empty($id_curso)) {
            DB::table('dp_auth_users')
                ->where('id_persona', $id_estudiante)
                ->where('carrera_id', $id_carrera)
                ->update(['active' => '0']);

            Auth::logout();
        }

        $sql = "SELECT id_curso
                FROM curso c
                inner join habilitacion_gestion hg on hg.id_habilitacion_gestion=c.id_habilitacion_gestion
                WHERE c.id_curso='$id_curso'
                AND hg.estado_gestion='1'
                AND hg.id_carrera='$id_carrera'";
        $query = DB::select($sql);

        if (empty($query)) {
            DB::table('dp_auth_users')
                ->where('id_persona', $id_estudiante)
                ->where('carrera_id', $id_carrera)
                ->update(['active' => '0']);

            Auth::logout();
        }
    }




}

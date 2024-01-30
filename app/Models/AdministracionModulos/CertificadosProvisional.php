<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdministracionModulos\SiadiInscripcion;
use DB;

class CertificadosProvisional extends Model
{
    use HasFactory;
    protected $table = 'certificados_provisional';
    protected $primaryKey = 'id_certificado_provisional';

    

    # Persona o usaurio que tiene si o si un certificado
    # $id = certificados_provisional.id_certificado_provisional
    public function get_data_certifcado($id){
        $query = $this->base_query_certificado();
        $query->where('certificados_provisional.id_certificado_provisional', '=', $id);
        $certificado = $query->first();
        return $certificado;
    }

    public function get_data_estudiante_inscrito_aprobado($id_inscripcion){
        $query = $this->base_query_data_inscripcion_aprobado();
        $query->where('siadi_notas.id_inscripcion', $id_inscripcion);
        return $query->first();
    }



    public function get_data_certificado_by_asignatura($id_gestion, $periodo, $id_convocatoria, $id_asignatura){
        $query = $this->base_query_certificado();
        $query->where([
            "siadi_convocatorias.id_gestion" => $id_gestion, 
            'periodo' => $periodo,
            'siadi_convocatorias.id_siadi_convocatoria' => $id_convocatoria
        ]);
        $query->where('siadi_planificar_asignaturas.id_siadi_asignatura', $id_asignatura);
        return $query->get();
    }

    public function get_data_certificado_by_planificar_asignatura($id_gestion, $periodo, $id_convocatoria, $id_planificar_asignatura){
        $query = $this->base_query_certificado();
        $query->where([
            "siadi_convocatorias.id_gestion" => $id_gestion, 
            'periodo' => $periodo,
            'siadi_convocatorias.id_siadi_convocatoria' => $id_convocatoria
        ]);
        $query->where('siadi_planificar_asignaturas.id_planificar_asignatura', $id_planificar_asignatura);
        return $query->get();
    }

    public function get_data_certificado_by_planificar_certificado($id_planificar_asignatura){
        $consulta = $this->base_query_certificado();
        $consulta->where('siadi_planificar_asignaturas.id_planificar_asignatura', '=', $id_planificar_asignatura)
            ->orderBy('siadi_personas.paterno_persona')
            ->orderBy('siadi_personas.materno_persona')
            ->orderBy('siadi_personas.nombres_persona');
        return $consulta->get();
    }

    /*
    * $agruparParalelos -> false: sin agrupar; true: agrupa por id_planificar_asignatura
    * $solo_asignatura -> 0: mustra todas las asignaturas; caso contrario: se condicionan por id_siadi_asignatura
    * $soloNulos -> false: muestra los que tienen y no tienen certificados_provisional; true: solamente los que no generaron certificados_provisional
    */
    public function get_data_lote_aprobado_agrupar($agruparParalelos = false, $solo_asignatura = 0, $soloNulos = false, $id_gestion, $periodo, $id_convocatoria){
        DB::statement("SET SQL_MODE=''");
        $query = $this->base_query_data_inscripcion_aprobado();
        if($agruparParalelos==true){
            $query->addSelect(
                DB::raw("COUNT(siadi_notas.id_inscripcion) AS inscritos_con_nota"),
                DB::raw("COUNT(certificados_provisional.id_certificado_provisional) AS con_certificados"),
                DB::raw("GROUP_CONCAT(siadi_notas.id_inscripcion SEPARATOR ',') AS ids_inscripcion_con_nota"),
                DB::raw("GROUP_CONCAT(certificados_provisional.id_certificado_provisional SEPARATOR ',') AS ids_certificados_con_certificado")
            );
            # revisar 
            $query->groupBy("siadi_planificar_asignaturas.id_planificar_asignatura");
        }
        $query->where([
            "siadi_convocatorias.id_gestion" => $id_gestion, 
            'periodo' => $periodo,
            'siadi_convocatorias.id_siadi_convocatoria' => $id_convocatoria
        ]);
        if($solo_asignatura!==0){
            $query->where('siadi_planificar_asignaturas.id_siadi_asignatura', $solo_asignatura); # $this->asignaturaActual
        }

        if($soloNulos){
            $query->whereNull('certificados_provisional.id_nota');
        }
        $query->orderBy("siadi_planificar_asignaturas.id_planificar_asignatura")
              ->orderBy("siadi_planificar_asignaturas.id_paralelo");
        return $query->get();
    }


    private function base_query_certificado(){
        $query = DB::table('certificados_provisional');
        $this->joinTables_01($query);
        
        $query->select(
            'certificados_provisional.id_certificado_provisional',
            'certificados_provisional.tipo_curso',
            'certificados_provisional.numero_siadi_certificado_prov',
            'certificados_provisional.gestion',
            'certificados_provisional.fecha_siadi_certificado AS fecha',
            'certificados_provisional.estado_siadi_certificado_provisional',
            DB::raw("CONCAT(certificados_provisional.tipo_curso, certificados_provisional.numero_siadi_certificado_prov, '/', certificados_provisional.gestion) AS codigo_certificado_provisional")
        );
        $this->addColumnsPersonaCertificado($query);
        $this->addColumnNotaCertificado($query);
        $this->addColumnMateriasCertificado($query);
        $this->addColumnModalidadCertificado($query);
        $this->addColumnCargaHorariaCertificado($query);
        $this->addColumnSugeridoInicialNotas($query);
        $this->addColumnsGestion($query);
        $this->addColumnEsTGNYTieneCertificado($query);
        #$this->addColumnDataQrCertificado($query);

        $this->addWhereStatus_02_all($query);
        $this->addWhereAprobados($query);
        $this->addWhereNotConvalidacionHomologacion($query);
        return $query;
    }

    private function base_query_data_inscripcion_aprobado(){
        $query = DB::table('siadi_inscripcions');
        $this->joinTables_02($query);

        $query->select(
            'siadi_inscripcions.id_inscripcion'
        );
        $this->addColumnsPersonaCertificado($query);
        $this->addColumnNotaCertificado($query);
        $this->addColumnMateriasCertificado($query);
        $this->addColumnModalidadCertificado($query);
        $this->addColumnCargaHorariaCertificado($query);
        $this->addColumnSugeridoInicialNotas($query);
        $this->addColumnsGestion($query);
        $this->addColumnCursoDetalles($query);

        $this->addWhereStatus_02_all($query);
        $this->addWhereAprobados($query);
        $this->addWhereNotConvalidacionHomologacion($query);
        return $query;
    }


    /*
SELECT CAST(numero_siadi_certificado_prov AS UNSIGNED) AS numero
FROM certificados_provisional
WHERE CHAR_LENGTH(numero_siadi_certificado_prov) = 4
  AND CAST(numero_siadi_certificado_prov AS UNSIGNED) IS NOT NULL
  AND CAST(numero_siadi_certificado_prov AS UNSIGNED) > 0
  AND gestion = '2022'
GROUP BY numero
ORDER BY numero; 
     */
    public function get_numeros_disponibles($anio){
        $min = 1;
        $max = 5000;

        $ocupados = DB::table('certificados_provisional')
            ->select(
                DB::raw("CAST(numero_siadi_certificado_prov AS UNSIGNED) AS numero")
            )
            ->where(DB::raw("CHAR_LENGTH(numero_siadi_certificado_prov)"), '=', '4')
            ->whereNotNull(DB::raw("CAST(numero_siadi_certificado_prov AS UNSIGNED)"))
            ->where(DB::raw("CAST(numero_siadi_certificado_prov AS UNSIGNED)"), '>', 0)
            ->where('gestion', '=', $anio)
            ->distinct()
            ->orderBy('numero')
            ->get();

        $min = 0;
        $max = 2000;
        $nuevo = [];
        $continua = false; 
        if(count($ocupados)> 0){
            $anterior = 0; 
            $ultimo = $inicia = null; 
            if($ocupados[0]->numero==($anterior+1)){
                    $continua = true;
            } else {
                $ultimo = $ocupados[0]->numero;#+1;
                $nuevo[] = "1-". $ocupados[0]->numero-1;
            }
            $anterior = $ocupados[0]->numero;
            
            for($i=1; $i<count($ocupados); $i++){
                #echo $continua. " i:$inicia, u:$ultimo >> a:$anterior, ac:", $ocupados[$i]. "\n";
                if($continua==false){
                        if(($anterior+1) == $ocupados[$i]->numero){
                        $continua = true;
                    }
                    if($continua==true){
                        $ultimo = $ocupados[$i]->numero;
                    } else {
                        #echo "-----$ultimo-". $ocupados[$i] ."\n";
                        $nuevo[] = ($ultimo+1) .'-'. ($ocupados[$i]->numero-1);
                        $ultimo = $ocupados[$i]->numero;
                    }
                } else {
                    if(($anterior+1) !== $ocupados[$i]->numero){
                    
                        $continua = false;
                        #echo "->>$anterior-". $ocupados[$i] ."\n";
                        $nuevo[] = ($anterior+1) .'-'. $ocupados[$i]->numero-1;
                        $ultimo = $ocupados[$i]->numero;
                    }
                }
                $anterior = $ocupados[$i]->numero;
            }
            #echo "Est ". $continua . " ". $anterior ."\n";
            $nuevo[] = ($anterior+1) ."-". $max;
        } else {
            $nuevo[] = "1-". $max;
        }
        
        return $nuevo; #$disponibles
    }




    # ********************************** funciones privadas para campos que mostrar *****************************

    # FROM certificados_provisional 
    private function joinTables_01($query){
        $query->join('siadi_notas', 'siadi_notas.id_nota', '=', 'certificados_provisional.id_nota')
            ->join('siadi_inscripcions', 'siadi_inscripcions.id_inscripcion', '=', 'siadi_notas.id_inscripcion')
            ->join('siadi_personas', 'siadi_personas.id_siadi_persona', '=', 'siadi_inscripcions.id_siadi_persona')
            ->join('siadi_planificar_asignaturas', 'siadi_planificar_asignaturas.id_planificar_asignatura', '=', 'siadi_inscripcions.id_planificar_asignatura')
            ->join('siadi_asignaturas', 'siadi_asignaturas.id_siadi_asignatura', '=', 'siadi_planificar_asignaturas.id_siadi_asignatura')
            ->join('siadi_nivel_idiomas', 'siadi_nivel_idiomas.id_nivel_idioma', '=', 'siadi_asignaturas.id_nivel_idioma')
            ->join('siadi_idiomas', 'siadi_idiomas.id_idioma', '=', 'siadi_asignaturas.id_idioma')
            ->join('siadi_paralelos', 'siadi_paralelos.id_paralelo', '=', 'siadi_planificar_asignaturas.id_paralelo')
            ->join('siadi_convocatorias', 'siadi_convocatorias.id_siadi_convocatoria', '=', 'siadi_planificar_asignaturas.id_siadi_convocatoria')
            ->join('siadi_gestions', 'siadi_gestions.id_gestion', '=', 'siadi_convocatorias.id_gestion')
            ->join('siadi_modalidad_curso', 'siadi_modalidad_curso.id_convocartoria_estudiante', '=', 'siadi_convocatorias.id_modalidad_curso')
            ->join('siadi_costos', 'siadi_costos.id_costo', '=', 'siadi_convocatorias.id_costo');
    }

    # FROM siadi_inscripcion
    private function joinTables_02($query){
        $query->join('siadi_notas', 'siadi_inscripcions.id_inscripcion', '=', 'siadi_notas.id_inscripcion')
            ->join('siadi_personas', 'siadi_personas.id_siadi_persona', '=', 'siadi_inscripcions.id_siadi_persona')
            ->join('siadi_planificar_asignaturas', 'siadi_planificar_asignaturas.id_planificar_asignatura', '=', 'siadi_inscripcions.id_planificar_asignatura')
            ->join('siadi_asignaturas', 'siadi_asignaturas.id_siadi_asignatura', '=', 'siadi_planificar_asignaturas.id_siadi_asignatura')
            ->join('siadi_nivel_idiomas', 'siadi_nivel_idiomas.id_nivel_idioma', '=', 'siadi_asignaturas.id_nivel_idioma')
            ->join('siadi_idiomas', 'siadi_idiomas.id_idioma', '=', 'siadi_asignaturas.id_idioma')
            ->join('siadi_paralelos', 'siadi_paralelos.id_paralelo', '=', 'siadi_planificar_asignaturas.id_paralelo')
            ->join('siadi_convocatorias', 'siadi_convocatorias.id_siadi_convocatoria', '=', 'siadi_planificar_asignaturas.id_siadi_convocatoria')
            ->join('siadi_gestions', 'siadi_gestions.id_gestion', '=', 'siadi_convocatorias.id_gestion')
            ->join('siadi_modalidad_curso', 'siadi_modalidad_curso.id_convocartoria_estudiante', '=', 'siadi_convocatorias.id_modalidad_curso')
            ->join('siadi_costos', 'siadi_costos.id_costo', '=', 'siadi_convocatorias.id_costo')

            ->LeftJoin('certificados_provisional', 'certificados_provisional.id_nota', '=', 'siadi_notas.id_nota');
    }


   /*  private function addColumnDataQrCertificado($query){
        $query->addSelect(
            DB::raw("CONCAT(
                certificados_provisional.codigo_siadi_certificado, '|',
                ci_persona, '-', expedido_persona, '|',
                UPPER(CONCAT(CASE paterno_persona WHEN '' THEN '' ELSE concat(paterno_persona, '-') END, CASE materno_persona WHEN '' THEN '' ELSE concat(materno_persona, '-') END, nombres_persona)), '|',
                REPLACE( CONCAT(siadi_idiomas.nombre_idioma, '-',siadi_nivel_idiomas.descripcion_nivel_idioma , '-', siadi_nivel_idiomas.nombre_nivel_idioma), ' ', '-'), '|',
                REPLACE( siadi_notas.nro_carpeta_nota, ' ', '-'), '|',
                'NOTA-', siadi_notas.final_nota
            ) AS codigo_qr")
        );
    } */

    private function addColumnsPersonaCertificado($query){
        $query->addSelect(
            DB::raw("CONCAT(ci_persona, ' ', expedido_persona) AS ci"),
            DB::raw("UPPER(CONCAT(CASE paterno_persona WHEN '' THEN '' ELSE concat(paterno_persona, ' ') END, CASE materno_persona WHEN '' THEN '' ELSE concat(materno_persona, ' ') END, nombres_persona)) AS nombres_persona"),
            'siadi_personas.pais_persona',
            'siadi_personas.genero_persona'
        );
    }

    private function addColumnMateriasCertificado($query){
        $query->addSelect(
            DB::raw("CONCAT(siadi_idiomas.nombre_idioma, ' ',siadi_nivel_idiomas.descripcion_nivel_idioma , ' ', siadi_nivel_idiomas.nombre_nivel_idioma) AS materia"),
            DB::raw("CONCAT(siadi_idiomas.sigla_codigo_idioma, ' ', siadi_idiomas.nombre_idioma, ' ',siadi_nivel_idiomas.descripcion_nivel_idioma , ' ', siadi_nivel_idiomas.nombre_nivel_idioma) AS idioma"),
            "siadi_nivel_idiomas.nombre_nivel_idioma"
        );
    }

    private function addColumnNotaCertificado($query){
        $query->addSelect(
            'siadi_notas.id_nota',
            'siadi_notas.final_nota',
            'siadi_notas.nro_folio_nota',
            'siadi_notas.nro_carpeta_nota' # nro de libro
        );
    }

    private function addColumnModalidadCertificado($query){
        $query->addSelect(
            DB::raw("CASE 
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante=2 THEN 'EXAMEN DE SUFICIENCIA (AUTOFINANCIADO)'
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante IN(3, 6, 7, 8) THEN SUBSTRING_INDEX(siadi_modalidad_curso.nombre_convocatoria_estudiante, ' ', 1)
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 'CURSO REGULAR'
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante=1 THEN CONCAT(siadi_modalidad_curso.nombre_convocatoria_estudiante, ' (', siadi_costos.tipo_costo, ')')
                    ELSE siadi_modalidad_curso.nombre_convocatoria_estudiante
                END AS modalidad"),
            'siadi_modalidad_curso.nombre_convocatoria_estudiante',
            DB::raw("CASE
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante IN(3, 6, 7, 8) THEN siadi_modalidad_curso.nombre_convocatoria_estudiante -- homologacion, convalidacion, ambos
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante IN(2, 4, 5) THEN siadi_modalidad_curso.nombre_convocatoria_estudiante -- prueba de examen, actualizacion, migracion
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante=1 THEN CONCAT(siadi_modalidad_curso.nombre_convocatoria_estudiante, ' (', siadi_costos.tipo_costo, ')')
                END AS tipo_convocatoria_estudiante_nombre")
        );
    }

    private function addColumnTipoEstudiante($query){
        $query->addSelect(
            'siadi_tipo_estudiantes.id_tipo_estudiante',
            'siadi_tipo_estudiantes.nombre_tipo_estudiante'
        );
    }

    private function addColumnCargaHorariaCertificado($query){
        $query->addSelect(
            DB::raw("CONCAT ( CASE 
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '1.1' AND siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 0 -- 1 ,CURSO REGULAR COSTO='TGN'
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '%.2' AND siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN
                            (
                                SELECT SUM(pas2.carga_horaria_planificar_asignartura)
                                FROM siadi_planificar_asignaturas pas2
                                    INNER JOIN siadi_asignaturas sas2 ON(pas2.id_siadi_asignatura = sas2.id_siadi_asignatura)
                                    INNER JOIN siadi_idiomas sid2 ON(sid2.id_idioma = sas2.id_idioma)
                                    INNER JOIN siadi_nivel_idiomas sni2 ON(sni2.id_nivel_idioma = sas2.id_nivel_idioma)
                                    INNER JOIN siadi_inscripcions sin2 ON(sin2.id_planificar_asignatura = pas2.id_planificar_asignatura)
                                WHERE 
                                    siadi_idiomas.id_idioma = sid2.id_idioma
                                    AND sni2.nombre_nivel_idioma <= siadi_nivel_idiomas.nombre_nivel_idioma
                                    AND sin2.id_siadi_persona = siadi_inscripcions.id_siadi_persona
                                ORDER BY sni2.nombre_nivel_idioma
                            ) WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '%.1' AND siadi_modalidad_curso.id_convocartoria_estudiante=9 THEN (
                                SELECT SUM(pas2.carga_horaria_planificar_asignartura)
                                FROM siadi_planificar_asignaturas pas2
                                    INNER JOIN siadi_asignaturas sas2 ON(pas2.id_siadi_asignatura = sas2.id_siadi_asignatura)
                                    INNER JOIN siadi_idiomas sid2 ON(sid2.id_idioma = sas2.id_idioma)
                                    INNER JOIN siadi_nivel_idiomas sni2 ON(sni2.id_nivel_idioma = sas2.id_nivel_idioma)
                                    INNER JOIN siadi_inscripcions sin2 ON(sin2.id_planificar_asignatura = pas2.id_planificar_asignatura)
                                WHERE 
                                    siadi_idiomas.id_idioma = sid2.id_idioma
                                    AND sni2.nombre_nivel_idioma < siadi_nivel_idiomas.nombre_nivel_idioma
                                    AND sin2.id_siadi_persona = siadi_inscripcions.id_siadi_persona
                                    ORDER BY sni2.nombre_nivel_idioma
                            ) ELSE 
                                siadi_planificar_asignaturas.carga_horaria_planificar_asignartura 
                        END, ' Horas') AS carga_horaria")
        );
    }

    private function addColumnSugeridoInicialNotas($query){
        $query->addSelect(
            DB::raw("CASE 
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 1 AND siadi_costos.tipo_costo ='TGN' THEN 'T' -- CURSO REGULAR (TGN)
                        ELSE 'R'
                    END AS inicial")
        );
    }

    private function addColumnsGestion($query){
        $query->addSelect(
            DB::raw("CONCAT(siadi_convocatorias.periodo, '/', siadi_gestions.nombre_gestion) AS periodo_gestion"),
            'siadi_convocatorias.nombre_convocatoria'
        );
    }

    private function addColumnCursoDetalles($query){
        $query->addSelect(
            'siadi_asignaturas.id_siadi_asignatura',
            'siadi_planificar_asignaturas.id_planificar_asignatura',
            'siadi_planificar_asignaturas.id_paralelo',
            'siadi_asignaturas.sigla_asignatura',
            DB::raw("CONCAT('Paralelo ', siadi_paralelos.nombre_paralelo, ' (', siadi_planificar_asignaturas.turno_paralelo, ')') AS paralelo")
        );
    }

    private function addColumnEsTGNYTieneCertificado($query){
        $query->addSelect(
            DB::raw("CASE
                WHEN siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 'SI'
                ELSE 'NO'
            END AS es_tgn"),
            DB::raw("
                (
                    SELECT 
                        cp.id_certificado_provisional
                        -- cp.numero_siadi_certificado_prov 
                    FROM siadi_notas sn 
                    INNER JOIN siadi_inscripcions si ON(si.id_inscripcion = sn.id_inscripcion)
                    INNER JOIN siadi_personas sper ON(sper.id_siadi_persona = si.id_siadi_persona)
                    INNER JOIN siadi_planificar_asignaturas spa ON(spa.id_planificar_asignatura = si.id_planificar_asignatura)
                    INNER JOIN siadi_asignaturas sa ON(sa.id_siadi_asignatura = spa.id_siadi_asignatura)
                    INNER JOIN siadi_nivel_idiomas sni ON(sni.id_nivel_idioma = sa.id_nivel_idioma)
                    INNER JOIN siadi_idiomas sid ON(sid.id_idioma = sa.id_idioma)
                    INNER JOIN siadi_convocatorias sco ON(sco.id_siadi_convocatoria = spa.id_siadi_convocatoria)
                    INNER JOIN siadi_gestions sg ON(sg.id_gestion = sco.id_gestion)
                    INNER JOIN siadi_modalidad_curso smc ON(smc.id_convocartoria_estudiante = sco.id_modalidad_curso)
                    INNER JOIN siadi_costos scos ON(scos.id_costo = sco.id_costo)

                    LEFT JOIN certificados_provisional cp ON(cp.id_nota = sn.id_nota)
                    WHERE smc.id_convocartoria_estudiante=1 
                        AND scos.tipo_costo = 'TGN'
                        AND sa.id_idioma = siadi_idiomas.id_idioma
                        AND sid.id_idioma = siadi_idiomas.id_idioma
                        AND sper.id_siadi_persona = siadi_personas.id_siadi_persona
                        AND sn.final_nota >= 51
                    -- ORDER BY sni.id_nivel_idioma ASC
                    GROUP BY sid.id_idioma
                ) id_certificado_notas"),
                DB::raw("
                (
                    SELECT 
                        si.id_inscripcion
                    FROM siadi_notas sn 
                    INNER JOIN siadi_inscripcions si ON(si.id_inscripcion = sn.id_inscripcion)
                    INNER JOIN siadi_personas sper ON(sper.id_siadi_persona = si.id_siadi_persona)
                    INNER JOIN siadi_planificar_asignaturas spa ON(spa.id_planificar_asignatura = si.id_planificar_asignatura)
                    INNER JOIN siadi_asignaturas sa ON(sa.id_siadi_asignatura = spa.id_siadi_asignatura)
                    INNER JOIN siadi_nivel_idiomas sni ON(sni.id_nivel_idioma = sa.id_nivel_idioma)
                    INNER JOIN siadi_idiomas sid ON(sid.id_idioma = sa.id_idioma)
                    INNER JOIN siadi_convocatorias sco ON(sco.id_siadi_convocatoria = spa.id_siadi_convocatoria)
                    INNER JOIN siadi_gestions sg ON(sg.id_gestion = sco.id_gestion)
                    INNER JOIN siadi_modalidad_curso smc ON(smc.id_convocartoria_estudiante = sco.id_modalidad_curso)
                    INNER JOIN siadi_costos scos ON(scos.id_costo = sco.id_costo)

                    LEFT JOIN certificados_provisional cp ON(cp.id_nota = sn.id_nota)
                    WHERE smc.id_convocartoria_estudiante=1 
                        AND scos.tipo_costo = 'TGN'
                        AND sa.id_idioma = siadi_idiomas.id_idioma
                        AND sid.id_idioma = siadi_idiomas.id_idioma
                        AND sper.id_siadi_persona = siadi_personas.id_siadi_persona
                        AND sn.final_nota >= 51
                    -- ORDER BY sni.id_nivel_idioma ASC
                    GROUP BY sid.id_idioma
                ) id_inscrip_cert_notas")
        );
    }


    private function addWhereStatus_01_active($query){
        $query->where([
            'siadi_notas.estado_nota' => 'ACTIVO',
            'siadi_inscripcions.estado_inscripcion' => 'ACTIVO',
            'siadi_personas.estado_persona' => 'ACTIVO',
            'siadi_planificar_asignaturas.estado_planificar_asignartura' => 'ACTIVO',
            'siadi_asignaturas.estado_asignatura' => 'ACTIVO',
            'siadi_nivel_idiomas.estado_nivel_idioma' => 'ACTIVO',
            'siadi_idiomas.estado_idioma' => 'ACTIVO',
            'siadi_paralelos.estado_paralelo' => 'ACTIVO',
            'siadi_convocatorias.estado_convocatoria' => 'ACTIVO',
            'siadi_gestions.estado_gestion' => 'ACTIVO',
            'siadi_tipo_convocatorias.estado_tipo_convocatoria' => 'ACTIVO',
            'siadi_convocartoria_estudiantes.estado_convocatoria_estudiante' => 'ACTIVO',
            'siadi_tipo_estudiantes.estado_tipo_estudiante' => 'ACTIVO',
            'siadi_costos.estado_costo' => 'ACTIVO'
        ]);
    }

    private function addWhereStatus_02_all($query){ # EXCEPT ELIMINAR
        $query->where('siadi_notas.estado_nota', '<>', 'ELIMINAR')
            ->where('siadi_inscripcions.estado_inscripcion', '<>', 'ELIMINADO')
            ->where('siadi_personas.estado_persona', '<>', 'ELIMINAR')
            ->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINADO')
            ->where('siadi_asignaturas.estado_asignatura', '<>', 'ELIMINAR')
            ->where('siadi_nivel_idiomas.estado_nivel_idioma', '<>', 'ELIMINAR')
            ->where('siadi_idiomas.estado_idioma', '<>', 'ELIMINAR')
            ->where('siadi_paralelos.estado_paralelo', '<>', 'ELIMINAR')
            ->where('siadi_convocatorias.estado_convocatoria', '<>', 'ELIMINADO')
            ->where('siadi_gestions.estado_gestion', '<>', 'ELIMINAR')
            ->where('siadi_modalidad_curso.estado_convocatoria_estudiante', '<>', 'ELIMINAR')
            ->where('siadi_costos.estado_costo', '<>', 'ELIMINAR'); 
    }

    public function addWhereAprobados($query){
        $query->where('siadi_notas.final_nota', '>=', 51);
            #->where('siadi_notas.observacion_nota', 'APROBADO');
    }

    public function addWhereNotConvalidacionHomologacion($query){
        $query->whereNotIn('siadi_modalidad_curso.id_convocartoria_estudiante', [3, 6, 7, 8]); #3,7:CONVALIDACION, 6,8:HOMOLOGACION
    }



}
<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Certificados extends Model
{
    use HasFactory;
    protected $primaryKey = 'certificado_id';

    

    # Persona o usaurio que tiene si o si un certificado
    # $id = certificados.certificado_id
    public function get_data_certifcado($id){
        $query = $this->base_query_certificado();
        $query->where('certificados.certificado_id', '=', $id);
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
    * $soloNulos -> false: muestra los que tienen y no tienen certificados; true: solamente los que no generaron certificados
    */
    public function get_data_lote_aprobado_agrupar($agruparParalelos = false, $solo_asignatura = 0, $soloNulos = false, $id_gestion, $periodo, $id_convocatoria){
        DB::statement("SET SQL_MODE=''");
        $query = $this->base_query_data_inscripcion_aprobado();
        if($agruparParalelos==true){
            $query->addSelect(
                DB::raw("COUNT(siadi_notas.id_inscripcion) AS inscritos_con_nota"),
                DB::raw("COUNT(certificados.certificado_id) AS con_certificados"),
                DB::raw("GROUP_CONCAT(siadi_notas.id_inscripcion SEPARATOR ',') AS ids_inscripcion_con_nota"),
                DB::raw("GROUP_CONCAT(certificados.certificado_id SEPARATOR ',') AS ids_certificados_con_certificado")
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
            $query->whereNull('certificados.id_nota');
        }
        $query->orderBy("siadi_planificar_asignaturas.id_planificar_asignatura")
              ->orderBy("siadi_planificar_asignaturas.id_paralelo");
        return $query->get();
    }


    private function base_query_certificado(){
        $query = DB::table('certificados');
        $this->joinTables_01($query);
        
        $query->select(
            'certificados.certificado_id',
            'certificados.codigo_siadi_certificado',
            'certificados.gestion',
            'certificados.fecha_siadi_certificado AS fecha',
            'certificados.tipo_curso',
            'certificados.numero_siadi_certificado',
            DB::raw("CASE WHEN certificados.imagen_certificado IS NULL THEN '' ELSE certificados.imagen_certificado END AS imagen_certificado"),
        );
        $this->addColumnsPersonaCertificado($query);
        $this->addColumnNotaCertificado($query);
        $this->addColumnMateriasCertificado($query);
        $this->addColumnModalidadCertificado($query);
        #$this->addColumnTipoEstudiante($query);
        $this->addColumnCargaHorariaCertificado($query);
        $this->addColumnsFormatoCertificado($query);
        $this->addColumnDataQrCertificado($query);

        $this->addWhereStatus_02_all($query);
        $this->addWhereAprobados($query);
        $this->addWhereNotTGN1_1($query);
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
        $this->addColumnSugeridoInicialNotas($query);
        $this->addColumnModalidadCertificado($query);
        #$this->addColumnTipoEstudiante($query);
        $this->addColumnCargaHorariaCertificado($query);
        $this->addColumnsFormatoCertificado($query);
        $this->addColumnsGestion($query);
        $this->addColumnCursoDetalles($query);

        $this->addWhereStatus_02_all($query);
        $this->addWhereAprobados($query);
        $this->addWhereNotTGN1_1($query);
        return $query;
    }


    public function get_numeros_disponibles($anio){
        $max = 5000;

        DB::statement(DB::raw("CREATE TEMPORARY TABLE ocupados
                                SELECT CAST(SUBSTRING(codigo_siadi_certificado, 2, 4) AS INT) AS numero, 
                                    CAST(SUBSTRING(codigo_siadi_certificado, 2, 4) AS INT) - ROW_NUMBER() OVER(ORDER BY CAST(SUBSTRING(codigo_siadi_certificado, 2, 4) AS INT)) AS grp
                                FROM certificados
                                WHERE SUBSTRING(codigo_siadi_certificado, 7, 4) = ?"), [$anio]);
        $result = DB::table("ocupados")
            ->select(DB::raw("
            CASE 
                WHEN MIN(numero) = MAX(numero) THEN CAST(MIN(numero) AS CHAR(10))
                ELSE CONCAT( MIN(numero), '-', MAX(numero))
            END AS rango_numeros_ocupados
            "))
            ->groupBy("grp")
            ->orderBy(DB::raw("MIN(numero)"))
            ->get();

        # algoritmo -> revisar NROS_DISPONIBLES.php
        $disponibles = [];
        if(count($result)>0){
            $tmp = (count(explode('-', $result[0]->rango_numeros_ocupados))==2?explode('-', $result[0]->rango_numeros_ocupados)[0]: $result[0]->rango_numeros_ocupados)-1;
            if($tmp!==0){
                $disponibles[] = "1-$tmp";
            }
            $icnicio = (count(explode('-', $result[0]->rango_numeros_ocupados))==2?explode('-', $result[0]->rango_numeros_ocupados)[1]: $result[0]->rango_numeros_ocupados)+1;
            for($ic=1; $ic<count($result); $ic++){
                $fin = (count(explode('-', $result[$ic]->rango_numeros_ocupados))==2?explode('-', $result[$ic]->rango_numeros_ocupados)[0]: $result[$ic]->rango_numeros_ocupados)-1;
                $disponibles[] = "$icnicio-$fin";
                $icnicio = (count(explode('-', $result[$ic]->rango_numeros_ocupados))==2?explode('-', $result[$ic]->rango_numeros_ocupados)[1]: $result[$ic]->rango_numeros_ocupados)+1;
            }
            $disponibles[] = "$icnicio-$max";
        # si no es una cadena vacia entones es un año
        } else if(strlen($anio)>0){
            $disponibles[] = "1-$max";
        } else {
            $disponibles = [];
        }
        $verdaderos = [];
        foreach ($disponibles as $value) {
            $arr_n = explode('-', $value);
            if($arr_n[0]==$arr_n[1]){
                $verdaderos[] = $value;
            } else if($arr_n[1]>$arr_n[0]){
                $verdaderos[] = $value;
            }
        }
        return $verdaderos; #$disponibles
    }




    # ********************************** funciones privadas para campos que mostrar *****************************

    # FROM certificados 
    private function joinTables_01($query){
        $query->join('siadi_notas', 'siadi_notas.id_nota', '=', 'certificados.id_nota')
            ->join('siadi_inscripcions', 'siadi_inscripcions.id_inscripcion', '=', 'siadi_notas.id_inscripcion')
            ->join('siadi_personas', 'siadi_personas.id_siadi_persona', '=', 'siadi_inscripcions.id_siadi_persona')
            ->join('siadi_planificar_asignaturas', 'siadi_planificar_asignaturas.id_planificar_asignatura', '=', 'siadi_inscripcions.id_planificar_asignatura')
            ->join('siadi_asignaturas', 'siadi_asignaturas.id_siadi_asignatura', '=', 'siadi_planificar_asignaturas.id_siadi_asignatura')
            ->join('siadi_nivel_idiomas', 'siadi_nivel_idiomas.id_nivel_idioma', '=', 'siadi_asignaturas.id_nivel_idioma')
            ->join('siadi_idiomas', 'siadi_idiomas.id_idioma', '=', 'siadi_asignaturas.id_idioma')
            ->join('siadi_paralelos', 'siadi_paralelos.id_paralelo', '=', 'siadi_planificar_asignaturas.id_paralelo')
            ->join('siadi_convocatorias', 'siadi_convocatorias.id_siadi_convocatoria', '=', 'siadi_planificar_asignaturas.id_siadi_convocatoria')
            ->join('siadi_gestions', 'siadi_gestions.id_gestion', '=', 'siadi_convocatorias.id_gestion')
            /* ->join('siadi_tipo_convocatorias', 'siadi_tipo_convocatorias.id_tipo_convocatoria', '=', 'siadi_convocatorias.id_tipo_convocatoria')
            ->join('siadi_convocartoria_estudiantes', 'siadi_convocartoria_estudiantes.id_convocartoria_estudiante', '=', 'siadi_tipo_convocatorias.id_convocartoria_estudiante')
            ->join('siadi_tipo_estudiantes', 'siadi_tipo_estudiantes.id_tipo_estudiante', '=', 'siadi_tipo_convocatorias.id_tipo_estudiante')
            ->join('siadi_costos', 'siadi_costos.id_costo', '=', 'siadi_tipo_convocatorias.id_costo'); */
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
            /* ->join('siadi_tipo_convocatorias', 'siadi_tipo_convocatorias.id_tipo_convocatoria', '=', 'siadi_convocatorias.id_tipo_convocatoria')
            ->join('siadi_convocartoria_estudiantes', 'siadi_convocartoria_estudiantes.id_convocartoria_estudiante', '=', 'siadi_tipo_convocatorias.id_convocartoria_estudiante')
            ->join('siadi_tipo_estudiantes', 'siadi_tipo_estudiantes.id_tipo_estudiante', '=', 'siadi_tipo_convocatorias.id_tipo_estudiante')
            ->join('siadi_costos', 'siadi_costos.id_costo', '=', 'siadi_tipo_convocatorias.id_costo') */
            ->join('siadi_modalidad_curso', 'siadi_modalidad_curso.id_convocartoria_estudiante', '=', 'siadi_convocatorias.id_modalidad_curso')
            ->join('siadi_costos', 'siadi_costos.id_costo', '=', 'siadi_convocatorias.id_costo')

            ->LeftJoin('certificados', 'certificados.id_nota', '=', 'siadi_notas.id_nota');
    }


    private function addColumnDataQrCertificado($query){
        $query->addSelect(
            DB::raw("CONCAT(
                certificados.codigo_siadi_certificado, '|',
                ci_persona, '-', expedido_persona, '|',
                UPPER(CONCAT(CASE paterno_persona WHEN '' THEN '' ELSE concat(paterno_persona, '-') END, CASE materno_persona WHEN '' THEN '' ELSE concat(materno_persona, '-') END, nombres_persona)), '|',
                REPLACE( CONCAT(siadi_idiomas.nombre_idioma, '-',siadi_nivel_idiomas.descripcion_nivel_idioma , '-', siadi_nivel_idiomas.nombre_nivel_idioma), ' ', '-'), '|',
                'LIBRO-', COALESCE(siadi_convocatorias.nro_libro, 'N/A'), '|', -- Usar 'N/A' u otro valor por defecto si nro_libro es NULL
                'NOTA-', siadi_notas.final_nota

            ) AS codigo_qr")
        );
    }

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
            DB::raw("CONCAT(siadi_idiomas.sigla_codigo_idioma, ' ', siadi_idiomas.nombre_idioma, ' ',siadi_nivel_idiomas.descripcion_nivel_idioma , ' ', siadi_nivel_idiomas.nombre_nivel_idioma) AS idioma")
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
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '1.1' AND siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 0   -- 1.1   TGN ,CURSO REGULAR COSTO='TGN'
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '1.2' AND siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 320 -- 1.2
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '2.1' AND siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 320 -- 2.1
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '2.2' AND siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 640 -- 2.2
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '3.1' AND siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 640 -- 3.1
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '3.2' AND siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN 960 -- 3.2
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '1.1' THEN 160
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '1.1' THEN 320
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '2.1' THEN 480
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '2.2' THEN 640
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '3.1' THEN 800
                            WHEN siadi_nivel_idiomas.nombre_nivel_idioma LIKE '3.2' THEN 960
                            ELSE 
                                siadi_planificar_asignaturas.carga_horaria_planificar_asignartura 
                        END, ' Horas') AS carga_horaria")
        );
        /*DB::raw("CONCAT ( CASE 
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
                            ) ELSE 
                                siadi_planificar_asignaturas.carga_horaria_planificar_asignartura 
                        END, ' Horas') AS carga_horaria")
        );*/
        
    }

    private function addColumnsFormatoCertificado($query){
        $query->addSelect(
            DB::raw("CASE 
                    WHEN siadi_gestions.nombre_gestion <= '2019' AND siadi_modalidad_curso.id_convocartoria_estudiante IN (3, 7) THEN 'formato6' -- 3=Convalidacion departamento de idiomas Y CARRERA
                    WHEN siadi_gestions.nombre_gestion <= '2019' AND siadi_modalidad_curso.id_convocartoria_estudiante = 8 THEN 'formato1' -- #is1 8=Homologacion linguistica e idiomas
                    WHEN siadi_gestions.nombre_gestion <= '2019' AND siadi_modalidad_curso.id_convocartoria_estudiante IN(1, 2, 6) THEN 'formato7' -- #is1 1=Curso Regular, 2=Prueba de examen de suficiencia, 6=Homologacion deppartamento de idiomas
                    WHEN siadi_gestions.nombre_gestion <= '2019' THEN 'formato7' -- certificacion antigua

                    -- nuevos
                    WHEN (siadi_modalidad_curso.id_convocartoria_estudiante = 1 AND siadi_costos.tipo_costo ='TGN') OR siadi_modalidad_curso.id_convocartoria_estudiante IN(3, 7) THEN 'formato5' -- 1=curso regular (tgn) or convalidacion ambos
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 8 THEN 'formato3' -- homologacion carrera
                    ELSE 'formato4' -- demás certificados nuevos
                END AS formato")
        );
    }

    private function addColumnSugeridoInicialNotas($query){
        $query->addSelect(
            DB::raw("CASE 
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante IN(3, 7) THEN 'C'
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante IN(6, 8) THEN 'H'
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 5 THEN 'M'
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 2 THEN 'E'
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 1 AND siadi_costos.tipo_costo ='TGN' THEN 'T' -- CURSO REGULAR (TGN)
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 1 AND siadi_costos.tipo_costo ='AUTOFINANCIADO' THEN 'A' -- CURSO REGULAR (AUTOFINANCIADO)
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 1 AND siadi_costos.tipo_costo ='CONVENIO' THEN 'N' -- CURSO REGULAR (CONVENIO) -- consultar
                        ELSE 'Z'
                    END AS inicial")
        );
    }

    private function addColumnsGestion($query){
        $query->addSelect(
            DB::raw("CONCAT(siadi_convocatorias.periodo, '-', siadi_gestions.nombre_gestion) AS gestion"),
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
            /* ->where('siadi_tipo_convocatorias.estado_tipo_convocatoria', '<>', 'ELIMINAR')
            ->where('siadi_convocartoria_estudiantes.estado_convocatoria_estudiante', '<>', 'ELIMINAR')
            ->where('siadi_tipo_estudiantes.estado_tipo_estudiante', '<>', 'ELIMINAR')
            ->where('siadi_costos.estado_costo', '<>', 'ELIMINAR'); */
            ->where('siadi_modalidad_curso.estado_convocatoria_estudiante', '<>', 'ELIMINAR')
            ->where('siadi_costos.estado_costo', '<>', 'ELIMINAR'); 
    }

    public function addWhereAprobados($query){
        $query->where('siadi_notas.final_nota', '>=', 51);
            #->where('siadi_notas.observacion_nota', 'APROBADO');
    }

    public function addWhereNotTGN1_1($query){
        $query->where(function($querys){
            $querys->where('siadi_modalidad_curso.id_convocartoria_estudiante', '<>', 1); #1 CURSO REGULAR (TGN)
            $querys->orWhere('siadi_costos.tipo_costo', '<>', 'TGN');
            $querys->orWhere('siadi_nivel_idiomas.nombre_nivel_idioma', '<>', '1.1');
        });
    }



    // migracion primera parte los tgns = T, R
    public function updateTipoCurosT($tipo){
        if($tipo=='R-' || $tipo=='T-'){
            $consulta = $this->base_query_certificado();
            $consulta->addSelect(
                DB::raw("certificados.numero_siadi_certificado AS codigo_siadi_certificado_old"),
                DB::raw("certificados.fecha_siadi_certificado AS fecha_siadi_certificado_old"),

                DB::raw("CONCAT(siadi_convocatorias.periodo, '-', siadi_gestions.nombre_gestion) AS nueva_gestion")
            );
            $this->addColumnSugeridoInicialNotas($consulta);
            $consulta->where('tipo_curso', '=', $tipo);
            #$consulta->where('siadi_gestions.nombre_gestion', '2011');
            #$consulta->take(10);
            return $consulta->get();
        } else {
            return [];
        }
        
    }

}

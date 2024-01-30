<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use DB;

use function PHPSTORM_META\type;

class EstadisticaController extends Controller
{
    function __construct(){
        #$this->middleware('can:estadisticas.detalladas', ['only' => ['tipo_convocatoria']]);
    }

    public function index()
    {
        $data = $this->get_estudiantes_por_periodo_gestion(); 
        return response()->json([
            'success' => true,
            'message' => 'Datos obtenidos exitosamente',
            'data' => [
                "options" => [
                    "title" => [
                        "text" => "ESTUDIANTES INSCRITOS POR PERIODO GESTIÓN",
                        "align" => "center",
                        "margin" => 40,
                        "style" => [
                            "fontWeight" => "bold",
                            "color" => "#3b5de7"
                        ]
                    ],
                    "chart" => [
                        "stacked" => false,
                        "zoom" => [
                            "enabled" => true
                        ]
                    ],
                    "series" => [
                        ["type" => "line", "name" => "Inscritos", "data" => $data->pluck('total_inscritos')->toArray() ], #  $data->pluck('total_inscritos')->toArray() 
                        ["type" => "bar", "name" => "Aprobados", "data" => $data->pluck('estudiantes_aprobados')->toArray() ],
                        ["type" => "bar", "name" => "Reprobados", "data" => $data->pluck('estudiantes_reprobados')->toArray() ],
                        ["type" => "bar", "name" => "No se presentaron", "data" => $data->pluck('estudiantes_no_se_presentaron')->toArray() ],
                        ["type" => "bar", "name" => "No asignados", "data" => $data->pluck('estudiantes_no_asignados')->toArray() ]
                    ],
                    "colors" => ["#9095ad", "#45cb85", "#ff715b", "#eeb902", "#0caadc"],
                    "xaxis" => [
                        "categories" => $data->pluck('gestion_literal')->toArray()
                    ],
                    "dataLabels" => [
                        "enabled" => true,
                        "style" => [
                            "colors" => ["#fff"]
                        ]
                    ],
                    "stroke" => [
                        "width" => 2
                    ],
                    "plotOptions" => [
                        "bar" => [
                            "horizontal" => false,
                            "borderRadius" => 2,
                            "columnWidth" => "30px",
                            "dataLabels" => [
                                "position" => "center"
                            ]
                        ]
                    ]
                ]
            ]

        ], 200);
    }
    
    # estadísticas por periodo_gestion, modalidad, idioma
    /*
    * periodo_gestion: string -> example: I-2023: max-legth: 7
    * modalidad: int ->
	* 	11: curso regular (tgn)
	* 	12: curso regular (autofinanciado) 
	* 	13: curso regular (convenio)
	* 	14: curso regular (escolarizado)
	* 	2: examen de suficiencia 
	* 	31: convalidación departamento de idiomas
	* 	32: convalidación linguistica e idiomas
	* 	41: homologación departamento de idiomas
	* 	42: homologación linguistica e idiomas
	* 	5: actualización de certificado
	* idioma: int -> 
 		id_idioma: example (1, 2, 3, 4, 5) 
	*/
    # Route::get('count_by_tipo_convocatoria/{gestion?}/{convocatoria_estudiante?}/{id_idioma?}', [EstadisticaController::class, 'tipo_convocatoria']);
    public function tipo_convocatoria($perido_gestion = null, $convocatoria_estudiante = null, $id_idioma = null){
        if(!is_null($perido_gestion) && strlen($perido_gestion)>=8 ){
            return  response()->json([
                'success' => false,
                'message' => 'Error parámetro',
                'error' => 'Parámetro no es válido, debe ser un periodo-gestion'
            ]);
        }
        
    	if(!is_null($convocatoria_estudiante) && !ctype_digit($convocatoria_estudiante) ){
            return  response()->json([
                'success' => false,
                'message' => 'Error parámetro',
                'error' => 'Segundo parámetro no es válido, debe ser un entero'
            ]);
        }

        if(!is_null($id_idioma) && !ctype_digit($id_idioma) ){
            return  response()->json([
                'success' => false,
                'message' => 'Error parámetro',
                'error' => 'Tercer parámetro no es válido, debe ser un entero'
            ]);
        }

        #$data = $this->get_estudiante_gestion_convocatoria_estudiante($perido_gestion, $convocatoria_estudiante, $id_idioma);
        $data = $this->get_data_modalidad($perido_gestion, $convocatoria_estudiante, $id_idioma);
        
        return response()->json([
            'success' => true,
            'message' => 'Datos obtenidos exitosamente',
            'data' => $data
        ]);
    }

    # Route::get('count_by_gender',  [EstadisticaController::class, 'get_estudiantes_total_inscritos_genero']);
    public function get_estudiantes_total_inscritos_genero(){
        $data = DB::table("siadi_inscripcions")
            ->join("siadi_notas", "siadi_notas.id_inscripcion", "=", "siadi_inscripcions.id_inscripcion")
            ->join("siadi_planificar_asignaturas", "siadi_planificar_asignaturas.id_planificar_asignatura", "=", "siadi_inscripcions.id_planificar_asignatura")
            ->join("siadi_convocatorias", "siadi_convocatorias.id_siadi_convocatoria", "=", "siadi_planificar_asignaturas.id_siadi_convocatoria")
            ->join("siadi_gestions", "siadi_gestions.id_gestion", "=", "siadi_convocatorias.id_gestion")
            ->join("siadi_personas", "siadi_personas.id_siadi_persona", "=", "siadi_inscripcions.id_siadi_persona")
        ->select(
                #'siadi_personas.genero_persona', 
                DB::raw("CASE siadi_personas.genero_persona
                    WHEN 'F' THEN 'Mujeres'
                    WHEN 'M' THEN 'Hombres'
                    ELSE 'Géneros sin asignar'
                END AS genero_persona"),
                DB::raw("COUNT(DISTINCT siadi_personas.id_siadi_persona) AS estudiantes_inscritos") 
            )
        ->where(function($query){
            $query->where('siadi_inscripcions.estado_inscripcion', '<>', 'ELIMINAR')
                ->where('siadi_notas.estado_nota', '<>', 'ELIMINAR')
                ->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINAR')
                ->where('siadi_convocatorias.estado_convocatoria', '<>', 'ELIMINAR')
                ->where('siadi_gestions.estado_gestion', '<>', 'ELIMINAR')
                ->where('siadi_personas.estado_persona', '<>', 'ELIMINAR');
        })
        ->groupBy("siadi_personas.genero_persona")
        ->get();
        return response()->json([
            'success' => true,
            'message' => 'Datos obtenidos exitosamente',
            'data' => $data
        ]);
    }





    /*                 OTRAS ESTADISTICAS                    */
    #Route::get('count_tipo_convocatoria', [EstadisticaController::class, 'get_inscritos_by_modalidad_except_eliminar']);
    public function get_inscritos_by_modalidad_except_eliminar(){
        $query = DB::table("siadi_inscripcions")
            ->join("siadi_notas", "siadi_notas.id_inscripcion", "=", "siadi_inscripcions.id_inscripcion")
            ->join("siadi_planificar_asignaturas", "siadi_planificar_asignaturas.id_planificar_asignatura", "=", "siadi_inscripcions.id_planificar_asignatura")
            ->join("siadi_convocatorias", "siadi_convocatorias.id_siadi_convocatoria", "=", "siadi_planificar_asignaturas.id_siadi_convocatoria")
            ->join("siadi_gestions", "siadi_gestions.id_gestion", "=", "siadi_convocatorias.id_gestion")
            ->join("siadi_modalidad_curso", "siadi_modalidad_curso.id_convocartoria_estudiante", "=", "siadi_convocatorias.id_modalidad_curso")
            ->join("siadi_costos", "siadi_costos.id_costo", "=", "siadi_convocatorias.id_costo");
        $query->addSelect(
        	DB::raw("CASE
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 1 THEN CONCAT(siadi_modalidad_curso.nombre_convocatoria_estudiante, ' (', siadi_costos.tipo_costo, ')')
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 2 THEN 'EXAMEN DE SUFICIENCIA'
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante IN(3, 7) THEN 'CONVALIDACIÓN'
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante IN(6, 8) THEN 'HOMOLOGACIÓN'
        			ELSE siadi_modalidad_curso.nombre_convocatoria_estudiante
			END modalidad"),
            DB::raw("COUNT(siadi_inscripcions.id_inscripcion) total_inscritos")
        );
        $query->where('siadi_inscripcions.estado_inscripcion', '<>', 'ELIMINADO')
            ->where('siadi_notas.estado_nota', '<>', 'ELIMINAR')
            ->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINADO')
            ->where('siadi_convocatorias.estado_convocatoria', '<>', 'ELIMINADO')
            ->where('siadi_gestions.estado_gestion', '<>', 'ELIMINAR')
            ->where('siadi_modalidad_curso.estado_convocatoria_estudiante', '<>', 'ELIMINAR')
            ->where('siadi_costos.estado_costo', '<>', 'ELIMINAR');
		$query->groupBy("modalidad")
        ->orderBy("total_inscritos", "desc");

        return response()->json([
            'success' => true,
            'message' => 'Datos obtenidos exitosamente',
            'data' => $query->get()
        ]);
    }

	# Estadisticas de usuarios que su ultima actividad fue hace 120 minutos
    #Route::get('get_count_users', [EstadisticaController::class, 'usuarios_activos']);
    public function usuarios_activos(){
        $query = DB::table("users")
            ->select(DB::raw("count(*) AS total"))
            ->where('estado', '=', '1')
            ->where(function ($query){
                $query->whereNotNull('email')
                    ->orWhere('email', '='. '');
            })
            ->first();
        return response()->json([
            'success' => true,
            'message' => 'Datos obtenidos exitosamente',
            'data' => $query
        ]);
    }

    #Route::get('get_lasts_user_online', [EstadisticaController::class, 'usuarios_en_linea_ultimos']);
    public function usuarios_en_linea_ultimos(){
        #  usuarios en linea en los ultimos 120 minutos
        $query = DB::table("sessions")
            ->select(DB::raw("count(*) AS total"))
            ->first();
        return response()->json([
            'success' => true,
            'message' => 'Datos obtenidos exitosamente',
            'data' => $query
        ]);
    }
    
	
	
	public function get_data_modalidad($periodo_gestion, $modalidad, $idioma){
		$consulta = DB::table("siadi_inscripcions")
            ->join("siadi_notas", "siadi_notas.id_inscripcion", "=", "siadi_inscripcions.id_inscripcion")
            ->join("siadi_planificar_asignaturas", "siadi_planificar_asignaturas.id_planificar_asignatura", "=", "siadi_inscripcions.id_planificar_asignatura")
            ->join("siadi_convocatorias", "siadi_convocatorias.id_siadi_convocatoria", "=", "siadi_planificar_asignaturas.id_siadi_convocatoria")
            ->join("siadi_gestions", "siadi_gestions.id_gestion", "=", "siadi_convocatorias.id_gestion")
            ->join("siadi_modalidad_curso", "siadi_modalidad_curso.id_convocartoria_estudiante", "=", "siadi_convocatorias.id_modalidad_curso")
            ->join("siadi_costos", "siadi_costos.id_costo", "=", "siadi_convocatorias.id_costo")
            ->join("siadi_asignaturas", "siadi_asignaturas.id_siadi_asignatura", "=", "siadi_planificar_asignaturas.id_siadi_asignatura")
            ->join("siadi_idiomas", "siadi_idiomas.id_idioma", "=", "siadi_asignaturas.id_idioma")
            ->join("siadi_nivel_idiomas", "siadi_nivel_idiomas.id_nivel_idioma", "=", "siadi_asignaturas.id_nivel_idioma");
            
        $consulta->select( DB::raw("CONCAT(siadi_convocatorias.periodo, '-', siadi_gestions.nombre_gestion) AS periodo_gestion") );
        
        $consulta->where('siadi_inscripcions.estado_inscripcion', '<>', 'ELIMINADO')
            ->where('siadi_notas.estado_nota', '<>', 'ELIMINAR')
            ->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINADO')
            ->where('siadi_convocatorias.estado_convocatoria', '<>', 'ELIMINADO')
            ->where('siadi_gestions.estado_gestion', '<>', 'ELIMINAR')
            ->where('siadi_modalidad_curso.estado_convocatoria_estudiante', '<>', 'ELIMINAR')
            ->where('siadi_costos.estado_costo', '<>', 'ELIMINAR')
			->where('siadi_asignaturas.estado_asignatura', '<>', 'ELIMINAR')
            ->where('siadi_idiomas.estado_idioma', '<>', 'ELIMINAR')
            ->where('siadi_nivel_idiomas.estado_nivel_idioma', '<>', 'ELIMINAR');
		$consulta->groupBy("periodo_gestion")
			->orderBy("siadi_gestions.nombre_gestion", "desc")
        	->orderBy("siadi_convocatorias.periodo", "desc");
        
        if(is_null($periodo_gestion)){
        	$consulta->addSelect(
                DB::raw("COUNT(siadi_inscripcions.id_inscripcion) AS total_estudiantes"),
                DB::raw( $this->get_inscritos_by_periodo_gestion('estudiantes_aprobados', '>=51 AND sn.final_nota <= 100') ), # 'APROBADO'
                DB::raw( $this->get_inscritos_by_periodo_gestion('estudiantes_reprobados', '> 0 AND sn.final_nota <= 50') ), # 'REPROBADO'
                DB::raw( $this->get_inscritos_by_periodo_gestion('estudiantes_no_se_presentaron', '= 0') ), # 'NO SE PRESENTO'
                DB::raw( $this->get_inscritos_by_periodo_gestion('estudiantes_inscritos') )
            );
		} else {
            $consulta->addSelect(
                DB::raw("CASE
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 1 AND siadi_costos.tipo_costo IN('TGN', 'AUTOFINANCIADO', 'CONVENIO', 'ESCOLARIZADO') THEN CONCAT(siadi_modalidad_curso.nombre_convocatoria_estudiante, ' (', siadi_costos.tipo_costo, ')')
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 2 THEN 'EXAMEN DE SUFICIENCIA'
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante IN(3, 7, 6, 8, 4) THEN siadi_modalidad_curso.nombre_convocatoria_estudiante
        			ELSE 'Desconocido'
				END modalidad"),
				DB::raw("CASE
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante AND siadi_costos.tipo_costo = 'TGN' THEN 11 
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante AND siadi_costos.tipo_costo = 'AUTOFINANCIADO' THEN 12 
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante AND siadi_costos.tipo_costo = 'CONVENIO' THEN 13 
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante AND siadi_costos.tipo_costo = 'ESCOLARIZADO' THEN 14 
        			WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 2 THEN 2
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 3 THEN 31 -- convalidacion dep.
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 7 THEN 32 -- convalidacion ling.
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 6 THEN 41 -- homologacion dep.
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 8 THEN 42 -- homologacion ling.
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 4 THEN 5 -- actualización certificado
        			ELSE 0
				END id_modalidad"),
            );
            $consulta->where( DB::raw("CONCAT(siadi_convocatorias.periodo, '-', siadi_gestions.nombre_gestion)"), '=', $periodo_gestion);
            $consulta->groupBy("id_modalidad");
            if(is_null($modalidad)){
                $consulta->addSelect(
                    DB::raw("COUNT(siadi_inscripcions.id_inscripcion) AS total_estudiantes"),
                    DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad('estudiantes_aprobados', '>=51 AND sn.final_nota <= 100') ), # 'APROBADO'
                    DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad('estudiantes_reprobados', '> 0 AND sn.final_nota <= 50') ), # 'REPROBADO'
                    DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad('estudiantes_no_se_presentaron', '= 0') ), # 'NO SE PRESENTO'
                    DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad('estudiantes_inscritos') )
                );
            } else {
                $consulta->addSelect(
                    'siadi_idiomas.id_idioma',
                    'siadi_idiomas.nombre_idioma'
                );
                $consulta->where( DB::raw("CASE
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante AND siadi_costos.tipo_costo = 'TGN' THEN 11 
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante AND siadi_costos.tipo_costo = 'AUTOFINANCIADO' THEN 12 
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante AND siadi_costos.tipo_costo = 'CONVENIO' THEN 13 
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante AND siadi_costos.tipo_costo = 'ESCOLARIZADO' THEN 14 
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 2 THEN 2
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 3 THEN 31 -- convalidacion dep.
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 7 THEN 32 -- convalidacion ling.
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 6 THEN 41 -- homologacion dep.
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 8 THEN 42 -- homologacion ling.
                    WHEN siadi_modalidad_curso.id_convocartoria_estudiante = 4 THEN 5 -- actualización certificado
                    ELSE 0
                END"), '=', $modalidad);
                $consulta->groupBy("siadi_idiomas.id_idioma");

                if(is_null($idioma)){
                    $consulta->addSelect(
                        DB::raw("COUNT(siadi_inscripcions.id_inscripcion) AS total_estudiantes"),
                        DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad_idioma('estudiantes_aprobados', '>=51 AND sn.final_nota <= 100') ), # 'APROBADO'
                        DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad_idioma('estudiantes_reprobados', '> 0 AND sn.final_nota <= 50') ), # 'REPROBADO'
                        DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad_idioma('estudiantes_no_se_presentaron', '= 0') ), # 'NO SE PRESENTO'
                        DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad_idioma('estudiantes_inscritos') )
                    );
                } else {
                    $consulta->addSelect(
                        DB::raw("CONCAT(siadi_idiomas.nombre_idioma, ' ', siadi_nivel_idiomas.descripcion_nivel_idioma, ' ', siadi_nivel_idiomas.nombre_nivel_idioma) AS nombre_asignatura"),

                        DB::raw("COUNT(siadi_inscripcions.id_inscripcion) AS total_estudiantes"),
                        DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad_idioma_nivel('estudiantes_aprobados', '>=51 AND sn.final_nota <= 100') ), # 'APROBADO'
                        DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad_idioma_nivel('estudiantes_reprobados', '> 0 AND sn.final_nota <= 50') ), # 'REPROBADO'
                        DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad_idioma_nivel('estudiantes_no_se_presentaron', '= 0') ), # 'NO SE PRESENTO'
                        DB::raw( $this->get_inscritos_by_periodo_gestion_modalidad_idioma_nivel('estudiantes_inscritos') )
                    );
                    $consulta->where("siadi_idiomas.id_idioma", "=", $idioma);
                    $consulta->groupBy("siadi_asignaturas.id_siadi_asignatura");
                }
            }
			
        }
        return $consulta->get();
	}
	
	private function get_inscritos_by_periodo_gestion($show_as, $condition = null){
		$tipo_filtro = is_null($condition)?
						"sn.observaciones_detalle = 'INSCRITO'":
						"sn.observaciones_detalle <> 'INSCRITO' AND sn.final_nota $condition";
        return "(
            SELECT 
                COUNT(sn.id_nota)
            FROM siadi_inscripcions si
                ". $this->join_statics() ."
            WHERE 
                ". $this->where_status() ."
                AND CONCAT(sc.periodo, '-', sg.nombre_gestion) = periodo_gestion
                AND $tipo_filtro
        ) AS $show_as";
    }
    

    private function get_inscritos_by_periodo_gestion_modalidad($show_as, $condition = null){
        $tipo_filtro = is_null($condition)?
						"sn.observaciones_detalle = 'INSCRITO'":
						"sn.observaciones_detalle <> 'INSCRITO' AND sn.final_nota $condition";
        return "(
            SELECT 
                COUNT(sn.id_nota)
            FROM siadi_inscripcions si
                ". $this->join_statics() ."
            WHERE 
                ". $this->where_status() ."
                AND CONCAT(sc.periodo, '-', sg.nombre_gestion) = periodo_gestion
                AND id_modalidad = (". $this->add_select_tipo_modalidad() .")
                AND $tipo_filtro
        ) AS $show_as";
    }


    private function get_inscritos_by_periodo_gestion_modalidad_idioma($show_as, $condition = null){
        $tipo_filtro = is_null($condition)?
						"sn.observaciones_detalle = 'INSCRITO'":
						"sn.observaciones_detalle <> 'INSCRITO' AND sn.final_nota $condition";
        return "(
            SELECT 
                COUNT(sn.id_nota)
            FROM siadi_inscripcions si
                ". $this->join_statics() ."
            WHERE 
                ". $this->where_status() ."
                AND CONCAT(sc.periodo, '-', sg.nombre_gestion) = periodo_gestion
                AND id_modalidad = (". $this->add_select_tipo_modalidad() .")
                AND siadi_idiomas.id_idioma = sid.id_idioma
                AND $tipo_filtro
        ) AS $show_as";
    }

    private function get_inscritos_by_periodo_gestion_modalidad_idioma_nivel($show_as, $condition = null){
        $tipo_filtro = is_null($condition)?
						"sn.observaciones_detalle = 'INSCRITO'":
						"sn.observaciones_detalle <> 'INSCRITO' AND sn.final_nota $condition";
        return "(
            SELECT 
                COUNT(sn.id_nota)
            FROM siadi_inscripcions si
                ". $this->join_statics() ."
            WHERE 
                ". $this->where_status() ."
                AND CONCAT(sc.periodo, '-', sg.nombre_gestion) = periodo_gestion
                AND id_modalidad = (". $this->add_select_tipo_modalidad() .")
                AND siadi_idiomas.id_idioma = sid.id_idioma
                AND siadi_asignaturas.id_siadi_asignatura = sa.id_siadi_asignatura
                AND $tipo_filtro
        ) AS $show_as";
    }


    # joins para subconsultas
    private function join_statics(){
        return "
            INNER JOIN siadi_notas sn ON(sn.id_inscripcion = si.id_inscripcion)
            INNER JOIN siadi_planificar_asignaturas spa ON(spa.id_planificar_asignatura = si.id_planificar_asignatura)
            INNER JOIN siadi_convocatorias sc ON(sc.id_siadi_convocatoria = spa.id_siadi_convocatoria)
            INNER JOIN siadi_gestions sg ON(sg.id_gestion = sc.id_gestion)
            INNER JOIN siadi_modalidad_curso smc ON(smc.id_convocartoria_estudiante = sc.id_modalidad_curso)
            INNER JOIN siadi_costos scts ON(scts.id_costo = sc.id_costo)
            INNER JOIN siadi_asignaturas sa ON(sa.id_siadi_asignatura = spa.id_siadi_asignatura)
            INNER JOIN siadi_idiomas sid ON(sid.id_idioma = sa.id_idioma)
            INNER JOIN siadi_nivel_idiomas sni ON(sni.id_nivel_idioma = sa.id_nivel_idioma)
        ";
    }

    # estados de los joins para subconsultas
    private function where_status(){
        return "
            si.estado_inscripcion <> 'ELIMINADO' AND
            sn.estado_nota <> 'ELIMINAR' AND 
            spa.estado_planificar_asignartura <> 'ELIMINADO' AND
            sc.estado_convocatoria <> 'ELIMINADO' AND
            sg.estado_gestion <> 'ELIMINAR' AND
            smc.estado_convocatoria_estudiante <> 'ELIMINAR' AND
            scts.estado_costo <> 'ELIMINAR' AND
            sa.estado_asignatura <> 'ELIMINAR' AND
            sid.estado_idioma <> 'ELIMINAR' AND 
            sni.estado_nivel_idioma <> 'ELIMINAR'
        ";
    }

    # agrupar tipo de modalidades para subconsultas
    private function add_select_tipo_modalidad(){
        return "
            CASE
                WHEN smc.id_convocartoria_estudiante AND scts.tipo_costo = 'TGN' THEN 11 
                WHEN smc.id_convocartoria_estudiante AND scts.tipo_costo = 'AUTOFINANCIADO' THEN 12 
                WHEN smc.id_convocartoria_estudiante AND scts.tipo_costo = 'CONVENIO' THEN 13 
                WHEN smc.id_convocartoria_estudiante AND scts.tipo_costo = 'ESCOLARIZADO' THEN 14 
                WHEN smc.id_convocartoria_estudiante = 2 THEN 2
                WHEN smc.id_convocartoria_estudiante = 3 THEN 31 -- convalidacion dep.
                WHEN smc.id_convocartoria_estudiante = 7 THEN 32 -- convalidacion ling.
                WHEN smc.id_convocartoria_estudiante = 6 THEN 41 -- homologacion dep.
                WHEN smc.id_convocartoria_estudiante = 8 THEN 42 -- homologacion ling.
                WHEN smc.id_convocartoria_estudiante = 4 THEN 5 -- actualización certificado
                ELSE 0
            END 
        ";
    }
    
}
<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use App\Models\AdministracionModulos\SiadiPersona;
use App\Models\base_upea\tabla_vista_mae_matriculados;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
     function __construct()
    {
         $this->middleware('can:personas.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.persona-index'
        );
    }

    # Route::get('certificado_notas/{id_persona}', [PersonaController::class, 'get_certificado_de_notas'])->name('reporte_pdf_certificado_notas');
    public function get_certificado_de_notas($id_persona){
        $data = SiadiPersona::
            join('siadi_inscripcions', 'siadi_inscripcions.id_siadi_persona', '=', 'siadi_personas.id_siadi_persona')
            ->join('siadi_notas', 'siadi_notas.id_inscripcion', '=', 'siadi_inscripcions.id_inscripcion')
            ->join('siadi_planificar_asignaturas', 'siadi_planificar_asignaturas.id_planificar_asignatura', '=', 'siadi_inscripcions.id_planificar_asignatura')
            ->join('siadi_asignaturas', 'siadi_asignaturas.id_siadi_asignatura', '=', 'siadi_planificar_asignaturas.id_siadi_asignatura')
            ->join('siadi_idiomas', 'siadi_idiomas.id_idioma', '=', 'siadi_asignaturas.id_idioma')
            ->join('siadi_nivel_idiomas', 'siadi_nivel_idiomas.id_nivel_idioma', '=', 'siadi_asignaturas.id_nivel_idioma')
            ->join('siadi_convocatorias', 'siadi_convocatorias.id_siadi_convocatoria', '=', 'siadi_planificar_asignaturas.id_siadi_convocatoria')
            ->join('siadi_gestions', 'siadi_gestions.id_gestion', '=', 'siadi_convocatorias.id_gestion')
            ->join('siadi_tipo_convocatorias', 'siadi_tipo_convocatorias.id_tipo_convocatoria', '=', 'siadi_convocatorias.id_tipo_convocatoria')
            ->join('siadi_convocartoria_estudiantes', 'siadi_convocartoria_estudiantes.id_convocartoria_estudiante', '=', 'siadi_tipo_convocatorias.id_convocartoria_estudiante')
            #->join('siadi_tipo_estudiantes', 'siadi_tipo_estudiantes.id_tipo_estudiante', '=', 'siadi_tipo_convocatorias.id_tipo_estudiante')
            ->join('siadi_costos', 'siadi_costos.id_costo', '=', 'siadi_tipo_convocatorias.id_costo')
            ->select(
                # Datos estudiante
                'siadi_personas.id_persona_base_upea',
                'siadi_personas.nombres_persona',
                'siadi_personas.paterno_persona',
                'siadi_personas.materno_persona',
                \DB::raw("CONCAT(siadi_personas.ci_persona, ' ', siadi_personas.expedido_persona) AS ci"),

                # datos
                "siadi_asignaturas.sigla_asignatura",
                'siadi_idiomas.nombre_idioma',
                'siadi_nivel_idiomas.nombre_nivel_idioma',
                'siadi_notas.final_nota',
                'siadi_notas.observacion_nota',
                'siadi_notas.observaciones_detalle',
                \DB::raw("CASE 
                    WHEN siadi_convocartoria_estudiantes.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN siadi_notas.observacion_nota -- curso regular y tgn
                    ELSE siadi_convocartoria_estudiantes.nombre_convocatoria_estudiante
                END AS resultado"),
                \DB::raw("CONCAT(siadi_convocatorias.periodo, siadi_gestions.nombre_gestion) AS gestion"),
                'siadi_planificar_asignaturas.carga_horaria_planificar_asignartura',

                #modalidad
                'siadi_convocartoria_estudiantes.nombre_convocatoria_estudiante',
                'siadi_costos.tipo_costo',
                'siadi_gestions.nombre_gestion'
            )
            ->where(function($query){
                $query->where('siadi_personas.estado_persona', '<>', 'ELIMINAR')
                    ->where('siadi_inscripcions.estado_inscripcion', '<>', 'ELIMINAR')
                    ->where('siadi_notas.estado_nota', '<>', 'ELIMINAR')
                    ->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINAR')
                    ->where('siadi_asignaturas.estado_asignatura', '<>', 'ELIMINAR')
                    ->where('siadi_idiomas.estado_idioma', '<>', 'ELIMINAR')
                    ->where('siadi_nivel_idiomas.estado_nivel_idioma', '<>', 'ELIMINAR')
                    ->where('siadi_convocatorias.estado_convocatoria', '<>', 'ELIMINAR')
                    ->where('siadi_gestions.estado_gestion', '<>', 'ELIMINAR')
                    ->where('siadi_tipo_convocatorias.estado_tipo_convocatoria', '<>', 'ELIMINAR')
                    ->where('siadi_convocartoria_estudiantes.estado_convocatoria_estudiante', '<>', 'ELIMINAR')
                    ->where('siadi_costos.estado_costo', '<>', 'ELIMINAR');

            })
            ->where('siadi_personas.id_siadi_persona', '=', $id_persona)
            ->where('siadi_notas.final_nota', '>=', 51)
            ->orderBy('siadi_gestions.nombre_gestion', 'ASC')
            ->orderBy('siadi_convocatorias.periodo', 'ASC')
            ->orderBy('siadi_asignaturas.id_idioma', 'ASC')
            ->orderBy('siadi_asignaturas.id_nivel_idioma', 'ASC')
            ->get();

            $upea = [];
        if(count($data)>0){
            $upea = tabla_vista_mae_matriculados::select(
                'carrera',
                'registro_universitario',
                'gestion'
            )->where('id_estudiante', '=', $data[0]->id_persona_base_upea)
            #->where('gestion', '=', $data[count($data)-1]->nombre_gestion)
            ->orderBy('gestion', 'desc')->first();

            $pdf = new \App\PDF\PlantillaCertirficadosDeNotasPDF();
            $pdf->AddPage();
            
            $pdf->SetModalidadCurso("CURSO REGULAR - TGN");

            $pdf->SetNombres($data[0]->nombres_persona);
            $pdf->SetPaterno($data[0]->paterno_persona);
            $pdf->SetMaterno($data[0]->materno_persona);
            $pdf->SetCI($data[0]->ci);
            $pdf->SetRegUniv(is_null($upea)? '': $upea->registro_universitario);
            $pdf->SetCarrera(is_null($upea)? '': $upea->carrera);

            $pdf->SetCodigo('N° T-0431/2023');

            $pdf->SetData($data); # $pdf->SetData(["LIN-501", 'PORTUGUES', '1.2', '58']);
            $pdf->Output();
            exit;
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS",
                "mensaje" => "No existe datos de estudiante"
            ]);
        }


        /* return response()->json([
        "estado" => true,
        "data" => $data,
        "upea" => $upea
        ]); */
    } 
    
   
}

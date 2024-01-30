<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\Models\AdministracionModulos\SiadiNota;
use App\Models\AdministracionModulos\SiadiPersona;
use App\Models\AdministracionModulos\CertificadosProvisional;
use App\Models\base_upea\tabla_vista_mae_matriculados;

use App\PDF\PlantillaCertirficadosNotasProvisionalPDF;

use Illuminate\Support\Facades\DB as FacadesDB;

class CertificadosProvisionalController extends Controller
{
    #Route::get('certificados_provisional',[CertifiacadosProvisionalController::class, 'index'])->name('certificado_provisional.index');
    function __construct()
    {
        $this->middleware('can:certificado_provisional.index', ['only' => ['index']]);
        $this->middleware('can:certificado_provisional-lotes.index', ['only' => ['all']]);
    }

    #protected $fpdf;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion-modulos.certificado-provisional-index');
    }

    # Route::get('certificados-provisional-lote',[CertificadosProvisionalController::class, 'all'])->name('certificado_provisional-lotes.index');
    public function all()
    {
        return view('administracion-modulos.certificado-provisional-lote-index');
    }

    # Route::get('impresion_certificado_provisional_pdf/{id_certificado_provisional}/', [CertificadosProvisionalController::class, 'get_pdf_impresion_provisional'])->name('impresion_certificado_provisional');
    public function get_pdf_impresion_provisional($id_certificado_provisional)
    {
        $certif = new CertificadosProvisional();
        $certificado_provisional = $certif->get_data_certifcado($id_certificado_provisional);
        if (!is_null($certificado_provisional)) {
            $pdf = new PlantillaCertirficadosNotasProvisionalPDF();
            $pdf->SetFecha($certificado_provisional->fecha);
            
            $pdf->AddPage();
            $pdf->SetModalidadCurso($certificado_provisional->modalidad);
            $pdf->SetCodigo($certificado_provisional->codigo_certificado_provisional);
            $pdf->SetNombresCompleto($certificado_provisional->nombres_persona);
            $pdf->SetCIExtGestion($certificado_provisional->ci, $certificado_provisional->periodo_gestion);
            $pdf->SetMateriaNivel($certificado_provisional->idioma);
            $pdf->setNivelNota($certificado_provisional->nombre_nivel_idioma, $certificado_provisional->final_nota. "");

            $pdf->Output('I', "Certificado Provisional $certificado_provisional->ci.pdf");
            exit();
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS",
                "mensaje" => "No existe datos del certificado provisional"
            ]);
        }
    }

    # Route::get('certificados_provisionales_materia/{id_planificar_asgnatura}', [CertificadosProvisionalController::class, 'get_pdf_certificado_provisional_materia'])->name('certificado_provisional_plan_asignatura');
    public function get_pdf_certificado_provisional_materia($id_pla_asign)
    {
        $certif = new CertificadosProvisional();
        $certificados_prov = $certif->get_data_certificado_by_planificar_certificado($id_pla_asign);
        if (count($certificados_prov) > 0) {
            $pdfs = new PlantillaCertirficadosNotasProvisionalPDF();
            $fecha = Carbon::now();
            $pdfs->SetFecha($fecha->format('Y-m-d'));
            
            foreach ($certificados_prov as $certifified) {
                $pdfs->AddPage();

                $pdfs->SetModalidadCurso($certifified->modalidad);
                $pdfs->SetCodigo($certifified->codigo_certificado_provisional);
                $pdfs->SetNombresCompleto($certifified->nombres_persona);
                $pdfs->SetCIExtGestion($certifified->ci, $certifified->periodo_gestion);
                $pdfs->SetMateriaNivel($certifified->idioma);
                $pdfs->setNivelNota($certifified->nombre_nivel_idioma, $certifified->final_nota. "");
            }
            $pdfs->Output('I', "Certificados Provisionales " . $certificados_prov[0]->idioma . " " . $certificados_prov[0]->periodo_gestion . ".pdf");
            exit();
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS",
                "mensaje" => "No existe datos de certificados provisionales"
            ]);
        }
    }


    # Route::get('certificado_prov_notas/{id_nota}', [CertificadosProvisionalController::class, 'get_certificado_de_notas'])->name('reporte_pdf_certificado_prov_notas');
    /* public function get_certificado_de_notas($id_nota){
        $notas = SiadiNota::where('id_nota', '=', $id_nota)->first();
        if(!is_null($notas) && !is_null($notas->inscripcion->siadi_persona) && !is_null($notas->inscripcion->planificar_asignatura->siadi_asignatura->idioma)){
            $data = SiadiPersona::
                join('siadi_inscripcions', 'siadi_inscripcions.id_siadi_persona', '=', 'siadi_personas.id_siadi_persona')
                ->join('siadi_notas', 'siadi_notas.id_inscripcion', '=', 'siadi_inscripcions.id_inscripcion')
                ->join('siadi_planificar_asignaturas', 'siadi_planificar_asignaturas.id_planificar_asignatura', '=', 'siadi_inscripcions.id_planificar_asignatura')
                ->join('siadi_asignaturas', 'siadi_asignaturas.id_siadi_asignatura', '=', 'siadi_planificar_asignaturas.id_siadi_asignatura')
                ->join('siadi_idiomas', 'siadi_idiomas.id_idioma', '=', 'siadi_asignaturas.id_idioma')
                ->join('siadi_nivel_idiomas', 'siadi_nivel_idiomas.id_nivel_idioma', '=', 'siadi_asignaturas.id_nivel_idioma')
                ->join('siadi_convocatorias', 'siadi_convocatorias.id_siadi_convocatoria', '=', 'siadi_planificar_asignaturas.id_siadi_convocatoria')
                ->join('siadi_gestions', 'siadi_gestions.id_gestion', '=', 'siadi_convocatorias.id_gestion')
                ->join('siadi_modalidad_curso', 'siadi_modalidad_curso.id_convocartoria_estudiante', '=', 'siadi_convocatorias.id_modalidad_curso')
                ->join('siadi_costos', 'siadi_costos.id_costo', '=', 'siadi_convocatorias.id_costo')
                ->leftJoin('certificados_provisional', 'certificados_provisional.id_nota', '=', 'siadi_notas.id_nota')
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
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN siadi_notas.observacion_nota -- curso regular y tgn
                        ELSE siadi_modalidad_curso.nombre_convocatoria_estudiante
                    END AS resultado"),
                    \DB::raw("CONCAT(siadi_convocatorias.periodo, siadi_gestions.nombre_gestion) AS gestion"),
                    'siadi_planificar_asignaturas.carga_horaria_planificar_asignartura',

                    #modalidad
                    \DB::raw("CASE 
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante=1 THEN CONCAT(siadi_modalidad_curso.nombre_convocatoria_estudiante, ' - ', siadi_costos.tipo_costo)
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante=2 THEN 'EXAMEN DE SUFICIENCIA'
                        ELSE siadi_modalidad_curso.nombre_convocatoria_estudiante
                    END AS modalidad"),

                    'siadi_modalidad_curso.nombre_convocatoria_estudiante',
                    'siadi_costos.tipo_costo',
                    'siadi_gestions.nombre_gestion',

                    # certificado_provisional
                    'certificados_provisional.id_certificado_provisional',
                    'certificados_provisional.fecha_siadi_certificado',
                    DB::raw("CONCAT(certificados_provisional.tipo_curso, certificados_provisional.numero_siadi_certificado_prov, '/', certificados_provisional.gestion) AS codigo_certificado_provisional"),
                )
                ->where(function($query){
                    $query->where('siadi_personas.estado_persona', '<>', 'ELIMINAR')
                        ->where('siadi_inscripcions.estado_inscripcion', '<>', 'ELIMINADO')
                        ->where('siadi_notas.estado_nota', '<>', 'ELIMINAR')
                        ->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINADO')
                        ->where('siadi_asignaturas.estado_asignatura', '<>', 'ELIMINAR')
                        ->where('siadi_idiomas.estado_idioma', '<>', 'ELIMINAR')
                        ->where('siadi_nivel_idiomas.estado_nivel_idioma', '<>', 'ELIMINAR')
                        ->where('siadi_convocatorias.estado_convocatoria', '<>', 'ELIMINADO')
                        ->where('siadi_gestions.estado_gestion', '<>', 'ELIMINAR')
                        ->where('siadi_modalidad_curso.estado_convocatoria_estudiante', '<>', 'ELIMINAR')
                        ->where('siadi_costos.estado_costo', '<>', 'ELIMINAR');

                })
                ->where('siadi_personas.id_siadi_persona', '=', $notas->inscripcion->siadi_persona->id_siadi_persona) # $id_persona
                ->where('siadi_idiomas.id_idioma', '=', $notas->inscripcion->planificar_asignatura->siadi_asignatura->idioma->id_idioma)
                ->where('siadi_notas.final_nota', '>=', 51)
                ->orderBy('siadi_gestions.nombre_gestion', 'ASC')
                ->orderBy('siadi_convocatorias.periodo', 'ASC')
                ->orderBy('siadi_asignaturas.id_idioma', 'ASC')
                ->orderBy('siadi_asignaturas.id_nivel_idioma', 'ASC')
                ->get();

                $upea = [];
            $codigo = "";
            foreach($data as $tmp){
                if(!is_null($tmp->id_certificado_provisional)){
                    $codigo = $tmp->codigo_certificado_provisional;
                    break;
                }
            }
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
                
                $pdf->SetModalidadCurso($data[0]->modalidad); # CURSO REGULAR

                $pdf->SetNombres($data[0]->nombres_persona);
                $pdf->SetPaterno($data[0]->paterno_persona);
                $pdf->SetMaterno($data[0]->materno_persona);
                $pdf->SetCI($data[0]->ci);
                $pdf->SetRegUniv(is_null($upea)? '': $upea->registro_universitario);
                $pdf->SetCarrera(is_null($upea)? '': $upea->carrera);

                $pdf->SetCodigo($codigo); # T-0431/2023

                $pdf->SetData($data); # $pdf->SetData(["LIN-501", 'PORTUGUES', '1.2', '58']);
                $pdf->Output();
                exit;
            } else {
                return view('page-error', [
                    "codigo" => 202,
                    "titulo" => "NO HAY DATOS CERTIFICADO NOTAS",
                    "mensaje" => "No existe datos de estudiante"
                ]);
            }
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS DE NOTAS",
                "mensaje" => "No existe datos de estudiante"
            ]);
        }
    }  */

    public function get_certificado_de_notas($id_certificado){
        $certif  = SiadiNota::join('certificados_provisional', 'certificados_provisional.id_nota', '=', 'siadi_notas.id_nota')
            ->select('*')
            ->addSelect(
                'certificados_provisional.id_certificado_provisional',
                'certificados_provisional.fecha_siadi_certificado',
                DB::raw("CONCAT(certificados_provisional.tipo_curso, certificados_provisional.numero_siadi_certificado_prov, '/', certificados_provisional.gestion) AS codigo_certificado_de_notas"),
            )
            ->where('id_certificado_provisional', '=', $id_certificado)->first();
        if(!is_null($certif) && !is_null($certif->inscripcion->siadi_persona) && !is_null($certif->inscripcion->planificar_asignatura->siadi_asignatura->idioma)){
            $data = SiadiPersona::
                join('siadi_inscripcions', 'siadi_inscripcions.id_siadi_persona', '=', 'siadi_personas.id_siadi_persona')
                ->join('siadi_notas', 'siadi_notas.id_inscripcion', '=', 'siadi_inscripcions.id_inscripcion')
                ->join('siadi_planificar_asignaturas', 'siadi_planificar_asignaturas.id_planificar_asignatura', '=', 'siadi_inscripcions.id_planificar_asignatura')
                ->join('siadi_asignaturas', 'siadi_asignaturas.id_siadi_asignatura', '=', 'siadi_planificar_asignaturas.id_siadi_asignatura')
                ->join('siadi_idiomas', 'siadi_idiomas.id_idioma', '=', 'siadi_asignaturas.id_idioma')
                ->join('siadi_nivel_idiomas', 'siadi_nivel_idiomas.id_nivel_idioma', '=', 'siadi_asignaturas.id_nivel_idioma')
                ->join('siadi_convocatorias', 'siadi_convocatorias.id_siadi_convocatoria', '=', 'siadi_planificar_asignaturas.id_siadi_convocatoria')
                ->join('siadi_gestions', 'siadi_gestions.id_gestion', '=', 'siadi_convocatorias.id_gestion')
                ->join('siadi_modalidad_curso', 'siadi_modalidad_curso.id_convocartoria_estudiante', '=', 'siadi_convocatorias.id_modalidad_curso')
                ->join('siadi_costos', 'siadi_costos.id_costo', '=', 'siadi_convocatorias.id_costo')
                ->leftJoin('certificados_provisional', 'certificados_provisional.id_nota', '=', 'siadi_notas.id_nota')
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
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante=1 AND siadi_costos.tipo_costo='TGN' THEN siadi_notas.observacion_nota -- curso regular y tgn
                        ELSE siadi_modalidad_curso.nombre_convocatoria_estudiante
                    END AS resultado"),
                    \DB::raw("CONCAT(siadi_convocatorias.periodo, siadi_gestions.nombre_gestion) AS gestion"),
                    'siadi_planificar_asignaturas.carga_horaria_planificar_asignartura',

                    #modalidad
                    \DB::raw("CASE 
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante=1 THEN CONCAT(siadi_modalidad_curso.nombre_convocatoria_estudiante, ' - ', siadi_costos.tipo_costo)
                        WHEN siadi_modalidad_curso.id_convocartoria_estudiante=2 THEN 'EXAMEN DE SUFICIENCIA'
                        ELSE siadi_modalidad_curso.nombre_convocatoria_estudiante
                    END AS modalidad"),
                    'siadi_idiomas.nombre_idioma',

                    'siadi_modalidad_curso.nombre_convocatoria_estudiante',
                    'siadi_costos.tipo_costo',
                    'siadi_gestions.nombre_gestion',

                    # certificado_provisional
                    
                )
                ->where(function($query){
                    $query->where('siadi_personas.estado_persona', '<>', 'ELIMINAR')
                        ->where('siadi_inscripcions.estado_inscripcion', '<>', 'ELIMINADO')
                        ->where('siadi_notas.estado_nota', '<>', 'ELIMINAR')
                        ->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINADO')
                        ->where('siadi_asignaturas.estado_asignatura', '<>', 'ELIMINAR')
                        ->where('siadi_idiomas.estado_idioma', '<>', 'ELIMINAR')
                        ->where('siadi_nivel_idiomas.estado_nivel_idioma', '<>', 'ELIMINAR')
                        ->where('siadi_convocatorias.estado_convocatoria', '<>', 'ELIMINADO')
                        ->where('siadi_gestions.estado_gestion', '<>', 'ELIMINAR')
                        ->where('siadi_modalidad_curso.estado_convocatoria_estudiante', '<>', 'ELIMINAR')
                        ->where('siadi_costos.estado_costo', '<>', 'ELIMINAR');

                })
                ->where('siadi_personas.id_siadi_persona', '=', $certif->inscripcion->siadi_persona->id_siadi_persona) # $id_persona
                ->where('siadi_idiomas.id_idioma', '=', $certif->inscripcion->planificar_asignatura->siadi_asignatura->idioma->id_idioma)
                ->where('siadi_notas.final_nota', '>=', 51)
                ->orderBy('siadi_gestions.nombre_gestion', 'ASC')
                ->orderBy('siadi_convocatorias.periodo', 'ASC')
                ->orderBy('siadi_asignaturas.id_idioma', 'ASC')
                ->orderBy('siadi_asignaturas.id_nivel_idioma', 'ASC')
                ->get();

                $upea = [];
            $codigo = $certif->codigo_certificado_de_notas ;
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
                
                $pdf->SetModalidadCurso($data[0]->modalidad); # CURSO REGULAR

                $pdf->SetNombres($data[0]->nombres_persona);
                $pdf->SetPaterno($data[0]->paterno_persona);
                $pdf->SetMaterno($data[0]->materno_persona);
                $pdf->SetCI($data[0]->ci);
                $pdf->SetRegUniv(is_null($upea)? '': $upea->registro_universitario);
                $pdf->SetCarrera(is_null($upea)? '': $upea->carrera);

                $pdf->SetCodigo($codigo); # T-0431/2023
                $pdf->SetFecha($certif->fecha_siadi_certificado);

                $pdf->SetData($data); # $pdf->SetData(["LIN-501", 'PORTUGUES', '1.2', '58']);
                $pdf->Output('I', "Certificados de Notas " . $data[0]->ci ." ". $data[0]->nombre_idioma ."pdf");
                exit;
            } else {
                return view('page-error', [
                    "codigo" => 202,
                    "titulo" => "NO HAY DATOS CERTIFICADO NOTAS",
                    "mensaje" => "No existe datos de estudiante"
                ]);
            }
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS DE NOTAS",
                "mensaje" => "No existe datos de estudiante"
            ]);
        }
    } 


}

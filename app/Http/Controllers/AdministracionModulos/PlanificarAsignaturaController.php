<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Luecano\NumeroALetras\NumeroALetras;
use App\Models\AdministracionModulos\SiadiPlanificarAsignatura;
use App\Models\base_upea\tabla_vista_asignacion_control_docente_actua;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteExcel;

class PlanificarAsignaturaController extends Controller
{
     function __construct()
    {
        $this->middleware('can:planificar_asignatura.index', ['only' => ['index']]);
        $this->middleware('can:planificar_asignatura.show', ['only' => ['show']]); 
        $this->middleware('can:planificar_asignatura.acta_calificaciones', ['only' => ['reporte_pdf_asignatura']]);
        $this->middleware('can:reporte_planificar_asignatura_excel', ['only' => ['reporte_excel_asignatura']]);
    }
    public function index()
    {
        return view(
            'administracion-modulos.planificar-asignatura-index'
        );
    }

    # Route::get('planificar-asignatura/{id_planificar_asignatura}', [PlanificarAsignaturaController::class, 'show'])->name('planificar_asignatura.show');
    public function show($id){
        $asignatura = SiadiPlanificarAsignatura::where('estado_planificar_asignartura', '<>', 'ELIMINADO')->where('id_planificar_asignatura', '=', $id)->first();
        //return response()->json(['data' => $asignatura], 200);
        if(is_null($asignatura)){
            return view('page-error', [
                "codigo" => 404,
                "titulo" => "NO EXISTE ASIGNATURA",
                "mensaje" => "No existe la asignatura."
            ]);
        } else{
            return view(
                'administracion-modulos.planificar-asignatura-details', ['asignatura' => $asignatura]
            );
        }
    }

    # Route::get('reporte_asignatura/{id_planificar_asignatura}', [PlanificarAsignaturaController::class, 'reporte_pdf_asignatura'])->name('reporte_planificar_asignatura');
    public function reporte_pdf_asignatura($id_planificar_asignatura){
    	$id_planificar_asignatura = intval(base64_decode($id_planificar_asignatura));
        $reporte = SiadiPlanificarAsignatura::
            join('siadi_inscripcions as sins', 'sins.id_planificar_asignatura', '=', 'siadi_planificar_asignaturas.id_planificar_asignatura')
            ->join('siadi_notas as sn', 'sn.id_inscripcion', '=', 'sins.id_inscripcion')
            ->join('siadi_personas as sps', 'sps.id_siadi_persona', '=', 'sins.id_siadi_persona')
            ->join('siadi_convocatorias as sc', 'siadi_planificar_asignaturas.id_siadi_convocatoria', '=', 'sc.id_siadi_convocatoria')
            ->join('siadi_asignaturas as sa', 'sa.id_siadi_asignatura', '=', 'siadi_planificar_asignaturas.id_siadi_asignatura')
            ->join('siadi_idiomas as si', 'si.id_idioma', '=', 'sa.id_idioma')
            ->join('siadi_nivel_idiomas as sni', 'sni.id_nivel_idioma', '=', 'sa.id_nivel_idioma')
            ->join('siadi_paralelos as sp', 'sp.id_paralelo', '=', 'siadi_planificar_asignaturas.id_paralelo')
            ->join('siadi_modalidad_curso AS smc', 'smc.id_convocartoria_estudiante', '=', 'sc.id_modalidad_curso')
            ->join('siadi_costos as sco', 'sco.id_costo', '=', 'sc.id_costo')
            ->join('siadi_gestions as sg', 'sg.id_gestion', '=', 'sc.id_gestion')
            ->join('siadi_sede as ss', 'ss.id_siadi_sede', '=', 'sc.id_siadi_sede')

            ->leftJoin('base_upea.persona as sp_docente', 'sp_docente.id', '=', 'siadi_planificar_asignaturas.id_asignacion_docente')
            ->leftJoin('base_upea.vista_nombramiento_general as nombramiento', 'nombramiento.codex', '=', 'siadi_planificar_asignaturas.id_asignacion_nombramiento')

            ->select(
                'siadi_planificar_asignaturas.id_planificar_asignatura',
                \DB::raw("CASE
                    WHEN smc.id_convocartoria_estudiante=2 THEN 'EXAMEN DE SUFICIENCIA'
                    WHEN smc.id_convocartoria_estudiante=1 AND sco.tipo_costo='TGN' THEN 'TGN'
                    WHEN smc.id_convocartoria_estudiante=1 THEN sco.tipo_costo 
                    WHEN smc.id_convocartoria_estudiante IN(3, 6, 7, 8) THEN SUBSTRING_INDEX(smc.nombre_convocatoria_estudiante, ' ', 1)
                    ELSE smc.nombre_convocatoria_estudiante
                END AS curso"),
                \DB::raw("CONCAT(si.nombre_idioma, ' ', sni.descripcion_nivel_idioma, ' ', sni.nombre_nivel_idioma) AS asigntura"),
                \DB::raw("CONCAT(sni.id_nivel_idioma,  
                    CASE siadi_planificar_asignaturas.turno_paralelo
                        WHEN 'Mañana' THEN 'M'
                        WHEN 'Tarde' THEN 'T'
                        WHEN 'Noche' THEN 'N'
                        WHEN 'Sin Turno' THEN 'SN'
                        ELSE 'NN'
                    END, ' \"',
                    sp.nombre_paralelo, '\"'
                ) AS paralelo"),
                \DB::raw("CONCAT(sc.periodo, '-', sg.nombre_gestion) AS gestion"),
                'sa.sigla_asignatura', 
                'siadi_planificar_asignaturas.id_asignacion_docente',

                # DATOS ESTUDIANTE
                \DB::raw('UPPER(sps.paterno_persona) AS paterno_persona'),
                \DB::raw('UPPER(sps.materno_persona) AS materno_persona'),
                \DB::raw('UPPER(sps.nombres_persona) AS nombres_persona'),
                'sps.ci_persona', 
                'sps.expedido_persona', 

                # notas
                \DB::raw("CASE 
                    WHEN sn.observaciones_detalle = 'INSCRITO' THEN '---'
                    ELSE sn.final_nota
                END AS final_nota"),
                \DB::raw("CASE
                    WHEN sn.observaciones_detalle = 'INSCRITO' THEN sn.observaciones_detalle
                    ELSE sn.observacion_nota
                END AS observacion_nota"),    

                #DATOS DOCENTE
                'siadi_planificar_asignaturas.id_asignacion_docente',
                'ss.id_sede',

                \DB::raw("CASE 
                    WHEN siadi_planificar_asignaturas.id_asignacion_docente IS NULL THEN ''
                    ELSE CONCAT(
                        CASE
                            WHEN nombramiento.id_persona = sp_docente.id AND nombramiento.grado_nombramiento IS NOT NULL THEN CONCAT(nombramiento.grado_nombramiento, ' ')
                            ELSE ''
                        END,
                        sp_docente.nombre, ' ', sp_docente.paterno, ' ', sp_docente.materno )
                END nombre_docente"),

                # si es examen 
                \DB::raw("CASE
                    WHEN siadi_planificar_asignaturas.resolucion_rhcc IS NOT NULL AND TRIM(siadi_planificar_asignaturas.resolucion_rhcc) <> '' THEN siadi_planificar_asignaturas.resolucion_rhcc
                    ELSE '---'
                END resolucion_rhcc"),
                'smc.id_convocartoria_estudiante',

                \DB::raw("CASE
                    WHEN nombramiento.id_persona = sp_docente.id THEN nombramiento.item_nombramiento
                    ELSE ''
                END cod_nombramiento"),



                # otros
                'ss.direccion',
                \DB::raw("CONCAT(sp.nombre_paralelo , ' - ', siadi_planificar_asignaturas.turno_paralelo) AS nom_paralelo"),

                # fecha
                \DB::raw("CONCAT(sg.nombre_gestion, '-',
                    CASE
                        WHEN sc.periodo='I' THEN '06-30'
                        WHEN sc.periodo='II' THEN '12-31'
                        ELSE '12-31'
                    END) AS fecha"),
            )
            ->where('siadi_planificar_asignaturas.id_planificar_asignatura', '=', $id_planificar_asignatura)
            ->where(function($query){
                $query->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINAR');
                $query->where('sins.estado_inscripcion', '<>', 'ELIMINAR');
                $query->where('sn.estado_nota', '<>', 'ELIMINAR');
                $query->where('sps.estado_persona', '<>', 'ELIMINAR');
                $query->where('si.estado_idioma', '<>', 'ELIMINAR');
                $query->where('sni.estado_nivel_idioma', '<>', 'ELIMINAR');
                $query->where('sp.estado_paralelo', '<>', 'ELIMINAR');
                $query->where('smc.estado_convocatoria_estudiante', '<>', 'ELIMINAR');
                $query->where('sco.estado_costo', '<>', 'ELIMINAR');
                $query->where('sg.estado_gestion', '<>', 'ELIMINAR');
                $query->where('ss.estado_siadi_sede', '<>', 'ELIMINAR');
            })
            ->orderBy('sps.paterno_persona', 'asc')
            ->get();
        if(count($reporte)>0){
            $data_nombramiento = $reporte[0]->id_convocartoria_estudiante==2? $reporte[0]->resolucion_rhcc: $reporte[0]->cod_nombramiento ; 
            $pdf = new \App\PDF\PlantillaReportePDF();
            $pdf->SetDataCabezera(
                $reporte[0]->asigntura, # asignatura
                $reporte[0]->nombre_docente, #is_null($docente)? "": $docente->nombre_docente, # docente
                $reporte[0]->curso, # curso
                $reporte[0]->paralelo, # paralelo - turno
                $reporte[0]->sigla_asignatura, # sigla
                $reporte[0]->gestion, # gestion
                is_null($data_nombramiento)? "": $data_nombramiento, #  nombramiento docente
                $reporte[0]->fecha, #fecha dic, jun
                $reporte[0]->id_convocartoria_estudiante==2 # 2, examen de suficiencia
            );
            
            # $this->Altura = $this->CeldaAlto;
            $contador = 0;
            $contar_celda = 0;
            $bordeCelda = 1;

            $aprobados = 0;
            $reprobados = 0;
            $nsp = 0;

            $pdf->AddPage();

            $nombre_archivo = utf8_decode( $reporte[0]->asigntura .' - '. $reporte[0]->nom_paralelo .' - '. $reporte[0]->direccion .' '. $reporte[0]->gestion );
            foreach($reporte as $datos_estudiante){
                $pdf->SetFont('Arial', '', 6);
                $pdf->SetXY(18, $pdf->Altura+($contar_celda*$pdf->CeldaAlto));
                $pdf->Cell(8, $pdf->CeldaAlto, utf8_decode($contador+1), $bordeCelda, 0, 'C');
                //$pdf->SetFont('Arial', '', 4);
                $pdf->Cell(25, $pdf->CeldaAlto, utf8_decode($datos_estudiante->paterno_persona), $bordeCelda, 0, 'L');
                $pdf->Cell(25, $pdf->CeldaAlto, utf8_decode($datos_estudiante->materno_persona), $bordeCelda, 0, 'L');
                $pdf->Cell(30, $pdf->CeldaAlto, utf8_decode($datos_estudiante->nombres_persona), $bordeCelda, 0, 'L');
                $pdf->Cell(18, $pdf->CeldaAlto, utf8_decode($datos_estudiante->ci_persona), $bordeCelda, 0, 'C');
                $pdf->Cell(7, $pdf->CeldaAlto, utf8_decode($datos_estudiante->expedido_persona), $bordeCelda, 0, 'C');
                $pdf->Cell(20, $pdf->CeldaAlto, utf8_decode('ESTUDIANTE'), $bordeCelda, 0, 'C');
                $pdf->Cell(8, $pdf->CeldaAlto, utf8_decode($datos_estudiante->final_nota<1?'-':$datos_estudiante->final_nota), $bordeCelda, 0, 'C');
                $formatter = new NumeroALetras();
                $pdf->Cell(25, $pdf->CeldaAlto, utf8_decode($datos_estudiante->final_nota<1? '-' :$formatter->toString($datos_estudiante->final_nota)), $bordeCelda, 0, 'C');
                $pdf->Cell(20, $pdf->CeldaAlto, utf8_decode($datos_estudiante->observacion_nota), $bordeCelda, 0, 'C');

                if($datos_estudiante->final_nota=='-' || $datos_estudiante->final_nota=='---' || $datos_estudiante->final_nota==0){
                    $nsp++;
                } else {
                    if($datos_estudiante->final_nota>=51){
                        $aprobados++;
                    } else {
                        $reprobados++;
                    }
                }

                $contador++;
                $contar_celda++;
                if($contador%40==0 && count($reporte)%40!==0){
                    $pdf->AddPage();
                    $contar_celda = 0;
                }
            }
            
            $registros = count($reporte);
            if($registros%40!==0){
            if($contar_celda%40==0 && $contar_celda!==0){ # 40
                $pdf->AddPage();
                $contar_celda = 0;
            }
            
            $pdf->SetFont('Arial', '', 6);
            $pdf->SetXY(18, $pdf->Altura+($contar_celda*$pdf->CeldaAlto));
            $pdf->Cell(8, $pdf->CeldaAlto, utf8_decode('XXX'), $bordeCelda, 0, 'C');
            $pdf->Cell(25, $pdf->CeldaAlto, utf8_decode('XXXXXXXXXXXXXXXX'), $bordeCelda, 0, 'L');
            $pdf->Cell(25, $pdf->CeldaAlto, utf8_decode('XXXXXXXXXXXXXXXX'), $bordeCelda, 0, 'L');
            $pdf->Cell(30, $pdf->CeldaAlto, utf8_decode('XXXXXXXXXXXXXXXXXXXX'), $bordeCelda, 0, 'L');
            $pdf->Cell(18, $pdf->CeldaAlto, utf8_decode('XXXXXXXXXXX'), $bordeCelda, 0, 'C');
            $pdf->Cell(7, $pdf->CeldaAlto, utf8_decode('XXX'), $bordeCelda, 0, 'C');
            $pdf->Cell(20, $pdf->CeldaAlto, utf8_decode('XXXXXXXXXXXXX'), $bordeCelda, 0, 'C');
            $pdf->Cell(8, $pdf->CeldaAlto, utf8_decode('XXXX'), $bordeCelda, 0, 'C');
            $pdf->Cell(25, $pdf->CeldaAlto, utf8_decode('XXXXXXXXXXXXXXXXX'), $bordeCelda, 0, 'C');
            $pdf->Cell(20, $pdf->CeldaAlto, utf8_decode('XXXXXXXXXXXXX'), $bordeCelda, 0, 'C');
        

            $contar_celda++;
            //$contador_celda_aux = $contar_celda;
            for($i=$contar_celda; $i<40; $i++){
                $pdf->SetXY(18, $pdf->Altura+($i*$pdf->CeldaAlto));
                $pdf->Cell(8, $pdf->CeldaAlto, '', $bordeCelda, 0, 'C');
                $pdf->Cell(25, $pdf->CeldaAlto, '', $bordeCelda, 0, 'L');
                $pdf->Cell(25, $pdf->CeldaAlto, '', $bordeCelda, 0, 'L');
                $pdf->Cell(30, $pdf->CeldaAlto, '', $bordeCelda, 0, 'L');
                $pdf->Cell(18, $pdf->CeldaAlto, '', $bordeCelda, 0, 'C');
                $pdf->Cell(7, $pdf->CeldaAlto, '', $bordeCelda, 0, 'C');
                $pdf->Cell(20, $pdf->CeldaAlto, '', $bordeCelda, 0, 'C');
                $pdf->Cell(8, $pdf->CeldaAlto, '', $bordeCelda, 0, 'C');
                $pdf->Cell(25, $pdf->CeldaAlto, '', $bordeCelda, 0, 'C');
                $pdf->Cell(20, $pdf->CeldaAlto, '', $bordeCelda, 0, 'C');
            }

            } //end 40 $resgistros

            // Cuadro total estudiantes
            $pdf->SetFont('Arial', 'B', 10);
            $posCuadroY = 251.5;
            $pdf->SetXY(120, $posCuadroY);
            $pdf->Cell(40, $pdf->CeldaAlto, utf8_decode('CUADRO RESUMEN'), 1, 0, 'C');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode('N°'), 1, 0, 'C');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode('%'), 1, 0, 'C');

            $pdf->SetFont('Arial', '', 6);
            $pdf->SetXY(120, $posCuadroY + $pdf->CeldaAlto*1);
            $pdf->Cell(40, $pdf->CeldaAlto, utf8_decode('APROBADOS'), 1, 0, 'L');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode($aprobados), 1, 0, 'C');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode(number_format(($aprobados * 100) / $registros, 2) . '%'), 1, 0, 'C');

            $pdf->SetXY(120, $posCuadroY + $pdf->CeldaAlto*2);
            $pdf->Cell(40, $pdf->CeldaAlto, utf8_decode('REPROBADOS'), 1, 0, 'L');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode($reprobados), 1, 0, 'C');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode(number_format(($reprobados * 100) / $registros, 2) . '%'), 1, 0, 'C');

            $pdf->SetXY(120, $posCuadroY + $pdf->CeldaAlto*3);
            $pdf->Cell(40, $pdf->CeldaAlto, utf8_decode('NO SE PRESENTÓ'), 1, 0, 'L');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode($nsp), 1, 0, 'C');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode(number_format(($nsp * 100) / $registros, 2) . '%'), 1, 0, 'C');

            //$pdf->SetFont('Arial', 'B', 7);
            $pdf->SetXY(120, $posCuadroY + $pdf->CeldaAlto*4);
            $pdf->Cell(40, $pdf->CeldaAlto, utf8_decode('TOTAL'), 1, 0, 'C');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode($registros), 1, 0, 'C');
            $pdf->Cell(10, $pdf->CeldaAlto, utf8_decode(($registros * 100) / $registros . '%'), 1, 0, 'C');

            
            $pdf->Output("I", $nombre_archivo);
            exit;
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS",
                "mensaje" => "No existe datos de la asignatura"
            ]);
        }
    }


    private function get_data_asignatura($id_planificar_asignatura){
        $reporte = SiadiPlanificarAsignatura::
            join('siadi_inscripcions as sins', 'sins.id_planificar_asignatura', '=', 'siadi_planificar_asignaturas.id_planificar_asignatura')
            ->join('siadi_notas as sn', 'sn.id_inscripcion', '=', 'sins.id_inscripcion')
            ->join('siadi_personas as sps', 'sps.id_siadi_persona', '=', 'sins.id_siadi_persona')
            ->join('siadi_convocatorias as sc', 'siadi_planificar_asignaturas.id_siadi_convocatoria', '=', 'sc.id_siadi_convocatoria')
            ->join('siadi_asignaturas as sa', 'sa.id_siadi_asignatura', '=', 'siadi_planificar_asignaturas.id_siadi_asignatura')
            ->join('siadi_idiomas as si', 'si.id_idioma', '=', 'sa.id_idioma')
            ->join('siadi_nivel_idiomas as sni', 'sni.id_nivel_idioma', '=', 'sa.id_nivel_idioma')
            ->join('siadi_paralelos as sp', 'sp.id_paralelo', '=', 'siadi_planificar_asignaturas.id_paralelo')
            ->join('siadi_modalidad_curso AS smc', 'smc.id_convocartoria_estudiante', '=', 'sc.id_modalidad_curso')
            ->join('siadi_costos as sco', 'sco.id_costo', '=', 'sc.id_costo')
            ->join('siadi_gestions as sg', 'sg.id_gestion', '=', 'sc.id_gestion')
            ->join('siadi_sede as ss', 'ss.id_siadi_sede', '=', 'sc.id_siadi_sede')

            ->leftJoin('base_upea.persona as sp_docente', 'sp_docente.id', '=', 'siadi_planificar_asignaturas.id_asignacion_docente')
            ->leftJoin('base_upea.vista_nombramiento_general as nombramiento', 'nombramiento.codex', '=', 'siadi_planificar_asignaturas.id_asignacion_nombramiento')

            ->select(
                'siadi_planificar_asignaturas.id_planificar_asignatura',
                \DB::raw("CASE
                    WHEN smc.id_convocartoria_estudiante=2 THEN 'EXAMEN DE SUFICIENCIA'
                    WHEN smc.id_convocartoria_estudiante=1 AND sco.tipo_costo='TGN' THEN 'TGN'
                    WHEN smc.id_convocartoria_estudiante=1 THEN sco.tipo_costo 
                    WHEN smc.id_convocartoria_estudiante IN(3, 6, 7, 8) THEN SUBSTRING_INDEX(smc.nombre_convocatoria_estudiante, ' ', 1)
                    ELSE smc.nombre_convocatoria_estudiante
                END AS curso"),
                'smc.id_convocartoria_estudiante',
                \DB::raw("CONCAT(si.nombre_idioma, ' ', sni.descripcion_nivel_idioma, ' ', sni.nombre_nivel_idioma) AS asignatura"),
                \DB::raw("CONCAT(sni.id_nivel_idioma,  
                    CASE siadi_planificar_asignaturas.turno_paralelo
                        WHEN 'Mañana' THEN 'M'
                        WHEN 'Tarde' THEN 'T'
                        WHEN 'Noche' THEN 'N'
                        WHEN 'Sin Turno' THEN 'SN'
                        ELSE 'NN'
                    END, ' \"',
                    sp.nombre_paralelo, '\"'
                ) AS paralelo"),
                \DB::raw("CONCAT(sc.periodo, '-', sg.nombre_gestion) AS gestion"),
                'sa.sigla_asignatura', 
                'siadi_planificar_asignaturas.id_asignacion_docente',

                # DATOS ESTUDIANTE
                \DB::raw('UPPER(sps.paterno_persona) AS paterno_persona'),
                \DB::raw('UPPER(sps.materno_persona) AS materno_persona'),
                \DB::raw('UPPER(sps.nombres_persona) AS nombres_persona'),
                'sps.ci_persona', 
                'sps.expedido_persona', 

                # notas
                \DB::raw("CASE 
                    WHEN sn.observaciones_detalle = 'INSCRITO' OR sn.final_nota=0 THEN '---'
                    ELSE sn.final_nota
                END AS final_nota"),
                \DB::raw("CASE
                    WHEN sn.observaciones_detalle = 'INSCRITO' THEN sn.observaciones_detalle
                    ELSE sn.observacion_nota
                END AS observacion_nota"),    

                #DATOS DOCENTE
                'siadi_planificar_asignaturas.id_asignacion_docente',
                'ss.id_sede',

                \DB::raw("CASE 
                    WHEN siadi_planificar_asignaturas.id_asignacion_docente IS NULL THEN '---'
                    ELSE CONCAT(
                        CASE
                            WHEN nombramiento.id_persona = sp_docente.id AND nombramiento.grado_nombramiento IS NOT NULL THEN CONCAT(nombramiento.grado_nombramiento, ' ')
                            ELSE ''
                        END,
                        sp_docente.nombre, ' ', sp_docente.paterno, ' ', sp_docente.materno )
                END nombre_docente"),
                
                # si es examen 
                \DB::raw("CASE
                    WHEN siadi_planificar_asignaturas.resolucion_rhcc IS NOT NULL AND TRIM(siadi_planificar_asignaturas.resolucion_rhcc) <> '' THEN siadi_planificar_asignaturas.resolucion_rhcc
                    ELSE '---'
                END resolucion_rhcc"),

                \DB::raw("CASE
                    WHEN nombramiento.id_persona = sp_docente.id THEN nombramiento.item_nombramiento
                    ELSE '---'
                END cod_nombramiento"),

                # otros
                'ss.direccion',
                \DB::raw("CONCAT(sp.nombre_paralelo , ' - ', siadi_planificar_asignaturas.turno_paralelo) AS nom_paralelo"),
                
                # TOTALES
                \DB::raw( $this->get_data_count_by_plan_asignatura('total_estudiantes' ) ),
                \DB::raw( $this->get_data_count_by_plan_asignatura('total_aprobados', "sn2.final_nota BETWEEN 51 AND 100" ) ),
                \DB::raw( $this->get_data_count_by_plan_asignatura('total_reprobados', "sn2.final_nota BETWEEN 1 AND 50" ) ),
                \DB::raw( $this->get_data_count_by_plan_asignatura('total_no_se_presento', "sn2.final_nota = 0" ) ),
            )
            ->where('siadi_planificar_asignaturas.id_planificar_asignatura', '=', $id_planificar_asignatura)
            ->where(function($query){
                $query->where('siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINADO');
                $query->where('sins.estado_inscripcion', '<>', 'ELIMINADO');
                $query->where('sn.estado_nota', '<>', 'ELIMINAR');
                $query->where('sps.estado_persona', '<>', 'ELIMINAR');
                $query->where('si.estado_idioma', '<>', 'ELIMINAR');
                $query->where('sni.estado_nivel_idioma', '<>', 'ELIMINAR');
                $query->where('sp.estado_paralelo', '<>', 'ELIMINAR');
                $query->where('smc.estado_convocatoria_estudiante', '<>', 'ELIMINADO');
                $query->where('sco.estado_costo', '<>', 'ELIMINAR');
                $query->where('sg.estado_gestion', '<>', 'ELIMINAR');
                $query->where('ss.estado_siadi_sede', '<>', 'ELIMINAR');
            })
            ->orderBy('sps.paterno_persona', 'asc')
            ->get();
        if(count($reporte)>0){
            $nuevo = [];
            $contador = 1;
            foreach($reporte as $datos_estudiante){
                $tmp['nro'] = $contador;
                $tmp['paterno_persona'] = $datos_estudiante->paterno_persona;
                $tmp['materno_persona'] = $datos_estudiante->materno_persona;
                $tmp['nombres_persona'] = $datos_estudiante->nombres_persona;
                $tmp['ci_persona'] = $datos_estudiante->ci_persona;
                $tmp['expedido_persona'] = $datos_estudiante->expedido_persona;
                $tmp['categoria'] = "ESTUDIANTE";
                $tmp['final_nota'] = $datos_estudiante->final_nota<1?'-':$datos_estudiante->final_nota;
                $formatter = new NumeroALetras();
                $tmp['calificacion_literal'] = $datos_estudiante->final_nota<1? '-' : trim($formatter->toString($datos_estudiante->final_nota));
                $tmp['observacion_nota'] = $datos_estudiante->observacion_nota;

                #otros
                $tmp['asigntura'] = $datos_estudiante->asigntura;
                $tmp['curso'] = $datos_estudiante->curso;
                $tmp['gestion'] = $datos_estudiante->gestion;

                #$nuevo[] = $tmp;
                $datos_estudiante->nro = $contador;
                $datos_estudiante->categoria = "ESTUDIANTE";
                #$datos_estudiante->final_nota = $datos_estudiante->final_nota<1?'-':$datos_estudiante->final_nota;
                $datos_estudiante->calificacion_literal = $datos_estudiante->final_nota<1? '-' :trim($formatter->toString($datos_estudiante->final_nota));
                $nuevo[] = $datos_estudiante;

                $contador++;
            }
            return $nuevo;
        } else {
            return [];
        }
    }

    private function get_data_count_by_plan_asignatura($show_as, $condition = null){
        $where_filter = is_null($condition) || trim($condition)==""? "": "AND $condition";
        return "(
            SELECT 
                COUNT(sn2.id_nota)
            FROM siadi_inscripcions as sins2
                INNER JOIN siadi_notas as sn2 ON(sn2.id_inscripcion = sins2.id_inscripcion)
                INNER JOIN siadi_personas as sps2 ON(sps2.id_siadi_persona = sins2.id_siadi_persona)
                INNER JOIN siadi_convocatorias as sc2 ON(siadi_planificar_asignaturas.id_siadi_convocatoria = sc2.id_siadi_convocatoria)
                INNER JOIN siadi_asignaturas as sa2 ON(sa2.id_siadi_asignatura = siadi_planificar_asignaturas.id_siadi_asignatura)
                INNER JOIN siadi_idiomas as si2 ON(si2.id_idioma = sa2.id_idioma)
                INNER JOIN siadi_nivel_idiomas as sni2 ON(sni2.id_nivel_idioma = sa2.id_nivel_idioma)
                INNER JOIN siadi_paralelos as sp2 ON(sp2.id_paralelo = siadi_planificar_asignaturas.id_paralelo)
                INNER JOIN siadi_modalidad_curso AS smc2 ON(smc2.id_convocartoria_estudiante = sc2.id_modalidad_curso)
                INNER JOIN siadi_costos as sco2 ON(sco2.id_costo = sc2.id_costo)
                INNER JOIN siadi_gestions as sg2 ON(sg2.id_gestion = sc2.id_gestion)
                INNER JOIN siadi_sede as ss2 ON(ss2.id_siadi_sede = sc2.id_siadi_sede)
            WHERE 
                sins2.id_planificar_asignatura = siadi_planificar_asignaturas.id_planificar_asignatura

                -- start where not ELIMINAR
                -- siadi_planificar_asignaturas.estado_planificar_asignartura', '<>', 'ELIMINADO'
                AND sins2.estado_inscripcion <> 'ELIMINADO'
                AND sn2.estado_nota <> 'ELIMINAR'
                AND sps2.estado_persona <> 'ELIMINAR'
                AND si2.estado_idioma <> 'ELIMINAR'
                AND sni2.estado_nivel_idioma <> 'ELIMINAR'
                AND sp2.estado_paralelo <> 'ELIMINAR'
                AND smc2.estado_convocatoria_estudiante <> 'ELIMINADO'
                AND sco2.estado_costo <> 'ELIMINAR'
                AND sg2.estado_gestion <> 'ELIMINAR'
                AND ss2.estado_siadi_sede <> 'ELIMINAR'
                --   end where not ELIMINAR
                $where_filter
        ) AS $show_as";
    }

    # Route::get('reporte_asignatura_csv/{id_planificar_asignatura}', [PlanificarAsignaturaController::class, 'csv_asignatura'])->name('reporte_planificar_asignatura_csv');
    public function csv_asignatura($id_planificar_asignatura){
        $id_planificar_asignatura = intval(base64_decode($id_planificar_asignatura));
        $data = $this->get_data_asignatura($id_planificar_asignatura);
        if(count($data)>0){
            $headers = [
                'Content-Type' => 'text/csv; charset=utf-8',
            ];
            #echo json_encode($data);
            $name_file = $data[0]['asigntura']. ' '. $data[0]['curso'] .' '. $data[0]['gestion'] .'.csv';
            return response()->streamDownload(function () use($data){
                echo "N°;APELLIDO PATERNO;APELLIDO MATERNO;NOMBRE(S);N° DE CEDULA DE IDENTIDAD;EXP.;CATEGORÍA;C.F. s/100 pts.;CALIFICACIÓN LITERAL;RESULTADO\n";
                
                foreach($data as $inscritos ){
                    $text = $inscritos['nro']. ';'.
                            $inscritos['paterno_persona']. ';'.
                            $inscritos['materno_persona']. ';'.
                            $inscritos['nombres_persona']. ';'.
                            $inscritos['ci_persona']. ';'.
                            $inscritos['expedido_persona']. ';'.
                            $inscritos['categoria']. ';'.
                            $inscritos['final_nota']. ';'.
                            $inscritos['calificacion_literal']. ';'.
                            $inscritos['observacion_nota']. "\n";
                    echo $text;
                }
            }, $name_file, $headers);
        }else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS",
                "mensaje" => "No existe datos de la asignatura"
            ]);
        }
    }

    # Route::get('reporte_asignatura_excel/{id_planificar_asignatura}', [PlanificarAsignaturaController::class, 'reporte_excel_asignatura'])->name('reporte_planificar_asignatura_excel');
    public function reporte_excel_asignatura($id_planificar_asignatura){
        $id_planificar_asignatura = intval(base64_decode($id_planificar_asignatura));
        $data = $this->get_data_asignatura($id_planificar_asignatura);
        if(count($data)>0){
            $name_file = $data[0]->asignatura. ' '. $data[0]->curso .' '. $data[0]->gestion .'.xlsx';
            #return response()->json([ "status" => true, "data" => $data]);
            return Excel::download(new ReporteExcel($data), $name_file);
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS EXCEL",
                "mensaje" => "No existe datos de la asignatura."
            ]);
        }
    }
}

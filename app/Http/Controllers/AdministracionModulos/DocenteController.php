<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use App\Models\AdministracionModulos\SiadiInscripcion;
use App\Models\AdministracionModulos\SiadiPlanificarAsignatura;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Codedge\Fpdf\Fpdf\Fpdf;
class DocenteController extends Controller
{
    function __construct()
    {
         $this->middleware('can:docente.materias', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view('administracion-modulos.materias-docente-index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function reporte_docente($asignatura ,$id_persona){

        $inscripciones=SiadiInscripcion::where('id_planificar_asignatura', $asignatura)->get();
            


        $docente = DB::connection('base_upea')
            ->selectOne("SELECT *
        FROM vista_asignacion_control_docente_actua v 
        WHERE v.id_persona = $id_persona ");
        $pdf=new FPDF();
        
        $pdf->AddPage();
        $pdf->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
           $pdf->AddFont('Erinal', 'I', 'Erinal.php');
        $pdf->AddFont('Episode', 'I', 'Episode.php');
        $pdf->AddFont('Splash', 'I', 'Splash.php');
        $pdf->AddFont('helvetica', 'I', 'helvetica.php');
       // $pdf->Image('assets/imagenes/logos/logo_upea_pdf.gif', 15,8, 25, 25);
        $pdf->SetTextColor(0, 0, 0); //Color del texto: Negro
        $pdf->SetFont('EdwardianScriptITC', 'I', 38);
        $pdf->Cell(0, 5, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');  // $pdf->Cell(ANCHO, ALTO, 'UNIVERSIDAD PUBLICA DE EL ALTO', margen, 1=seguido, 'alineacion'); 
        $pdf->SetFont('Arial', 'I', 6);
        $pdf->Cell(0, 9, 'Creada por Ley 2115 del 5 de Septiembre de 2000 y '.utf8_decode('Autónoma').' por Ley 2556 del 12 de Noviembre de 2003', 0, 1, 'C');
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 2, utf8_decode('DEPARTAMENTO DE IDIOMAS'), 0, 1, 'C');
        $pdf->Cell(0, 10, utf8_decode('ACTA DE CALIFICACIONES'), 0, 1, 'C');



         // $listaEncabezadoAsignatura=$this->listaEncabezado;
      //  $asignaturasDocente=$this->asignaturaDocente;
        //$grado = $this->grado;
		//------------------------------------encabezado
        $pdf->SetFont('Arial', 'B', 10);
        $tam=5;
        $bordeCelda=0;

        $pdf->Cell(120, $tam,utf8_decode('Área: CIENCIAS SOCIALES'), $bordeCelda, 0, 'L');
        foreach($inscripciones as $asignacionDocente){}
        	$pdf->Cell(66, $tam,utf8_decode(strtoupper($asignacionDocente->texto_siadi_asignacion)), $bordeCelda, 1, 'C');		
        $pdf->Cell(129, $tam,utf8_decode('Carrera: LINGÜÍSTICA E IDIOMAS'), $bordeCelda, 0, 'L');
        $valorUltimo = substr($listaEncabezadoAsignatura->nivel_siadi_nivel_idioma, -1);
        $jd = substr($listaEncabezadoAsignatura->turno_siadi_turno,0,1);
        $ma = strpos($listaEncabezadoAsignatura->turno_siadi_turno,'MAÑANA');
        if(!empty($ma)){
        	$turno='M';
        } else {
        	$tar = strpos($listaEncabezadoAsignatura->turno_siadi_turno,'TARDE');
        	if(!empty($tar))
        	{
        		$turno='T';
        	} else {
        		$turno='N';
        	}
        }

        $pos = strpos($listaEncabezadoAsignatura->convocatoria_siadi_convocatoria_estudiante,'REGULAR');
        $posAux = strpos($listaEncabezadoAsignatura->nombre,'TGN');

       

        // if ($listaEncabezadoAsignatura->nivel_siadi_nivel_idioma == '1.1') {
        //     $nro_curso = '1';
        // }elseif ($listaEncabezadoAsignatura->nivel_siadi_nivel_idioma == '1.2') {
        //     $nro_curso = '2';
        // }elseif ($listaEncabezadoAsignatura->nivel_siadi_nivel_idioma == '2.1') {
        //     $nro_curso = '3';
        // }elseif ($listaEncabezadoAsignatura->nivel_siadi_nivel_idioma == '2.2') {
        //     $nro_curso = '4';
        // }elseif ($listaEncabezadoAsignatura->nivel_siadi_nivel_idioma == '3.1') {
        //     $nro_curso = '5';
        // }elseif ($listaEncabezadoAsignatura->nivel_siadi_nivel_idioma == '3.2') {
        //     $nro_curso = '6';
        // }

        // if(!empty($pos) && !empty($posAux)){
        // 	$tipoCurso='Curso: TGN';
        // 	$alinear='L';
        // 	// $paralelo='Paralelo: '.$valorUltimo.''.$jd.' "'.$listaEncabezadoAsignatura->paralelo_siadi_paralelo.'"';
        //     $paralelo='Paralelo: '.$nro_curso.''.$jd.' "'.$listaEncabezadoAsignatura->paralelo_siadi_paralelo.'"';
        // 	$siglaCodigo='Sigla-Código: '.$listaEncabezadoAsignatura->sigla_codigo_siadi_idioma;
        // 	$gestion='Gestión: '.$listaEncabezadoAsignatura->periodo_siadi_planificacion.'-'.$listaEncabezadoAsignatura->anio_siadi_gestion;
        // } else {
        // 	$pos = strpos($listaEncabezadoAsignatura->nombre,'PROPIOS');
        // 	$posAux = strpos($listaEncabezadoAsignatura->convocatoria_siadi_convocatoria_estudiante,'EXAMEN');
        // 	if(!empty($pos) && empty($posAux))
        // 	{
        // 		$tipoCurso='Curso: AUTOFINANCIADO';
        // 		$alinear='L';
        // 		// $paralelo='Paralelo: '.$valorUltimo.''.$turno.' "'.$listaEncabezadoAsignatura->paralelo_siadi_paralelo.'"';
        //         $paralelo='Paralelo: '.$nro_curso.''.$turno.' "'.$listaEncabezadoAsignatura->paralelo_siadi_paralelo.'"';
        // 		$siglaCodigo='Sigla-Código: '.$listaEncabezadoAsignatura->sigla_codigo_siadi_idioma;
        // 		$gestion='Gestión: '.$listaEncabezadoAsignatura->periodo_siadi_planificacion.'-'.$listaEncabezadoAsignatura->anio_siadi_gestion;
        // 	}  else  {
        // 		$tipoCurso='EXAMEN DE SUFICIENCIA';
        // 		$alinear='L';
        // 		$paralelo='Sigla-Código: '.$listaEncabezadoAsignatura->sigla_codigo_siadi_idioma;
        // 		$siglaCodigo='Gestión: '.$listaEncabezadoAsignatura->periodo_siadi_planificacion.'-'.$listaEncabezadoAsignatura->anio_siadi_gestion;
        // 		$gestion='';
        // 	}
        // }

        $alinear='L';
     $pdf->Cell(66, $tam,utf8_decode('4324324234'), $bordeCelda, 1,$alinear);		
        $pdf->Cell(129.5, $tam,utf8_decode('Asignatura: DSADADADADSADSAD'), $bordeCelda,0, 'L');
        $pdf->Cell(66, $tam,utf8_decode('DASDAD'), $bordeCelda, 1, 'L');
        $pdf->Cell(66, $tam,utf8_decode('Sigla-Código: DSADDASDA'), $bordeCelda, 1, 'L');
        // foreach($asignaturasDocente as $asignacionDocente){
        //     if ($grado == null) {
        //     $pdf->AjustaCelda(129, $tam,utf8_decode('Docente: Lic. '.$asignacionDocente->paterno_siadi_persona.' '.$asignacionDocente->materno_siadi_persona.' '.$asignacionDocente->nombre_siadi_persona), $bordeCelda,1, 'L');
        //     } else {
        //     $pdf->AjustaCelda(129, $tam,utf8_decode('Docente: '.$grado->grado_nombramiento.' '.$asignacionDocente->paterno_siadi_persona.' '.$asignacionDocente->materno_siadi_persona.' '.$asignacionDocente->nombre_siadi_persona), $bordeCelda,1, 'L');
        //     }
            
    	// // $pdf->AjustaCelda(120, $tam,utf8_decode('Docente: Lic. '.$asignacionDocente->paterno_siadi_persona.' '.$asignacionDocente->materno_siadi_persona.' '.$asignacionDocente->nombre_siadi_persona), $bordeCelda,1, 'L');
        // }
        // // $pdf->setY(59);$pdf->setX(149.5);
        // $pdf->setY(50);$pdf->setX(147);
        // $pdf->AjustaCelda(65.5, $tam,utf8_decode($siglaCodigo), $bordeCelda, 1, 'L');

		// // if(count($asignaturasDocente)>1)
        // $pos = strpos($listaEncabezadoAsignatura->convocatoria_siadi_convocatoria_estudiante,'REGULAR');
        // $posAux = strpos($listaEncabezadoAsignatura->nombre,'TGN');
        // if(!empty($pos)&&!empty($posAux))
        // {
        // 	$pdf->SetFont('Arial', 'I', 10);
        // 	$pdf->AjustaCelda(129, $tam,utf8_decode('N° de Nombramiento  Docente: '.$asignacionDocente->nombramiento_siadi_asignacion), $bordeCelda, 0, 'L');
        // 	$pdf->SetFont('Arial', 'B', 10);
        // 	$pdf->AjustaCelda(32, $tam,utf8_decode($gestion), $bordeCelda, 0, 'L');
        // 	$pdf->SetFont('Arial', 'B', 6);
        // 	$pdf->Cell(29, $tam,utf8_decode('Página ') . $pdf->PageNo() . ' de {nb}',$bordeCelda, 1, 'R');
        // 	$valorY=60;
        // }
        // else
        // {
        // 	$pos = strpos($listaEncabezadoAsignatura->nombre,'PROPIOS');
        // 	$posAux = strpos($listaEncabezadoAsignatura->convocatoria_siadi_convocatoria_estudiante,'EXAMEN');
        // 	if(!empty($pos)&&empty($posAux)){
        // 		$pdf->SetFont('Arial', 'I', 10);
        // 		$pdf->AjustaCelda(129, $tam,utf8_decode('N° de Nombramiento  Docente: '.$asignacionDocente->nombramiento_siadi_asignacion), $bordeCelda, 0, 'L');
        // 		$pdf->SetFont('Arial', 'B', 10);
        // 		$pdf->AjustaCelda(32, $tam,utf8_decode($gestion), $bordeCelda, 0, 'L');
        // 		$pdf->SetFont('Arial', 'B', 6);
        // 		$pdf->Cell(29, $tam,utf8_decode('Página ') . $pdf->PageNo() . ' de {nb}',$bordeCelda, 1, 'R');
        // 		$valorY=60;
        // 	}else{
        // // $pdf->setY(69);$pdf->setX(20);
        // 		$pdf->SetFont('Arial', 'I', 10);
        // 		$pdf->AjustaCelda(129, $tam,utf8_decode('Resolución del Honorable Consejo de Carrera N°: '.$asignacionDocente->nombramiento_siadi_asignacion), $bordeCelda, 0, 'L');
        // 		$pdf->SetFont('Arial', 'B', 10);
        // 		$pdf->AjustaCelda(32, $tam,utf8_decode($gestion), $bordeCelda, 0, 'L');
        // 		$pdf->SetFont('Arial', 'B', 6);
        // 		$pdf->Cell(29, $tam,utf8_decode('Página ') . $pdf->PageNo() . ' de {nb}',$bordeCelda, 1, 'R');
        // 		$valorY=60;
		// // $valorY=74;
        // 	}
        // }
         $valorY=74;
        $bordeCelda=1;$amLetra=9;
        /*ENCABEZADO DE LA TABLA*/
        $tamNum=10;		
        $pdf->SetFont('Arial','B',$amLetra);
        $pdf->Cell(8,$tamNum,utf8_decode('N°'),$bordeCelda,0,'C');
        $pdf->Cell(80,$tam,utf8_decode('NÓMINA'), $bordeCelda,1,'C');		
        $amLetra=6.5;
        $pdf->SetFont('Arial','B',$amLetra);
        $pdf->setX(26);
        // $pdf->setX(28);
        $pdf->Cell(25,$tam,utf8_decode('APELLIDO PATERNO'), $bordeCelda,0,'C');
        $pdf->Cell(25,$tam,utf8_decode('APELLIDO MATERNO'), $bordeCelda,0,'C');
        $pdf->Cell(30,$tam,utf8_decode('NOMBRE(S)'), $bordeCelda,0,'C');

        // $pdf->setY($valorY);$pdf->setX(108);
        $pdf->setY($valorY);$pdf->setX(106);
        // $pdf->MultiCell(25,5,utf8_decode('REGISTRO UNIVERSITARIO'),$bordeCelda,'C',0);
        $pdf->MultiCell(18,3.3,utf8_decode('N° DE CEDULA DE IDENTIDAD'),$bordeCelda,'C',0);
        $pdf->setY($valorY);$pdf->setX(124);
        $pdf->Cell(7,$tamNum,utf8_decode('EXP.'),$bordeCelda,0,'C');
        $pdf->setY($valorY);$pdf->setX(131);
        $pdf->Cell(20,$tamNum,utf8_decode('CATEGORIA'),$bordeCelda,0,'C');
        $pdf->MultiCell(8,3.3,utf8_decode('C.F s/100 Pts.'),$bordeCelda,'C',0);
        $pdf->setY($valorY);$pdf->setX(159);
        $pdf->Cell(25,$tamNum,utf8_decode('CALIFICACIÓN LITERAL'),$bordeCelda,0,'C');
        $pdf->Cell(20,$tamNum,utf8_decode('RESULTADO'),$bordeCelda,1,'C');
    


    	$pdf->SetY(-15);
        // $pdf->SetY(-25);
    	$pdf->SetFont('Arial', '', 7);
    	$pdf->Ln();
    	$pdf->SetFillColor(100, 150, 90);

       /* $pdf->SetDrawColor(105, 105, 105);
        $pdf->Rect('0', '262', '220', '6', 'FD'); //vertical
        //$pdf->Rect('0','195','220','6','FD'); //horizontal
        //$pdf->Image('img/cabecera.jpg','0','260','220','25','JPG');
        $pdf->SetTextColor(255, 255, 255);
        $pdf->Cell(0, 0, '____________________________________________________________________________________________________________', 0, 0, 'C');
        $pdf->Ln();
        $pdf->Cell(0, 8, 'Dir.: Av. Sucre A s/n Villa Esperanza. Telf.:(591-2)2-844177 - Fax.:(591-2)2-845800. www.epea.edu.bo', 0, 0, 'C');
        $pdf->Ln(9);
        $pdf->SetTextColor(0, 0, 0);*/
        /*$pdf->SetFont('Arial', 'I', 5);
        $pdf->Cell(0, 0, utf8_decode('Página ') . $pdf->PageNo() . ' / {nb}', 0, 0, 'C');*/
        $pdf->Cell(0,12,utf8_decode('NOTA: El llenado de las Actas de Calificaciones debe ser computarizado, sin alterar el formato de las celdas.'),0,0,'L');
	//$nombre = $listaPersona->ci.' '.$listaPersona->nombre_persona.'.pdf';
		$pdf->Output('dassdasda', 'I');
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    #Route::get('materias.docente.show/{id_planificar_asignatura}', [DocenteController::class, 'show'])->name('docente.materias.show');
    # docente.materias.show, web
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignatura = SiadiPlanificarAsignatura::where('id_planificar_asignatura', '=', $id)
            ->where('id_asignacion_docente', '=', ( is_null(Auth::user())? -1: Auth::user()->id_persona) )
            ->where('estado_planificar_asignartura', '=', 'ACTIVO')
            ->where('estado_docente', '=', '1')
            ->first();
        //return response()->json(['data' => $asignatura], 200);
        if(is_null($asignatura)){
            return view('page-error', [
                "codigo" => 404,
                "titulo" => "NO EXISTE ASIGNATURA",
                "mensaje" => "No existe la asignatura."
            ]);
        } else{
            return view(
                'vista_docente.materias-docente-show', ['asignatura' => $asignatura]
            );
        }
    }

    # Route::get('materias.docente.pdf_acta_calificaciones/{id_planificar_asignatura}', [DocenteController::class, 'reporte_materia_pdf'])->name('docente.materias.pdf.acta_calificaciones');
    public function reporte_materia_pdf($id_planificar_asignatura){
        $id_tmp = intval(base64_decode($id_planificar_asignatura));
        $asignatura = SiadiPlanificarAsignatura::where('id_planificar_asignatura', '=', $id_tmp)
            ->where('id_asignacion_docente', '=', ( is_null(Auth::user())? -1: Auth::user()->id_persona) )
            ->where('estado_planificar_asignartura', '=', 'ACTIVO')
            ->where('estado_docente', '=', '1')
            ->first();
        if(is_null($asignatura)){
            return view('page-error', [
                "codigo" => 404,
                "titulo" => "SIN ACCESO",
                "mensaje" => "la asignatura no esta activa."
            ]);
        } else{
            return redirect()->route('reporte_planificar_asignatura', ['id_planificar_asignatura' => $id_planificar_asignatura]);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

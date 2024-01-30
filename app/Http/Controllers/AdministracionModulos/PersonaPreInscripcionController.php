<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use App\Models\AdministracionModulos\SiadiPersona;
use App\Models\AdministracionModulos\SiadiPreInscripcion;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class PersonaPreInscripcionController extends Controller
{
       protected $fpdf;
     function __construct()
    {
         $this->middleware('can:role.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.persona-pre-inscripcion-index'
        );
    }
    public function imprimir_reporte_preinscripcion($idpersona)
    {
         $listaInscripcionAsingaturaEstudiante=DB::statement("SELECT
			siadi_inscripcion.id_siadi_inscripcion
			FROM
			siadi_inscripcion
			INNER JOIN siadi_nota ON siadi_nota.id_siadi_inscripcion = siadi_inscripcion.id_siadi_inscripcion
			WHERE
			siadi_inscripcion.id_siadi_persona = '$idpersona' AND
			siadi_inscripcion.estado_siadi_inscripcion = 'ACTIVO' AND
			siadi_nota.observacion_siadi_nota = 'INSCRITO'
			");

        session_start();
        ob_start();
        ini_set("session.auto_start", 0); //$this->load->library('fpdf');
        $this->SetTopMargin(18); //apartir del Header
        $this->SetLeftMargin(22);
        $this->SetRightMargin(9);
        $this->SetAutoPageBreak(1, 20);
        $this->AddPage('P', 'letter');
        $this->AliasNbPages();
		$altoTitulo=4;
		$setearX=44;		
		$tam=5;	
		$bordeCelda=0;
		if(!empty($listaInscripcionAsingaturaEstudiante))
		{
			foreach($listaInscripcionAsingaturaEstudiante as $listaIns)
			{
				
			}
		}
		for($i=0;$i<=2;$i++)
		{
			$controlandoEjeY=20;
			if($i==1){$controlandoEjeY=$controlandoEjeY+120;}
			
			$aumentoEjeY=15;//aumento para eje Y Qr y  rectangulo
			$this->SetFillColor(255, 255, 255, 0);
			$this->RoundedRect(22,$controlandoEjeY, 185, 115, 3.5, 'FD');
			//$this->Rect(23.5,$controlandoEjeY+3, 20, 20, '');
			//$this->Rect(185.5,$controlandoEjeY+$aumentoEjeY+3, 20, 20, '');	
			$this->Image('assets/imagenes/logos/logo_upea_pdf.gif', 23.5, $controlandoEjeY+3.5, 20, 19);	
			if(!empty($rutaQrCode)){$this->Image($rutaQrCode, 185.5, $controlandoEjeY+$aumentoEjeY+3, 20, 20);}
			$this->SetFont('Times', 'B', 16);
			$this->SetY($controlandoEjeY+3);
			$this->SetFont('EdwardianScriptITC', 'I', 25);
			$this->Cell(0, 8, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');
			$this->SetFont('Arial', 'I', 7);    
			$this->Cell(0, 5, 'Creada por Ley 2115 del 5 de Septiembre de 2000 y Autonoma por Ley 2556 del 12 de Noviembre de 2003', 0, 1, 'C');
			$this->SetFont('Arial', '', 6);
			$this->Cell(0, 3, utf8_decode(' ÁREA : CIENCIAS SOCIALES '), 0, 1, 'C');
			$this->Cell(0, 3, utf8_decode('CARRERA : LINGÜISTICA E IDIOMAS '), 0, 1, 'C');
			$this->Cell(0, 3,utf8_decode( 'UNIDAD : DEPARTAMENTO DE IDIOMAS '), 0, 1, 'C');
			$this->line(57.5,$controlandoEjeY+25,172,$controlandoEjeY+25);
			$this->Ln(3);
			$this->SetFont('Times', 'B', 15);
			$this->Cell(0,4, utf8_decode('BOLETA DE INSCRIPCIÓN'), 0, 1, 'C');		
			$this->SetFont('Arial', '', 8);
			//$this->Cell(0, 4, utf8_decode('   GESTIÓN ACADEMICA - '.$listaIns->periodo_siadi_planificacion.' / '.$listaIns->anio_siadi_gestion), 0, 1, 'C', 0);
			$this->Cell(0, 4, '', 0, 1, 'C', 0);
			$this->line(57.5,$controlandoEjeY+37,172,$controlandoEjeY+37);
			$this->SetFont('Arial', 'B', 10);		
			$this->Ln(3);
			$this->SetFont('Times', 'B', 8);
			$this->SetX(45.5);
			$this->AjustaCelda(22.5, $tam, utf8_decode('CI'), $bordeCelda, 0, 'C');
			$this->AjustaCelda(36, $tam, utf8_decode('PATERNO'), $bordeCelda, 0, 'C');
			$this->AjustaCelda(36, $tam, utf8_decode('MATERNO'), $bordeCelda, 0, 'C');
			$this->AjustaCelda(44, $tam, utf8_decode('NOMBRES'), $bordeCelda, 1, 'C');
			$this->SetFont('Times', '',6.5);
			$this->SetX(45.5);
			$this->AjustaCelda(22.5, $tam-2, utf8_decode($listaPersona->ci.' '.$listaPersona->expedido), $bordeCelda, 0, 'C');		
			$this->AjustaCelda(36, $tam-2, utf8_decode($listaPersona->paterno), $bordeCelda, 0, 'C');
			$this->AjustaCelda(36, $tam-2, utf8_decode($listaPersona->materno), $bordeCelda, 0, 'C');
			$this->AjustaCelda(44, $tam-2, utf8_decode($listaPersona->nombre_persona), $bordeCelda, 1, 'C');
			$this->Ln(2);
			$this->SetFont('Times', 'B',6.5);
			$this->AjustaCelda(20, $tam, utf8_decode('FECHA : '), $bordeCelda, 0, 'R');
			$this->SetFont('Times', '',6.5);
			$this->AjustaCelda(20, $tam, utf8_decode(date('d-m-Y')), $bordeCelda, 0, 'L');
			$this->SetFont('Times', 'B',6.5);
			$this->AjustaCelda(40, $tam, utf8_decode('TIPO ESTUDIANTE : '), $bordeCelda, 0, 'R');
			$this->SetFont('Times', '',6.5);
			$this->AjustaCelda(60, $tam, utf8_decode($listaPersona->tipo_siadi_tipo_estudiante),$bordeCelda, 0, 'L');
			if($listaPersona->id_siadi_tipo_estudiante==1||$listaPersona->id_siadi_tipo_estudiante==2)
			{
			$this->SetFont('Times', 'B',6.5);
			$this->AjustaCelda(15, $tam, utf8_decode('RU. :'), $bordeCelda, 0, 'R');
			$this->SetFont('Times', '',6.5);
			$this->AjustaCelda(30, $tam, utf8_decode($listaPersona->ru_siadi_persona_preinscripcion), $bordeCelda, 1, 'L');
			}
			if($listaPersona->id_siadi_tipo_estudiante==3||$listaPersona->id_siadi_tipo_estudiante==4||$listaPersona->id_siadi_tipo_estudiante==5)
			{
			$this->SetFont('Times', 'B',6.5);
			$this->AjustaCelda(15, $tam, utf8_decode('NRO. NOMBRAMIENTO :'), $bordeCelda, 0, 'R');
			$this->SetFont('Times', '',6.5);
			$this->AjustaCelda(30, $tam, utf8_decode($listaPersona->codigo_designacion_siadi_administrativo_docente), $bordeCelda, 1, 'L');
			}
			$rec=1;
			if(!empty($listaInscripcionAsingaturaEstudiante))
			{
			$this->SetLeftMargin(23.5);
			$this->Ln($tam-1);
			$this->SetFont('Times', 'B', 8);
			$this->AjustaCelda(185, 5, utf8_decode('.:: ASIGNATURAS INSCRITOS .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', 0);
			$this->SetFont('Times', 'B', 6.5);
			$this->AjustaCelda(60, $tam, utf8_decode('CURSO'), $rec-1, 0, 'C');
			$this->AjustaCelda(20, $tam, utf8_decode('IDIOMA'), $rec-1, 0, 'C');
			$this->AjustaCelda(10, $tam, utf8_decode('NIVEL'), $rec-1, 0, 'C');
			$this->AjustaCelda(25, $tam, utf8_decode('TIPO DE IDIOMA'), $rec-1, 0, 'C');
			$this->AjustaCelda(35, $tam, utf8_decode('SEDE'), $rec-1, 0, 'C');
			$this->AjustaCelda(12, $tam, utf8_decode('PARALELO'), $rec-1, 0, 'C');
			$this->AjustaCelda(20, $tam, utf8_decode('TURNO'), $rec-1, 1, 'C');
			$this->SetFont('Times', '', 5);
				foreach($listaInscripcionAsingaturaEstudiante as $listaInscripcion)
				{
					$this->AjustaCelda(60, $tam, utf8_decode($listaInscripcion->convocatoria_siadi_convocatoria_estudiante.' '.$listaInscripcion->nombre.' .:: '.$listaInscripcion->periodo_siadi_planificacion.'/'.$listaInscripcion->anio_siadi_gestion), $rec, 0, 'C');
					$this->AjustaCelda(20, $tam, utf8_decode($listaInscripcion->idioma_siadi_idioma.' '.$listaInscripcion->descripcion_siadi_nivel_idioma), $rec, 0, 'C');
					$this->AjustaCelda(10, $tam, utf8_decode($listaInscripcion->nivel_siadi_nivel_idioma), $rec, 0, 'C');
					$this->AjustaCelda(25, $tam, utf8_decode($listaInscripcion->tipo_siadi_tipo_idioma), $rec, 0, 'C');
					$this->AjustaCelda(35, $tam, utf8_decode($listaInscripcion->direccion), $rec, 0, 'C');
					$this->AjustaCelda(12, $tam, utf8_decode($listaInscripcion->paralelo_siadi_paralelo), $rec, 0, 'C');
					$this->AjustaCelda(20, $tam, utf8_decode($listaInscripcion->turno_siadi_turno), $rec, 1, 'C');
				}
			}
					
			if($i==0){$controlandoEjeY=$controlandoEjeY+50;}
			else{$controlandoEjeY=$controlandoEjeY+100;}
			$this->SetY($controlandoEjeY);
			$this->AjustaCelda(185,3, utf8_decode('_____________________________________________'), 0, 1, 'C');
			$this->AjustaCelda(185,3, utf8_decode($listaPersona->paterno . ' ' . $listaPersona->materno . ' ' . $listaPersona->nombre_persona), 0, 1, 'C');
			$this->AjustaCelda(185,3, utf8_decode('C.I. : '.$listaPersona->ci . ' ' . $listaPersona->expedido), 0, 1, 'C');
			$this->AjustaCelda(185,3, utf8_decode('FIRMA'), 0, 0, 'C');
		}
		$nombre = $listaPersona->ci.' '.$listaPersona->nombre_persona.'.pdf';
		$this->Output($nombre, 'I');
    }

    
   
}

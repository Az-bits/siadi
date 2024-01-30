<?php

namespace App\Models\Reportes;

use App\Models\AdministracionModulos\SiadiPersona;
use Illuminate\Database\Eloquent\Model;
use Codedge\Fpdf\Fpdf\Fpdf;
class ModeloCertificadoPreinscripcion extends Fpdf
{
    public function Header() {
        $this->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
        $this->AddFont('Erinal', 'I', 'Erinal.php');
        $this->AddFont('Episode', 'I', 'Episode.php');
        $this->AddFont('Splash', 'I', 'Splash.php');
        $this->AddFont('helvetica', 'I', 'helvetica.php');

      

        $this->SetFillColor(243, 136, 68, 0.34); //cada fila
		$this->Ln(7);
		$this->cell(185, 5.5,'', 0, 1, 'L', TRUE);
        $this->SetDrawColor(105, 105, 105);
		
        $this->Image(public_path('assets/logo_upea_pdf.gif'), 21, 7, 25, 25);
		
        $this->SetTextColor(0, 0, 0); //Color del texto: Negro
      
		$this->SetFont('Arial', 'I', 6);
		$altoTitulo=3;
		$setearX=44;
		$this->SetY(16);
		$this->SetX($setearX);
		$this->Cell(60, $altoTitulo, utf8_decode('UNIVERSIDAD PÚBLICA DE EL ALTO'), 0, 1, 'L');
		$this->SetX($setearX);
		$this->Cell(60, $altoTitulo, utf8_decode('ÁREA: CIENCIAS SOCIALES'), 0, 1, 'L');
		$this->SetX($setearX);
		$this->Cell(60, $altoTitulo, utf8_decode('CARRERA: LINGÜISTICA E IDIOMAS'), 0, 1, 'L');
      	$this->SetTextColor(255, 255, 255); //Color del texto: blanco 
		$this->SetFont('Arial', 'B', 11);
		$this->SetY(17);
		$this->SetX($setearX);		
        $this->Cell(60, 22,utf8_decode( 'FORMULARIO DE INSCRIPCIÓN - '.date('Y')), 0, 1, 'L');
		$this->SetFont('Arial', 'B', 10);
		$this->SetTextColor(0, 0, 0);
		$this->SetY(12);$this->SetX(122);
		$this->Cell(0, 22,utf8_decode( 'DEPARTAMENTO DE IDIOMAS'), 0, 1, 'C');
		$this->SetTextColor(16, 192, 156, 0.95);
		$this->SetY(17);$this->SetX(123);
        $this->Cell(0, 1, '___________________________', 0, 1, 'C');
    }

    public function Footer() {
        $this->SetY(-25);
        $this->SetFont('Arial', '', 8);
        $this->Ln();
        $this->SetFillColor(100, 150, 90);
        $this->SetFont('Arial', 'I', 5);
        $this->Cell(0, 0, utf8_decode('Página ') . $this->PageNo() . ' / {nb}', 0, 0, 'C');
    }
	 public function reporte_inscripcion_estudiante(SiadiPersona $listaPersona,$listaAsignaturaInscrito)
	 {
        session_start();
        ob_start();
        ini_set("session.auto_start", 0); //$this->load->library('fpdf');
        $this->SetTopMargin(18); //apartir del Header
        $this->SetLeftMargin(22);
        $this->SetRightMargin(19);
        $this->SetAutoPageBreak(1, 20);
        $this->AddPage('P', 'letter');
        $this->AliasNbPages();
		$this->Ln(16);
		//tamaño 
		$tam=5;
		$rec=1;
		$this->SetFillColor(243, 136, 68, 0.34);
		$this->Rect(22, 39.5, 20, 20, '');
       $this->SetFont('Times', 'B', 8);
        $this->cell(185, 5, utf8_decode('.:: DATOS PERSONALES'), 0, 1, 'L', TRUE);
		$this->Ln(0.5);
		$this->SetLeftMargin(43);
       $this->SetFont('Times', 'B', 6.5);
        $this->cell(40, $tam, utf8_decode('PATERNO'), $rec-1, 0, 'C');
        $this->cell(45, $tam, utf8_decode('MATERNO'), $rec-1, 0, 'C');
        $this->cell(79, $tam, utf8_decode('NOMBRE(S)'), $rec-1, 1, 'C');		
       $this->SetFont('Times', '',6.5);
        $this->cell(40, $tam, utf8_decode($listaPersona->paterno_persona), $rec, 0, 'C');
        $this->cell(45, $tam, utf8_decode($listaPersona->materno_persona), $rec, 0, 'C');
        $this->cell(79, $tam, utf8_decode($listaPersona->nombres_persona), $rec, 1, 'C');		     
       $this->SetFont('Times', 'B', 6.5);
        $this->cell(40, $tam, utf8_decode('FECHA NACIMIENTO'), $rec-1, 0, 'C');
        $this->cell(45, $tam, utf8_decode('GENERO'), $rec-1, 0, 'C');  
        $this->cell(79, $tam, utf8_decode('LUGAR NACIMIENTO'), $rec-1, 1, 'C');
       $this->SetFont('Times', '', 6.5);
        $this->cell(40, $tam, utf8_decode($listaPersona->fecha_nacimiento_persona), $rec, 0, 'C');
		$this->cell(45, $tam, utf8_decode($listaPersona->genero_persona), $rec, 0, 'C');
        $this->cell(79, $tam, utf8_decode($listaPersona->direccion_persona), $rec, 1, 'C');
		$this->SetLeftMargin(22);
		$this->SetFont('Times', 'B', 6.5);
		$this->SetX(22);
		$this->cell(20, $tam, utf8_decode('CI'), $rec-1, 0, 'C');
		$this->SetX(43);
        $this->cell(40, $tam, utf8_decode('EXP.'), $rec-1, 0, 'C');
		$this->cell(45, $tam, utf8_decode('NACIONALIDAD'), $rec-1, 0, 'C');
		$this->cell(45, $tam, utf8_decode('ESTADO CIVIL'), $rec-1, 0, 'C');
		
        
	   $this->SetFont('Times', '',6.5);
        $this->cell(20, $tam, utf8_decode($listaPersona->ci_persona), $rec, 0, 'C');
		$this->SetX(43);
        $this->cell(40, $tam, utf8_decode($listaPersona->expedido_persona), $rec, 0, 'C');
		$this->cell(45, $tam, utf8_decode($listaPersona->pais_persona), $rec, 0, 'C');
		$this->cell(45, $tam, utf8_decode($listaPersona->estado_civil_persona), $rec, 0, 'C');
		
        $this->Ln($tam-1);
        $this->SetFont('Times', 'B', 8);		
		// if(!empty($rutaQrCode))
		// {
		// $this->Image($rutaQrCode, 22, 79, 20, 20);
		// }
		$this->Rect(22, 79, 20, 20, '');
        $this->cell(185, 5, utf8_decode('.:: DIRECCION UBICACIÓN '), 0, 1, 'L', TRUE);
		$this->Ln(0.5);
        $this->SetFont('Times', 'B', 6.5);
		$this->SetLeftMargin(43);
        // $this->cell(45, $tam, utf8_decode('DEPARTAMENTO'), $rec-1, 0, 'C');
        //  $this->cell(30, $tam, utf8_decode('PROVINCIA'), $rec-1, 0, 'C');
        // $this->cell(45, $tam, utf8_decode('CIUDAD'), $rec-1, 0, 'C');
        // $this->cell(44, $tam, utf8_decode('ZONA'), $rec-1, 1, 'C');        
        // $this->SetFont('Times', '', 6.5);
        // $this->cell(45, $tam, utf8_decode($listaPersona->nombre_siadi_departamento), $rec, 0, 'C');
        // $this->cell(30, $tam, utf8_decode($listaPersona->nombre_siadi_provincia), $rec, 0, 'C');
        // $this->cell(45, $tam, utf8_decode($listaPersona->direccion_ciudad_localidad), $rec, 0, 'C');
        // $this->cell(44, $tam, utf8_decode($listaPersona->direccion_zona_barrio_urbanizacion), $rec, 1, 'C');
		$this->SetFont('Times', 'B', 6.5);
		$this->cell(50, $tam, utf8_decode('CALLE / AVENIDA'), $rec-1, 0, 'C');
        // $this->cell(24, $tam, utf8_decode('NUMERO'), $rec-1, 0, 'C');
		// $this->cell(40, $tam, utf8_decode('EMAIL'), $rec-1, 0, 'C');
        // $this->cell(25, $tam, utf8_decode('CELULAR'), $rec-1, 0, 'C');
        // $this->cell(25, $tam, utf8_decode('TELEFONO'), $rec-1, 1, 'C');
	   $this->SetFont('Times', '', 6.5);
		$this->cell(50, $tam, utf8_decode($listaPersona->direccion_persona), $rec, 0, 'C');
        // $this->cell(24, $tam, utf8_decode($listaPersona->direccion_numero), $rec, 0, 'C');
		// $this->cell(40, $tam, utf8_decode($listaPersona->email), $rec, 0, 'C');
        // $this->cell(25, $tam, utf8_decode($listaPersona->celular), $rec, 0, 'C');
        // $this->cell(25, $tam, utf8_decode($listaPersona->telefono), $rec, 1, 'C');
		$this->SetLeftMargin(22);
		$this->SetFont('Times', 'B', 6.5);
		$this->Ln($tam-1);
		if($listaPersona->id_siadi_tipo_estudiante==1||$listaPersona->id_siadi_tipo_estudiante==2)
		{
       $this->SetFont('Times', 'B', 8);
        $this->cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
		$this->SetFont('Times', 'B', 6.5);
        $this->cell(30, $tam, utf8_decode('R.U.'), $rec-1, 0, 'C');
        $this->cell(55, $tam, utf8_decode('CARRERA'), $rec-1, 0, 'C');
        $this->cell(50, $tam, utf8_decode('SEDE'), $rec-1, 0, 'C');
		$this->cell(25, $tam, utf8_decode('AÑO'), $rec-1, 0, 'C');
        $this->cell(25, $tam, utf8_decode('SEMESTRE'), $rec-1, 1, 'C');
        $this->SetFont('Times', '', 6.5);
        $this->cell(30, $tam, utf8_decode($listaPersona->ru_siadi_persona_preinscripcion), $rec, 0, 'C');
        $this->cell(55, $tam, utf8_decode($listaPersona->nombre_completo), $rec, 0, 'C');
        $this->cell(50, $tam, utf8_decode($listaPersona->nombre), $rec, 0, 'C');
		$this->cell(25, $tam, utf8_decode($listaPersona->anio_siadi_persona_preinscripcion), $rec, 0, 'C');
        $this->cell(25, $tam, utf8_decode($listaPersona->semestre_siadi_persona_preinscripcion), $rec, 1, 'C');
		}
       // $this->Ln($tam-1);
	   if($listaPersona->id_siadi_tipo_estudiante==3||$listaPersona->id_siadi_tipo_estudiante==4||$listaPersona->id_siadi_tipo_estudiante==5)
		{
       $this->SetFont('Times', 'B', 8);
        $this->cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
        $this->SetFont('Times', 'B', 6.5);        
        $this->cell(40, $tam, utf8_decode('PROFESIÓN'), $rec-1, 0, 'C');
		$this->cell(55, $tam, utf8_decode('CARRERA'), $rec-1, 0, 'C');
        $this->cell(30, $tam, utf8_decode('SEDE'), $rec-1, 0, 'C');
		$this->cell(30, $tam, utf8_decode('NRO. NOMBRAMIENTO'), $rec-1, 0, 'C');
		$this->cell(30, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec-1, 1, 'C');
        $this->SetFont('Times', '', 6.5);        
        $this->cell(40, $tam, utf8_decode($listaPersona->profesion_siadi_persona), $rec, 0, 'C');
		$this->cell(55, $tam, utf8_decode($listaPersona->nombre_completo), $rec, 0, 'C');
        $this->cell(30, $tam, utf8_decode($listaPersona->nombre), $rec, 0, 'C');
		$this->cell(30, $tam, utf8_decode($listaPersona->codigo_designacion_siadi_administrativo_docente), $rec, 0, 'C');
		$this->cell(30, $tam, utf8_decode($listaPersona->lugar_servicio_siadi_persona), $rec, 1, 'C');
		}
       
	   if($listaPersona->id_siadi_tipo_estudiante==6)
		{
       $this->SetFont('Times', 'B', 8);
        $this->cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
        $this->SetFont('Times', 'B', 6.5);        
        $this->cell(92, $tam, utf8_decode('PROFESIÓN'), $rec-1, 0, 'C');
		$this->cell(93, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec-1, 1, 'C');
        $this->SetFont('Times', '', 6.5);        
        $this->cell(92, $tam, utf8_decode($listaPersona->profesion_siadi_persona), $rec, 0, 'C');
		$this->cell(93, $tam, utf8_decode($listaPersona->lugar_servicio_siadi_persona), $rec, 1, 'C');
		}
        // $this->Ln($tam-1);
		if(!empty($listaAsignaturaInscrito))
		{
		foreach($listaAsignaturaInscrito as $listaAsigIdio)
		{			
		}
		$this->Ln($tam-1);
		$this->SetFont('Times', 'B', 8);
        //$this->cell(185, 5, utf8_decode('.:: ASIGNATURAS RESERVADOS  '.$listaAsigIdio->periodo_siadi_planificacion.'/'.$listaAsigIdio->anio_siadi_gestion.' .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
        $this->cell(185, 5, utf8_decode('.:: ASIGNATURAS RESERVADOS   .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
        $this->SetFont('Times', 'B', 4.5);
		$this->cell(55, $tam, utf8_decode('CURSO'), $rec-1, 0, 'C');
		$this->cell(17, $tam, utf8_decode('IDIOMA'), $rec-1, 0, 'C');
		$this->cell(8, $tam, utf8_decode('NIVEL'), $rec-1, 0, 'C');
		$this->cell(15, $tam, utf8_decode('TIPO DE IDIOMA'), $rec-1, 0, 'C');
		$this->cell(20, $tam, utf8_decode('SEDE'), $rec-1, 0, 'C');
		$this->cell(10, $tam, utf8_decode('PARALELO'), $rec-1, 0, 'C');
		$this->cell(15, $tam, utf8_decode('TURNO'), $rec-1, 0, 'C');
		$this->cell(15, $tam, utf8_decode('MOMTO (B.S.)'), $rec-1, 0, 'C');
		$this->cell(15, $tam, utf8_decode('NRO. DEPOSITO'), $rec-1, 0, 'C');
		$this->cell(15, $tam, utf8_decode('FECHA DEPOSITO'), $rec-1, 1, 'C');
		$this->SetFont('Times', '', 4.5);
			foreach($listaAsignaturaInscrito as $listaAsignaturaIdiomaInscrito)
			{
				//echo print_r($listaAsignaturaIdiomaInscrito);exit;
				$this->cell(55, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->convocatoria_siadi_convocatoria_estudiante.' '.$listaAsignaturaIdiomaInscrito->nombre.' .:: '.$listaAsignaturaIdiomaInscrito->periodo_siadi_planificacion.'/'.$listaAsignaturaIdiomaInscrito->anio_siadi_gestion), $rec, 0, 'C');
				$this->cell(17, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->idioma_siadi_idioma.' '.$listaAsignaturaIdiomaInscrito->descripcion_siadi_nivel_idioma), $rec, 0, 'C');
				$this->cell(8, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->nivel_siadi_nivel_idioma), $rec, 0, 'C');
				$this->cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->tipo_siadi_tipo_idioma), $rec, 0, 'C');
				$this->cell(20, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->direccion), $rec, 0, 'C');
				$this->cell(10, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->paralelo_siadi_paralelo), $rec, 0, 'C');
				$this->cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->turno_siadi_turno), $rec, 0, 'C');
				$this->cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->costo_siadi_inscripcion), $rec, 0, 'C');
				$this->cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->deposito_siadi_inscripcion), $rec, 0, 'C');
				$this->cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->fecha_deposito_siadi_inscripcion), $rec, 1, 'C');
			}
		}
		
		$this->Ln(5);
        $this->SetFont('Times', 'B',9);
        $this->cell(10, $tam, utf8_decode('Nota.-'), 0, 0, 'L');
        $this->cell(100, $tam, utf8_decode('Mediante el presente formulario declaro que los datos impresos son fidedignos.'), 0, 1, 'L');
		$this->SetFont('Times', '', 6.5);
		$this->cell(100, $tam, utf8_decode(date("Y-m-d H:i:s")), 0, 1, 'L');
        $this->Ln(30);
		$tam=3;
        $this->cell(185, $tam, utf8_decode('_____________________________________________'), 0, 1, 'C');
		$this->cell(185, $tam, utf8_decode($listaPersona->paterno . ' ' . $listaPersona->materno . ' ' . $listaPersona->nombre_persona), 0, 1, 'C');
        $this->cell(185, $tam, utf8_decode('C.I. : '.$listaPersona->ci . ' ' . $listaPersona->expedido), 0, 1, 'C');
        $this->cell(185, $tam, utf8_decode('FIRMA'), 0, 0, 'C');
		
		$nombre = $listaPersona->ci.' '.$listaPersona->nombre_persona.'.pdf';
        $this->Output($nombre, 'D');
    }
}

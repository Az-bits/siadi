<?php

namespace App\Http\Controllers\Modulos;


use App\Http\Controllers\Controller;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Http\Request;



class ReportesPdf extends Controller
{
   
    public function __construct() {


      
}
    

public function generarpdf($idpersona){
  

                $fpdf=new Fpdf();
          

                $fpdf->SetTopMargin(18);
                $fpdf->SetLeftMargin(10);
                $fpdf->SetAutoPageBreak(1, 20);
                $fpdf->AliasNbPages();
                // $fpdf->SetWidths(array(7, 60, 61, 16, 27, 45, 30, 17, 16, 27, 30));
                // $fpdf->SetAligns(array('C', 'L', 'L', 'C', 'C', 'L', 'C', 'C', 'C', 'C', 'C'));
                // // $fpdf->AddPage('P', 'Legal');
                $fpdf->AddPage('P', 'Legal');
                $fpdf->SetFont('Arial', '', 7);



                $fpdf->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
                $fpdf->AddFont('Erinal', 'I', 'Erinal.php');
                $fpdf->AddFont('Episode', 'I', 'Episode.php');
                $fpdf->AddFont('Splash', 'I', 'Splash.php');
                $fpdf->AddFont('helvetica', 'I', 'helvetica.php');

                //$fpdf->SetFont('Arial','B',12);
                
                $fpdf->SetFont('EdwardianScriptITC', 'I', 23);
                $fpdf->ln(-10);
                $fpdf->cell(70);
                $fpdf->Cell(60, 10, 'DEPARTAMENTO DE IDIOMAS', 0, 0, 'C');



                $fpdf->SetFont('Times', 'B', 12);
                $fpdf->ln(8);
                $fpdf->cell(70);
                $fpdf->Cell(80, 10, 'HISTORIAL ACADÉMICO', 0, 0, 'C');
                /*if ($valor == 1) {
                    
                }else{
                    $fpdf->Cell(60, 10, 'HISTORIAL ACADÉMICO DE CALIFICACIONES', 0, 0, 'C');
                }*/

                $fpdf->SetFont('Times', 'B', 10);
                $fpdf->ln(5);
                $fpdf->cell(70);
                $fpdf->Cell(60, 6, (!empty($per) ? $per->nombrem : ''), 0, 0, 'C');




                if ($valor == "15874") {

                    $fpdf->ln(-10);
                    $fpdf->cell(70);
                    $fpdf->SetFont('Arial', 'B', 8);
                 
                    $fpdf->Cell(130, 15, ('H.A.' . $carrera->iniciales . ' No ' . str_pad($nroh->correlativo, 5, "0", STR_PAD_LEFT)), 0, 0, 'R');
                } else {
                    $fpdf->ln(-10);
                    $fpdf->cell(70);
                    $fpdf->SetFont('Arial', 'B', 8);

                    $valo_fer = $modelo_reporte->mostrar_nro_serie($datosPersona->id, $carrera_id);
                    // $fpdf->Cell(130, 15, ('H.A.' . $carrera->iniciales . ' No ' . str_pad($valo_fer->correlativo, 5, "0", STR_PAD_LEFT) ), 0, 0, 'R'); 
                    $fpdf->Cell(120, 35, (' No ' . str_pad($codigo, 5, "0", STR_PAD_LEFT)), 0, 0, 'R');
                }
                $fpdf->Cell(120, 15, (' Nº ' . str_pad($codigo, 5, "0", STR_PAD_LEFT)), 0, 0, 'R');
                // $fpdf->Cell(130, 15, ('R.A.' . $carrera->iniciales . ' No ' . str_pad($nror->correlativo, 5, "0", STR_PAD_LEFT) ), 0, 0, 'R');
                // }

                //PATERNO
                $fpdf->SetFont('Arial', 'B', 10);
                $fpdf->SetXY(20, 45);
                $fpdf->Cell(45, 7, strtoupper($datosPersona->paterno), 0, 0, 'C');

                $fpdf->SetFont('Arial', '', 8);
                $fpdf->SetXY(20, 51);
                $fpdf->Cell(45, 7, 'APELLIDO PATERNO', 'T', 0, 'C');
                //MATERNO

                $fpdf->SetFont('Arial', 'B', 10);
                $fpdf->SetXY(75, 45);
                $fpdf->Cell(45, 7, strtoupper($datosPersona->materno), 0, 0, 'C');

                $fpdf->SetFont('Arial', '', 8);
                $fpdf->SetXY(75, 51);
                $fpdf->Cell(45, 7, 'APELLIDO MATERNO', 'T', 0, 'C');
                //NOMBRES

                $fpdf->SetFont('Arial', 'B', 10);
                $fpdf->SetXY(130, 45);
                $fpdf->Cell(45, 7, strtoupper($datosPersona->nombre), 0, 0, 'C');

                $fpdf->SetFont('Arial', '', 8);
                $fpdf->SetXY(130, 51);
                $fpdf->Cell(45, 7, 'NOMBRE(S)', 'T', 0, 'C');
                //codigo

                // $fpdf->SetFont('Arial', 'B', 10);
                // $fpdf->SetXY(180, 45);
                // $fpdf->Cell(25, 7, 'Nº 00'.$codigo, 0, 0, 'C');

                $fpdf->SetFont('Arial', '', 8);
                $fpdf->SetXY(180, 51);
                $fpdf->Cell(25, 7, 'CODIGO', 'T', 0, 'C');
                //CEDULA

                $fpdf->SetFont('Arial', 'B', 8);
                $fpdf->SetXY(25, 55);
                $fpdf->Cell(45, 7, $datosPersona->ci . ' ' . $datosPersona->expedido, 0, 0, 'C');
                $fpdf->SetFont('Arial', '', 8);
                $fpdf->SetXY(180, 51);
                $fpdf->Cell(25, 7, 'CODIGO', 'T', 0, 'C');
                $fpdf->SetFont('Arial', '', 8);
                $fpdf->SetXY(25, 61);
                $fpdf->Cell(45, 7, ('Nº DE CEDULA DE IDENTIDAD'), 'T', 0, 'C');
                //REGISTRO

                $fpdf->SetFont('Arial', 'B', 8);
                $fpdf->SetXY(85, 55);
                $fpdf->Cell(45, 7, $matricula->registro_universitario, 0, 0, 'C');

                $fpdf->SetFont('Arial', '', 8);
                $fpdf->SetXY(88, 61);
                $fpdf->Cell(45, 7, ('Nº') . " DE REGISTRO UNIVERSITARIO", 'T', 0, 'C');
                //FECHA

                $fpdf->SetFont('Arial', 'B', 8);
                $fpdf->SetXY(150, 55);
                // $fpdf->Cell(45, 7, fecha_literal(date('d-m-Y'), '6'), 0, 0, 'C');
                if ($codigo == '0') {
                    $fpdf->Cell(45, 7,  fecha_literal(date('d-m-Y'), '6'), 0, 0, 'C');
                } else {
                    $fpdf->Cell(45, 7,  fecha_literal($fecha_reg, '6'), 0, 0, 'C');
                }
                // $fpdf->Cell(45, 7, fecha_literal(date('Y-m-d'), '6'), 0, 0, 'C');

                // $fpdf->Cell(45, 7, fecha_literal($fecha_reg, '6'), 0, 0, 'C');
                $fpdf->Cell(15);
                $fpdf->Ln();

                $fpdf->SetFont('Arial', '', 8);
                $fpdf->SetXY(150, 61);
                $fpdf->Cell(45, 7, 'FECHA DE EMISION', 'T', 0, 'C');

                $fpdf->Cell(20, 1, ('Pág. ') . $fpdf->PageNo() . ' de {nb}', 0, 0, 'R');
                //TABLA
                $dos = 1;
                $fpdf->SetFont('Arial', 'B', 5);
                $fpdf->SetXY(10 - $dos, 75);
                $fpdf->Cell(5, 10, ('Nº'), 1, 0, 'C');

                $fpdf->SetXY(15 - $dos, 75);
                $fpdf->Cell(113, 5, 'ASIGNATURA', 1, 0, 'C');

                $fpdf->Ln();
                $fpdf->SetXY(15 - $dos, 80);
                $fpdf->Cell(12, 5, 'SIGLA', 1, 0, 'C');

                $fpdf->SetXY(27 - $dos, 80);
                $fpdf->Cell(50, 5, 'ASIGNATURA (MATERIA)', 1, 0, 'C');

                $fpdf->SetXY(77 - $dos, 80);
                $fpdf->AjustaCelda(13, 5, 'PRE-REQUISITO', 1, 0, 'C');

                $fpdf->SetFont('Arial', 'B', 4);
                $fpdf->SetXY(90 - $dos, 80);
                $fpdf->Cell(10, 5, ' MODALIDAD', 1, 0, 'C');

                $fpdf->SetFont('Arial', 'B', 5);
                $fpdf->SetXY(100 - $dos, 80);
                $fpdf->Cell(6, 5, ' NIVEL', 1, 0, 'C');

                $fpdf->SetXY(106 - $dos, 80);
                $fpdf->AjustaCelda(11, 3, 'HORAS', 'LRT', 0, 'C');
                $fpdf->SetXY(106 - $dos, 83);
                $fpdf->AjustaCelda(11, 2, 'ACADEMICAS', 'LRB', 0, 'L');

                $fpdf->SetXY(117 - $dos, 80);
                $fpdf->AjustaCelda(11, 3, 'PLAN DE', 'LRT', 0, 'L');
                $fpdf->SetXY(117 - $dos, 83);
                $fpdf->AjustaCelda(11, 2, 'ESTUDIOS', 'LRB', 0, 'L');

                $fpdf->SetFont('Arial', 'B', 4);
                $fpdf->SetXY(128 - $dos, 75);
                $fpdf->Cell(9, 10, ' GESTION', 1, 0, 'C');


                $fpdf->SetXY(137 - $dos, 75);
                $fpdf->Cell(10, 10, ' PARALELO', 1, 0, 'C');

                $fpdf->SetFont('Arial', 'B', 5);
                $fpdf->SetXY(146, 75);
                $fpdf->Cell(25, 5, 'CALIFICACIONES', 1, 0, 'C');

                $fpdf->Ln(5);

                $fpdf->SetFont('Arial', 'B', 4);
                $fpdf->SetXY(146, 80);
                $fpdf->Cell(9, 5, '  NUMERAL', 1, 0, 'C');

                $fpdf->SetFont('Arial', 'B', 5);
                $fpdf->SetXY(155, 80);
                $fpdf->Cell(16, 5, 'LITERAL', 1, 0, 'C');

                $fpdf->SetXY(172 - $dos, 75);
                $fpdf->AjustaCelda(6, 4, ' LIBRO', 'LRT', 0, 'C');
                $fpdf->SetXY(172 - $dos, 80);
                $fpdf->Cell(6, 5, ('Nº'), 'LRB', 0, 'C');

                $fpdf->SetXY(178 - $dos, 75);
                $fpdf->AjustaCelda(6, 4, ' FOLIO', 'LRT', 0, 'C');

                $fpdf->SetXY(178 - $dos, 80);
                $fpdf->Cell(6, 5, ('Nº'), 0, 0, 'C');

                $fpdf->SetXY(184 - $dos, 75);
                $fpdf->Cell(12, 10, ' RESULTADO', 1, 0, 'C');

                $fpdf->SetXY(196 - $dos, 75);
                $fpdf->Cell(16, 10, ' OBSERVACIONES', 1, 0, 'C');

                //DATOS
                $fpdf->Ln(10);
                $fpdf->SetFont('Arial', '', 5);


                $numAsignatura = 0;
                $notas = 0;
                $horasAcademica = 0;
                $otrope2 = '';
                $gestionesTemp = '';
                $otrope = '';
                $planEstudiso = '';
                $gestiones = '';
                $planEstudiso1 = '';
                $otrope1 = '';
                $estadoCell = 'false';
                foreach ($listaMaterias1 as $key => $value) {

                    if ($value->pensum != $otrope) {
                        $fpdf->SetFillColor(230, 225, 255);
                        $planEstudiso .= $value->pensum . '_';
                        $gestiones .= $value->gestion . '_';
                        $gestionesTemp = $value->gestion;
                        $otrope = $value->pensum;
                        $otrope2 = $otrope2 + 1;
                    }
                    if ($gestionesTemp != $value->gestion) {
                        $gestiones .= $value->gestion . '_';
                        $gestionesTemp = $value->gestion;
                    }
                    if ($otrope2 == 2) {
                        $estadoCell = true;
                    } elseif ($otrope2 == 3) $estadoCell = false;
                    elseif ($otrope2 == 4) $estadoCell = true;
                    $fpdf->SetX(9);
                    $fpdf->Cell(5, 5, $key + 1, 1, 0, 'C');
                    $fpdf->Cell(12, 5, $value->sigla_asignatura, 1, 0, 'C');
                    $fpdf->AjustaCelda(50, 5, $value->asignatura, 1, 0, 'L');
                    //$fpdf->Cell(13,5,'',1,0,'C');
                    //prerequisitop
                    $prerequisitop = $modelo_reporte->mostrar_tabla_datos('base_upea.prerequisito_asignatura_mencion', "id_asignatura_mencion='$value->id_asignatura_mencion' ");
                    if (!empty($prerequisitop)) {
                        $prerequisito_asignatura_mencion = '';
                        foreach ($prerequisitop as $keys => $values) {
                            $materiasPrerequisito = $modelo_reporte->mostrar_tabla_fila('base_upea.vista_mallas_curriculares', "id='$values->id_prerequisito_asignatura_mencion' ");
                            $prerequisito_asignatura_mencion = $prerequisito_asignatura_mencion . $materiasPrerequisito->sigla_asignatura . ' / ';
                        }
                        $prerequisito_asignatura_mencion = substr($prerequisito_asignatura_mencion, 0, strlen($prerequisito_asignatura_mencion) - 3);
                        $fpdf->AjustaCelda(13, 5, $prerequisito_asignatura_mencion, 1, 0, 'C');
                    } else {
                        $fpdf->Cell(13, 5, 'PRE-U EX-DISP', 1, 0, 'C');
                    }
                    $fpdf->Cell(10, 5, $value->modalidad, 1, 0, 'C');
                    if ($value->modalidad != $otrope1) {
                        $planEstudiso1 .= $value->modalidad . '_';
                        $otrope1 = $value->modalidad;
                    }

                    $fpdf->Cell(6, 5, $value->nivel, 1, 0, 'C');
                    if ($value->modalidad == 'S') {
                        $fpdf->Cell(11, 5, (($value->horas_semana) * 4) * 5, 1, 0, 'C'); //semestral 5 anual 10
                        $horasAcademica = $horasAcademica + (($value->horas_semana) * 4) * 5;
                    } else {
                        $fpdf->Cell(11, 5, (($value->horas_semana) * 4) * 10, 1, 0, 'C'); //semestral 5 anual 10
                        $horasAcademica = $horasAcademica + (($value->horas_semana) * 4) * 10;
                    }
                    $fpdf->SetFont('Arial', '', 4);

                    $fpdf->AjustaCelda(11, 5, $value->pensum, 1, 0, 'C');

                    $fpdf->SetFont('Arial', '', 5);
                    $fpdf->AjustaCelda(9, 5, $value->periodo . ' ' . $value->gestion, 1, 0, 'C');

                    if ($value->turno_foliado) {
                        $fpdf->Cell(10, 5, $value->nivel . ' ' . $value->paralelo_curso . '  ' . $value->turno_foliado . ' ', 1, 0, 'C');
                    } else {
                        if ($value->turno_foliado) {
                            $fpdf->Cell(10, 5, $value->nivel . ' ' . $value->paralelo_curso . ' ' . $value->turno_curso . ' ', 1, 0, 'C');
                        } else {
                            $fpdf->Cell(10, 5, $value->nivel . ' ' . $value->paralelo_curso . ' ' . $value->turno_curso . ' ', 1, 0, 'C');
                        }
                    }

                    // $fpdf->Cell(10, 5, $value->nivel . ' ' . $value->paralelo_curso.' .. '.$value->turno_curso. ' ', 1, 0, 'C'); //$value->turno.$value->paralelo

                    $fpdf->Cell(9, 5, $value->notaFinal, 1, 0, 'C');
                    $fpdf->Cell(16, 5, numero_letra($value->notaFinal), 1, 0, 'C');
                    //$fpdf->Cell(6,5,'',1,0,'C');
                    $libros = $modelo_reporte->mostrar_tabla_fila('habilitacion_gestion', 'id_carrera', $carrera_id, " and id_gestion='$value->gestion_idrgs' ");
                    if (!empty($value->libro))
                        $fpdf->Cell(6, 5, $value->libro, 1, 0, 'C');
                    else if ($libros->numero_libro > 0)
                        $fpdf->Cell(6, 5, $libros->numero_libro, 1, 0, 'C');
                    else
                        $fpdf->Cell(6, 5, '', 1, 0, 'C');

                    //$fpdf->Cell(6,5,'',1,0,'C');
                    $fpdf->Cell(6, 5, $value->folio, 1, 0, 'C');
                    $fpdf->SetFont('Arial', '', 4);
                    if ($value->notaFinal == 0) {
                        $fpdf->AjustaCelda(12, 5, 'NO SE PRESENTO', 1, 0, 'L');
                    } elseif ($value->notaFinal >= 51) {
                        $fpdf->AjustaCelda(12, 5, 'APROBADO', 1, 0, 'L');
                    } else {
                        $fpdf->AjustaCelda(12, 5, 'REPROBADO', 1, 0, 'L');
                    }
                    $fpdf->Cell(16, 5, '', 1, 0, 'C'); // sharp final del listado de notas

                    $fpdf->SetFont('Arial', '', 5);
                    $fpdf->Ln(5);

                    $numAsignatura = $key;



                    if ($fpdf->GetY() >= $fpdf->h - 60) {

                        $fpdf->Cell(20, 7, ('Pág. ') . $fpdf->PageNo() . ' de {nb}', 0, 0, 'R');

                        $fpdf->AddPage('P', 'Legal');

                        $fpdf->SetFont('EdwardianScriptITC', 'I', 23);
                        $fpdf->ln(-10);
                        $fpdf->cell(70);
                        $fpdf->Cell(60, 10, '         Carrera ' . str_replace('De La', 'de la', mb_convert_case($carrera->nombre_completo, MB_CASE_TITLE, "UTF-8")), 0, 0, 'C');



                        $fpdf->SetFont('Times', 'B', 12);
                        $fpdf->ln(8);
                        $fpdf->cell(70);
                        $fpdf->Cell(60, 10, 'HISTORIAL ACADÉMICO', 0, 0, 'C');

                        $fpdf->SetFont('Times', 'B', 10);
                        $fpdf->ln(5);
                        $fpdf->cell(70);
                        $fpdf->Cell(60, 6, (!empty($per) ? $per->nombrem : ''), 0, 0, 'C');




                        if ($valor == "15874") {

                            $fpdf->ln(-10);
                            $fpdf->cell(70);
                            $fpdf->SetFont('Arial', 'B', 8);
                           
                            $fpdf->Cell(130, 15, ('H.A.' . $carrera->iniciales . ' No ' . str_pad($nroh->correlativo, 5, "0", STR_PAD_LEFT)), 0, 0, 'R');
                        }
                        $fpdf->SetFont('Arial', 'B', 10);
                        $fpdf->SetXY(25, 45);
                        $fpdf->Cell(45, 7, strtoupper($datosPersona->paterno), 0, 0, 'C');

                        $fpdf->SetFont('Arial', '', 8);
                        $fpdf->SetXY(25, 51);
                        $fpdf->Cell(45, 7, 'APELLIDO PATERNO', 'T', 0, 'C');
                        //MATERNO

                        $fpdf->SetFont('Arial', 'B', 10);
                        $fpdf->SetXY(85, 45);
                        $fpdf->Cell(45, 7, strtoupper($datosPersona->materno), 0, 0, 'C');

                        $fpdf->SetFont('Arial', '', 8);
                        $fpdf->SetXY(85, 51);
                        $fpdf->Cell(45, 7, 'APELLIDO MATERNO', 'T', 0, 'C');
                        //NOMBRES

                        $fpdf->SetFont('Arial', 'B', 10);
                        $fpdf->SetXY(150, 45);
                        $fpdf->Cell(45, 7, strtoupper($datosPersona->nombre), 0, 0, 'C');

                        $fpdf->SetFont('Arial', '', 8);
                        $fpdf->SetXY(150, 51);
                        $fpdf->Cell(45, 7, 'NOMBRE(S)', 'T', 0, 'C');
                        //CEDULA

                        $fpdf->SetFont('Arial', 'B', 8);
                        $fpdf->SetXY(25, 55);
                        $fpdf->Cell(45, 7, $datosPersona->ci . ' ' . $datosPersona->expedido, 0, 0, 'C');

                        $fpdf->SetFont('Arial', '', 8);
                        $fpdf->SetXY(25, 61);
                        $fpdf->Cell(45, 7, ('Nº DE CEDULA DE IDENTIDAD'), 'T', 0, 'C');
                        //REGISTRO

                        $fpdf->SetFont('Arial', 'B', 8);
                        $fpdf->SetXY(85, 55);
                        $fpdf->Cell(45, 7, $matricula->registro_universitario, 0, 0, 'C');

                        $fpdf->SetFont('Arial', '', 8);
                        $fpdf->SetXY(88, 61);
                        $fpdf->Cell(45, 7, ('Nº') . " DE REGISTRO UNIVERSITARIO", 'T', 0, 'C');
                        //FECHA

                        $fpdf->SetFont('Arial', 'B', 8);
                        $fpdf->SetXY(150, 55);
                        $fpdf->Cell(45, 7, fecha_literal(date('d-m-Y'), '4'), 0, 0, 'C');
                        $fpdf->Cell(15);
                        $fpdf->Ln();

                        $fpdf->SetFont('Arial', '', 8);
                        $fpdf->SetXY(150, 61);
                        $fpdf->Cell(45, 7, 'FECHA DE EMISION', 'T', 0, 'C');

                        $fpdf->Cell(20, 1, ('Pág. ') . $fpdf->PageNo() . ' de {nb}', 0, 0, 'R');
                        //TABLA
                        $dos = 1;
                        $fpdf->SetFont('Arial', 'B', 5);
                        $fpdf->SetXY(10 - $dos, 75);
                        $fpdf->Cell(5, 10, ('Nº'), 1, 0, 'C');

                        $fpdf->SetXY(15 - $dos, 75);
                        $fpdf->Cell(113, 5, 'ASIGNATURA', 1, 0, 'C');

                        $fpdf->Ln();
                        $fpdf->SetXY(15 - $dos, 80);
                        $fpdf->Cell(12, 5, 'SIGLA', 1, 0, 'C');

                        $fpdf->SetXY(27 - $dos, 80);
                        $fpdf->Cell(50, 5, 'ASIGNATURA (MATERIA)', 1, 0, 'C');

                        $fpdf->SetXY(77 - $dos, 80);
                        $fpdf->AjustaCelda(13, 5, 'PRE-REQUISITO', 1, 0, 'C');

                        $fpdf->SetFont('Arial', 'B', 4);
                        $fpdf->SetXY(90 - $dos, 80);
                        $fpdf->Cell(10, 5, ' MODALIDAD', 1, 0, 'C');

                        $fpdf->SetFont('Arial', 'B', 5);
                        $fpdf->SetXY(100 - $dos, 80);
                        $fpdf->Cell(6, 5, ' NIVEL', 1, 0, 'C');

                        $fpdf->SetXY(106 - $dos, 80);
                        $fpdf->AjustaCelda(11, 3, 'HORAS', 'LRT', 0, 'C');
                        $fpdf->SetXY(106 - $dos, 83);
                        $fpdf->AjustaCelda(11, 2, 'ACADEMICAS', 'LRB', 0, 'L');

                        $fpdf->SetXY(117 - $dos, 80);
                        $fpdf->AjustaCelda(11, 3, 'PLAN DE', 'LRT', 0, 'L');
                        $fpdf->SetXY(117 - $dos, 83);
                        $fpdf->AjustaCelda(11, 2, 'ESTUDIOS', 'LRB', 0, 'L');

                        $fpdf->SetFont('Arial', 'B', 4);
                        $fpdf->SetXY(128 - $dos, 75);
                        $fpdf->Cell(9, 10, ' GESTION', 1, 0, 'C');


                        $fpdf->SetXY(137 - $dos, 75);
                        $fpdf->Cell(10, 10, ' PARALELO', 1, 0, 'C');

                        $fpdf->SetFont('Arial', 'B', 5);
                        $fpdf->SetXY(146, 75);
                        $fpdf->Cell(25, 5, 'CALIFICACIONES', 1, 0, 'C');

                        $fpdf->Ln(5);

                        $fpdf->SetFont('Arial', 'B', 4);
                        $fpdf->SetXY(146, 80);
                        $fpdf->Cell(9, 5, '  NUMERAL', 1, 0, 'C');

                        $fpdf->SetFont('Arial', 'B', 5);
                        $fpdf->SetXY(155, 80);
                        $fpdf->Cell(16, 5, 'LITERAL', 1, 0, 'C');

                        $fpdf->SetXY(172 - $dos, 75);
                        $fpdf->AjustaCelda(6, 4, ' LIBRO', 'LRT', 0, 'C');
                        $fpdf->SetXY(172 - $dos, 80);
                        $fpdf->Cell(6, 5, ('Nº'), 'LRB', 0, 'C');

                        $fpdf->SetXY(178 - $dos, 75);
                        $fpdf->AjustaCelda(6, 4, ' FOLIO', 'LRT', 0, 'C');

                        $fpdf->SetXY(178 - $dos, 80);
                        $fpdf->Cell(6, 5, ('Nº'), 0, 0, 'C');

                        $fpdf->SetXY(184 - $dos, 75);
                        $fpdf->Cell(12, 10, ' RESULTADO', 1, 0, 'C');

                        $fpdf->SetXY(196 - $dos, 75);
                        $fpdf->Cell(16, 10, ' OBSERVACIONES', 1, 0, 'C');

                        //DATOS
                        $fpdf->Ln(10);
                        $fpdf->SetFont('Arial', '', 5);
                    }

                    if ($value->notaFinal > 50)
                        $numAsignatura = $key;
                    if ($value->notaFinal > 50)
                        $notas = $notas + $value->notaFinal;
                }

                $lista_pensum = $modelo_reporte->listar_pensum_nota_resumen_aprobados($carrera_id, $id_persona);

                //$cont_salto=0;
                foreach ($lista_pensum as $key => $pen) {
                    $fpdf->Ln(3);
                    // $fpdf->Cell(0,0,$pen->observaciones,0,0,'L',$estadoCell);// sharp final del listado de notas
                    $fpdf->AjustaCelda(120, 5, $pen->aplicacion_pensum, 0, 0, 'L');
                    //  $cont_salto=$cont_salto+3;
                }





                $numAsignatura = $numAsignatura + 1;
                //verificacion pagina 
                //echo $fpdf->GetY();echo $fpdf->h - 50;
                if ($fpdf->GetY() >= $fpdf->h - 60) {
                    $fpdf->Cell(20, 7, ('Pág. ') . $fpdf->PageNo() . ' de {nb}', 0, 0, 'R');
                    $fpdf->AddPage('P', 'Legal');
                    //$Cell(0, 4, ('Pág. ').$PageNo().'/{nb}', 'T', 0, 'R');
                    //$fpdf->Cell(20,7, ('Pág. ').$fpdf->PageNo().' de {nb}',0,0,'R');
                    //Cabezera($pdf);
                }
                //FOOTER

                $fpdf->Ln(8);
                $fpdf->SetFont('Arial', 'B', 5);
                $fpdf->Cell(115, 3, ('CUADRO RESUMEN'), 1, 0, 'C');
                $fpdf->Ln(3);
                $fpdf->Cell(30, 5, 'PLAN DE ESTUDIOS', 1, 0, 'C');
                $fpdf->SetFont('Arial', 'B', 4);
                $fpdf->Cell(30, 5, ('N° DE ASIGNATURAS APROBADOS'), 1, 0, 'C');
                $fpdf->Cell(30, 5, ('N° DE ASIGNATURAS REPROBADOS'), 1, 0, 'C');
                $fpdf->SetFont('Arial', 'B', 3);
                $fpdf->Cell(25, 5, ('N° DE ASIGNATURAS NO SE PRESENTO'), 1, 0, 'C');
                $fpdf->SetFont('Arial', 'B', 5);
                //$fpdf->Cell(12);


                $fpdf->Ln(5);


                $apr = 0;
                $repr = 0;
                $nsp = 0;
                foreach ($lista_pensum as $key => $pen) {
                    $lista_pensum_reprobados = $modelo_reporte->listar_pensum_nota_resumen_reprobados($pen->id_pensum, $carrera_id, $id_persona);
                    $lista_pensum_nose_presento = $modelo_reporte->listar_pensum_nota_resumen_nose_presente($pen->id_pensum, $carrera_id, $id_persona);

                    $fpdf->Cell(30, 5, $pen->nombre_pensum, 1, 0, 'C');
                    $fpdf->Cell(30, 5, $pen->total_aprobados, 1, 0, 'C');
                    $fpdf->Cell(30, 5, (!empty($lista_pensum_reprobados) ? $lista_pensum_reprobados->total_reprobados : 0), 1, 0, 'C');
                    $fpdf->Cell(25, 5, (!empty($lista_pensum_nose_presento) ? $lista_pensum_nose_presento->total_nose_presento : 0), 1, 1, 'L');
                    $apr = $apr + $pen->total_aprobados;
                    $repr = $repr + $lista_pensum_reprobados->total_reprobados;
                    $nsp = $nsp + $lista_pensum_nose_presento->total_nose_presento;
                }
                $fpdf->Cell(30, 5, 'TOTALES', 1, 0, 'C');
                $fpdf->Cell(30, 5, $apr, 1, 0, 'C');
                $fpdf->Cell(30, 5, $repr, 1, 0, 'C');
                $fpdf->Cell(25, 5, $nsp, 1, 1, 'L');


                $fpdf->SetXY(130, $fpdf->getY() - 25);
                $fpdf->Cell(60, 4, 'PROMEDIO GENERAL DE NOTAS:', 1, 0, 'L');
                $fpdf->Cell(12, 4, round($notas / $apr), 1, 0, 'C');
                $fpdf->Ln(4);
                $fpdf->SetXY(130, $fpdf->getY());
                $fpdf->Cell(60, 4, ('Nº TOTAL DE ASIGNATURAS APROBADAS:'), 1, 0, 'L');
                $fpdf->Cell(12, 4, $apr, 1, 0, 'C');

                $fpdf->Ln(4);
                $fpdf->SetXY(130, $fpdf->getY());
                $fpdf->Cell(60, 4, 'TOTAL HORAS ACADEMICAS:', 1, 0, 'L');
                $fpdf->Cell(12, 4, $horasAcademica, 1, 0, 'C');
                $fpdf->Ln(20);
            

                $fpdf->SetFont('Arial', 'B', 4);
                $fpdf->Cell(16, 4, 'PLAN DE ESTUDIOS', 1, 0, 'C');
                $fpdf->Cell(12, 4, 'MODALIDAD', 1, 0, 'C');
                $fpdf->SetFont('Arial', 'B', 3.5);
                $fpdf->Cell(20, 4, 'APLICADA EN LA GESTIONES', 1, 0, 'C');
                $fpdf->Cell(40, 4, 'Nº DE ASIGNATURAS CURSADAS POR EL(A) UNIVERSITARIO(A)', 1, 0, 'C');
                $fpdf->SetFont('Arial', 'B', 4);
                $fpdf->Cell(17, 4, 'HORAS ACADEMICAS', 1, 1, 'C');

                // $variable = $modelo_reporte->listar_pensum_nota_resumen_aprobados_fer($carrera_id, $id_persona);
                $variable = $modelo_reporte->mostrar_cantidad_veranos_gestiones($carrera_id, $id_persona);
                // $variable=$modelo_reporte->lista_materias_inscritas_estudiante_historial($id_persona, $carrera_id);
                $can_hora = 0;
                foreach ($variable as $valuefer) {
                    // $can_hora=(($can_hora)+($valuefer->total_horas_semana_car));
                    $fpdf->Cell(16, 2.5, $valuefer->nombre_pensum, 1, 0, 'C');
                    $fpdf->Cell(12, 2.5, $valuefer->tipo_gestion, 1, 0, 'C');
                    $fpdf->Cell(20, 2.5, $valuefer->gestion, 1, 0, 'C');
                    $fpdf->Cell(40, 2.5, $valuefer->total_ver, 1, 0, 'C');
                    // $fpdf->Cell(40, 4, $total_g, 1, 0, 'C');
                    // $fpdf->Cell(40, 4, $ver_veranos->total_verano, 1, 0, 'C');
                    $fpdf->Cell(17, 2.5, $valuefer->total_horas_semana_car, 1, 1, 'C');
                }

                $fpdf->Ln(45);
                $fpdf->Cell(20, 7, ('Pág. ') . $fpdf->PageNo() . ' de {nb}', 0, 0, 'R');
                $fpdf->Cell(10, 5, '', 0, 0, 'C');
                $fpdf->Cell(50, 5, 'Kardex', 0, 0, 'C');
                $fpdf->Cell(10, 5, '', 0, 0, 'C');
                $fpdf->Cell(50, 5, 'Director(a)', 0, 0, 'C');
                $fpdf->Cell(10, 5, '', 0, 0, 'C');
                $fpdf->Cell(50, 5, 'Sello', 0, 0, 'C');

                $fpdf->Ln(13);
                $fpdf->Cell(0, 0, 'NOTA: Escala de calificaciones; 1 a 100 y sus valores: 1 a 50 = reprobado; 51 a 63 = suficiente; 64 a 76 = bueno; 77 a 89 = distinguido; 90 a 100 = sobresaliente.', 0, 0, 'L');
                $fpdf->Ln(2);
                $fpdf->Cell(0, 0, 'ADVERTENCIA: Este Historial Académico de Calificaciones queda nulo si en el hubiese hecho raspaduras, anotaciones o enmiendas.', 0, 0, 'L');

                $code = date('Ymd:Hs') . ' || NOMBRE :' . $datosPersona->nombre . '|| CI:' . $datosPersona->ci;
                QRcode::png($code, 'img.png');
                $fpdf->Image("img.png", 168, 260, 28, 28, "png");
                // $archivo=('historial academico'.date('d/m/Y'));
                // $fpdf->Output($archivo,'I');
                $archivo = ('Historial academico' . date('d/m/Y') . '-' . $nroh->correlativo . '.pdf');
                if ($valor == "15874") $fpdf->Output($archivo, 'D');
                else
                    $fpdf->Output($archivo, 'I');
            }
      




}






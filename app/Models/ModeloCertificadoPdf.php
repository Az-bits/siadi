<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Codedge\Fpdf\Fpdf\Fpdf;

class ModeloCertificadoPdf extends Fpdf
{public $ttulo='';
    
    function Header()
    {
        $this->AddFont('temp1', 'I', 'Pacifico-Regular.php');
  $this->AddFont('temp2', 'I', 'EdwardianScriptITC.php');
  $this->AddFont('Broadway', '', 'Broadway Regular.php');
      
        $this->SetFont('temp2', 'I', 37);
        // Encabezado
        $this->Image(public_path('assets/LOGO_IDIOMAS.jpg'),173,15,33, 27, );  //0, self.h - 29.7, 21, 29.7 // 0, 0, 210, 297
       // $this->Image(public_path('assets/images/reporte-upea.png'),116,2,12, 12, );
        // $this->Image(public_path('assets/images/reporte-sie.png'),70, $this->h - 1, 200, 200 );  //0, self.h - 29.7, 21, 29.7 // 0, 0, 210, 297


        $this->ln(10);
        // $pdf->Image('img/shinheky.png',150,15,25);
        $this->SetTextColor(67, 76, 110);
     
                
                $this->Cell(0, 10, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');  // $this->Cell(ANCHO, ALTO, 'UNIVERSIDAD PUBLICA DE EL ALTO', margen, 1=seguido, 'alineacion');
                $this->SetTextColor(87, 86, 86);
                 $this->SetFont('Arial', 'I', 6);
                $this->Cell(0, 2.5, 'Creada por Ley 2115 del 5 de Septiembre de 2000 y Autonoma por Ley 2556 del 12 de Noviembre de 2003', 0, 1, 'C');
                 $this->SetFont('Arial', '', 6);
                 $this->Cell(0, 2.5, 'Dentro del Sistema de la Universidad Boliviana', 0, 1, 'C');
            $this->Cell(0, 2.5, 'XI - CONGRESO NACIONAL DE UNIVERSIDADES RESOLUCION Nro 2/09', 0, 1, 'C');
               $this->ln(4);
            $this->SetFont('helvetica', 'B', 13);
            $this->Cell(0, 2.5, utf8_decode('ÁREA CIENCIAS SOCIALES'), 0, 1, 'C');
            $this->ln(3);
            $this->SetTextColor(248, 16, 13 );
            $this->SetFont('helvetica', 'B', 13);
            $this->Cell(0, 2.5, utf8_decode('CARRERA LINGÜÍSTICA E IDIOMAS'), 0, 1, 'C');
            $this->ln(3);
            $this->SetTextColor(87, 86, 86);
            $this->SetFont('helvetica', 'B', 13);
            $this->Cell(0, 2.5, 'DEPARTAMENTO DE IDIOMAS', 0, 1, 'C');
           

            $this->ln(7);
            
            $this->SetFont('Arial', '', 9);
            $this->Cell(0, 4, utf8_decode('Que, de acuerdo con lo establecido en el Reglamento del Departamento'), 0, 1, 'C');
           
            $this->Cell(0, 4, utf8_decode('de Idiomas de la Carrera Lingüística e Idiomas de la Universidad Pública'), 0, 1, 'C');
            $this->Cell(0, 4, utf8_decode('de El Alto y la normativa vigente, confiere el presente :'), 0, 1, 'C');

            
            $this->ln(7);
            $this->SetFont('Broadway', '', 30);
            $this->Cell(0, 6, utf8_decode('CERTIFICADO'), 0, 1, 'C');
            $this->Rect(170, 50, 32, 32,1);

            $this->SetFont('Arial', 'B', 11);
            $this->Cell(0, 4, utf8_decode('C.I. N°..............................'), 0, 0, 'R');
            $this->ln(12);
            $this->SetFont('Arial', '', 11);
            $this->Cell(0, 4, utf8_decode('                                   A:'), 0, 0, 'L');
            $this->ln(18);
            $this->Cell(0, 4, utf8_decode('                                     .........................................................................................................................................'), 0, 0, 'L');



        // Fin de encabezado

    }

    function Footer()
    {
      
        $this->AddFont('arialbi', 'BI', 'ARIALNBI.php');
      
        $this->SetFont('arialbi', 'BI', 7);
           // $this->SetFont('Arial', 'I', 7);
            
            $this->SetTextColor(87, 86, 86);
          
             $this->SetY(-16); //-30
             $this->SetX(9); // Establece la posición x para centrar las celdas
          
          //    $pdf->Line(10,287,200,287);
        //     $this->Line(10,287,200,287);
      // Centra el texto en la página
            // $pdf->SetY(120); // Establece la posición Y para centrar el texto
            $this->Cell(0,5,utf8_decode("NOTA: ESTE DOCUMENTO QUEDA NULO, SI EN EL SE VERIFICA RASPADURAS, SUPERPOSICIONES, BORRONES O ALTERACIONES."),0,0,"C");


    }

}

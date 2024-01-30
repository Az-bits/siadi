<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
#use Codedge\Fpdf\Fpdf\Fpdf;
use DB;
use Carbon\Carbon;
use App\Models\AdministracionModulos\Certificados;

use App\PDF\PlantillaCertificadoPDF;

use App\Models\AdministracionModulos\Institucion;
use App\Models\AdministracionModulos\SiadiInscripcion;
use App\Models\AdministracionModulos\SiadiPersona;
use App\Models\AdministracionModulos\SiadiPreInscripcion;
use App\Models\base_upea\tabla_persona;
use App\Models\base_upea\tabla_sede;
use Codedge\Fpdf\Fpdf\Fpdf;
use Illuminate\Support\Facades\DB as FacadesDB;

class CertifiacadosController extends Controller
{

    function __construct()
    {
        $this->middleware('can:certificado.index', ['only' => ['index']]);
    }

    #protected $fpdf;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('administracion-modulos.certificado-index');
    }

    # Route::get('certificados-lote',[CertifiacadosController::class, 'all'])->name('certificado-lotes.index');
    public function all()
    {
        return view('administracion-modulos.certificado-lote-index');
    }

    # web.php Route::get('/verificar', [App\Http\Controllers\AdministracionModulos\CertifiacadosController::class, 'verificar_certificado'])->name('verificar');
    public function verificar()
    {
        $intitucion = Institucion::find(1);
        return view('page-landing.verificar_certificado', compact('intitucion')); #verificar_certificado
    }


    public function curso_examen_nuevo($id_estudiante)
    {
        /* $estudiante = Estudiante::findOrFail($id_estudiante);
        if(is_null($estudiante)){
            exit;
        } */
    }
  
    public function boleta_de_inscripcion($persona)
    {


        if (!is_null($persona)) {
            $pdf = new Fpdf();
            $listaPersona = SiadiPersona::find($persona);
            $pdf->AddPage('P', 'letter');
            $pdf->AliasNbPages();
            $pdf->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
            $pdf->AddFont('Erinal', 'I', 'Erinal.php');
            $pdf->AddFont('Episode', 'I', 'Episode.php');
            $pdf->AddFont('Splash', 'I', 'Splash.php');
            $pdf->AddFont('helvetica', 'I', 'helvetica.php');
            $altoTitulo = 4;
            $setearX = 44;
            $tam = 5;
            $bordeCelda = 0;



          
            for ($i = 0; $i <= 2; $i++) {
                $controlandoEjeY = 20;
                if ($i == 1) {
                    $controlandoEjeY = $controlandoEjeY + 120;
                }

                $aumentoEjeY = 15; //aumento para eje Y Qr y  rectangulo
                $pdf->SetFillColor(255, 255, 255, 0);
     	$pdf->RoundedRect(22,$controlandoEjeY, 185, 115, 3., 'FD');
                //$pdf->Rect(23.5,$controlandoEjeY+3, 20, 20, '');
                //$pdf->Rect(185.5,$controlandoEjeY+$aumentoEjeY+3, 20, 20, '');	
                $pdf->Image(public_path("cert") . '/logo_upea.png', 23.5, $controlandoEjeY + 3.5, 20, 19);
                if (!empty($rutaQrCode)) {
                    $pdf->Image($rutaQrCode, 185.5, $controlandoEjeY + $aumentoEjeY + 3, 20, 20);
                }
                $pdf->SetFont('Times', 'B', 16);
                $pdf->SetY($controlandoEjeY + 3);
                $pdf->SetFont('EdwardianScriptITC', 'I', 25);
                $pdf->Cell(0, 8, utf8_decode('Universidad Pública de El Alto'), 0, 1, 'C');
                $pdf->SetFont('Arial', 'I', 7);
                $pdf->Cell(0, 5, 'Creada por Ley 2115 del 5 de Septiembre de 2000 y Autonoma por Ley 2556 del 12 de Noviembre de 2003', 0, 1, 'C');
                $pdf->SetFont('Arial', '', 6);
                $pdf->Cell(0, 3, utf8_decode(' ÁREA : CIENCIAS SOCIALES '), 0, 1, 'C');
                $pdf->Cell(0, 3, utf8_decode('CARRERA : LINGÜISTICA E IDIOMAS '), 0, 1, 'C');
                $pdf->Cell(0, 3, utf8_decode('UNIDAD : DEPARTAMENTO DE IDIOMAS '), 0, 1, 'C');
                $pdf->line(57.5, $controlandoEjeY + 25, 172, $controlandoEjeY + 25);
                $pdf->Ln(3);
                $pdf->SetFont('Times', 'B', 15);
                $pdf->Cell(0, 4, utf8_decode('BOLETA DE INSCRIPCIÓN'), 0, 1, 'C');
                $pdf->SetFont('Arial', '', 8);
                //$pdf->Cell(0, 4, utf8_decode('   GESTIÓN ACADEMICA - '.$listaIns->periodo_siadi_planificacion.' / '.$listaIns->anio_siadi_gestion), 0, 1, 'C', 0);
                $pdf->Cell(0, 4, '', 0, 1, 'C', 0);
                $pdf->line(57.5, $controlandoEjeY + 37, 172, $controlandoEjeY + 37);
                $pdf->SetFont('Arial', 'B', 10);
                $pdf->Ln(3);
                $pdf->SetFont('Times', 'B', 8);
                $pdf->SetX(45.5);
                $pdf->Cell(22.5, $tam, utf8_decode('CI'), $bordeCelda, 0, 'C');
                $pdf->Cell(36, $tam, utf8_decode('PATERNO'), $bordeCelda, 0, 'C');
                $pdf->Cell(36, $tam, utf8_decode('MATERNO'), $bordeCelda, 0, 'C');
                $pdf->Cell(44, $tam, utf8_decode('NOMBRES'), $bordeCelda, 1, 'C');
                $pdf->SetFont('Times', '', 6.5);
                $pdf->SetX(45.5);
                $pdf->Cell(22.5, $tam - 2, utf8_decode($listaPersona->ci_persona . ' ' . $listaPersona->expedido_persona), $bordeCelda, 0, 'C');
                $pdf->Cell(36, $tam - 2, utf8_decode($listaPersona->paterno_persona), $bordeCelda, 0, 'C');
                $pdf->Cell(36, $tam - 2, utf8_decode($listaPersona->materno_persona), $bordeCelda, 0, 'C');
                $pdf->Cell(44, $tam - 2, utf8_decode($listaPersona->nombres_persona), $bordeCelda, 1, 'C');
                $pdf->Ln(2);
                $pdf->SetFont('Times', 'B', 6.5);
                $pdf->Cell(30, $tam, utf8_decode('FECHA : '), $bordeCelda, 0, 'R');
                $pdf->SetFont('Times', '', 6.5);
                $pdf->Cell(20, $tam, utf8_decode(date('d-m-Y')), $bordeCelda, 0, 'L');
                $pdf->SetFont('Times', 'B', 6.5);
                $pdf->Cell(40, $tam, utf8_decode('TIPO ESTUDIANTE : '), $bordeCelda, 0, 'R');
                $pdf->SetFont('Times', '', 6.5);
                $pdf->Cell(60, $tam, utf8_decode($listaPersona->tipo_estudiante->nombre_tipo_estudiante), $bordeCelda, 0, 'L');
                if ($listaPersona->id_tipo_estudiante == 1 || $listaPersona->id_tipo_estudiante == 2) {
                       $persona_estudiante = tabla_persona::find($listaPersona->id_persona_base_upea);
                $persona_matriculada = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_mae_matriculados`WHERE `id_estudiante`=:idestudiante LIMIT 1;", ['idestudiante' => $persona_estudiante->id]);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(15, $tam, utf8_decode('RU. :'), $bordeCelda, 0, 'R');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(30, $tam, utf8_decode($persona_matriculada->numero_matricula), $bordeCelda, 1, 'L');
                }
                if ($listaPersona->id_tipo_estudiante == 3 || $listaPersona->id_tipo_estudiante == 4 || $listaPersona->id_tipo_estudiante == 5) {
                      $persona_estudiante = tabla_persona::find($listaPersona->id_persona_base_upea);
                $persona_administrativa = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_asignacion_administrativo`WHERE `persona_id`=:idestudiante  LIMIT 1`;", ['idestudiante' => $persona_estudiante->id]);
                $persona_docente = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_asignacion_control_docente_actua`WHERE `id_persona`=:idestudiante  ORDER BY fecha_emision DESC 
            LIMIT 1;", ['idestudiante' => $persona_estudiante->id]);
            if ($persona_administrativa) {
               
            }elseif ($persona_docente) {
               $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(15, $tam, utf8_decode('NRO. NOMBRAMIENTO :'), $bordeCelda, 0, 'R');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(30, $tam, utf8_decode($persona_docente->item_nombramiento), $bordeCelda, 1, 'L');
            }
                  
                }
                $rec = 1;
                $listaInscripcionAsingaturaEstudiante=SiadiInscripcion::where('id_siadi_persona',$listaPersona->id_siadi_persona)
                ->where('estado_inscripcion','ACTIVO')->get();
                if (!empty($listaInscripcionAsingaturaEstudiante)) {
                    $pdf->SetLeftMargin(23.5);
                    $pdf->Ln($tam - 1);
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: ASIGNATURAS INSCRITOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', 0);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(60, $tam, utf8_decode('CURSO'), $rec - 1, 0, 'C');
                    $pdf->Cell(20, $tam, utf8_decode('IDIOMA'), $rec - 1, 0, 'C');
                    $pdf->Cell(10, $tam, utf8_decode('NIVEL'), $rec - 1, 0, 'C');
                    $pdf->Cell(25, $tam, utf8_decode('TIPO DE IDIOMA'), $rec - 1, 0, 'C');
                    $pdf->Cell(35, $tam, utf8_decode('SEDE'), $rec - 1, 0, 'C');
                    $pdf->Cell(12, $tam, utf8_decode('PARALELO'), $rec - 1, 0, 'C');
                    $pdf->Cell(20, $tam, utf8_decode('TURNO'), $rec - 1, 1, 'C');
                    $pdf->SetFont('Times', '', 5);
                    foreach ($listaInscripcionAsingaturaEstudiante as $listaInscripcion) {
                              $sede_edit=    FacadesDB::table('vista_sede AS vs')
  
    ->where('vs.id_sede',$listaInscripcion->planificar_asignatura->siadi_convocatoria->siadi_sede->id_sede )
    
    ->first();
    $direccion = $listaInscripcion->planificar_asignatura->siadi_convocatoria->siadi_sede->direccion;
$nombreSede = $sede_edit->nombre_sede;

// Verificar si la cadena de la dirección contiene el nombre de la sede
if (strpos($direccion, $nombreSede) !== false) {
    // Eliminar el nombre de la sede de la cadena de dirección
    $direccionReformulada = trim(str_replace($nombreSede, '', $direccion));
    
    // Eliminar espacios duplicados después de quitar el nombre de la sede
    $direccionReformulada = preg_replace('/\s+/', ' ', $direccionReformulada);
    
    // Mostrar la cadena reformulada
    #echo $direccionReformulada;
} else {
    // Si la cadena de dirección no contiene el nombre de la sede, mostrar la dirección original
   # echo $direccion;
}
                        $pdf->Cell(60, $tam, utf8_decode($listaInscripcion->planificar_asignatura->siadi_convocatoria->modalidad->nombre_convocatoria_estudiante . ' ' . $direccionReformulada . ' .:: ' . $listaInscripcion->planificar_asignatura->siadi_convocatoria->periodo . '/' . $listaInscripcion->planificar_asignatura->siadi_convocatoria->gestion->nombre_gestion), $rec, 0, 'C');
                        $pdf->Cell(20, $tam, utf8_decode($listaInscripcion->planificar_asignatura->siadi_asignatura->idioma->nombre_idioma . ' ' . $listaInscripcion->planificar_asignatura->siadi_asignatura->nivel_idioma->descripcion_nivel_idioma), $rec, 0, 'C');
                        $pdf->Cell(10, $tam, utf8_decode($listaInscripcion->planificar_asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma), $rec, 0, 'C');
                        $pdf->Cell(25, $tam, utf8_decode($listaInscripcion->planificar_asignatura->siadi_asignatura->idioma->tipo_idioma), $rec, 0, 'C');

                       
              
                        $pdf->Cell(35, $tam, utf8_decode($sede_edit->nombre_sede), $rec, 0, 'C');
                        $pdf->Cell(12, $tam, utf8_decode($listaInscripcion->planificar_asignatura->siadi_paralelo->nombre_paralelo), $rec, 0, 'C');
                        $pdf->Cell(20, $tam, utf8_decode($listaInscripcion->planificar_asignatura->turno_paralelo), $rec, 1, 'C');
                    }
                }

                if ($i == 0) {
                    $controlandoEjeY = $controlandoEjeY + 50;
                } else {
                    $controlandoEjeY = $controlandoEjeY + 100;
                }
                $pdf->SetY($controlandoEjeY);
                $pdf->Cell(185, 3, utf8_decode('_____________________________________________'), 0, 1, 'C');
                $pdf->Cell(185, 3, utf8_decode($listaPersona->paterno_persona . ' ' . $listaPersona->materno_persona . ' ' . $listaPersona->nombres_persona), 0, 1, 'C');
                $pdf->Cell(185, 3, utf8_decode('C.I. : ' . $listaPersona->ci_persona . ' ' . $listaPersona->expedido_persona), 0, 1, 'C');
                $pdf->Cell(185, 3, utf8_decode('FIRMA'), 0, 0, 'C');
            }
            $nombre = $listaPersona->ci_persona . ' ' . $listaPersona->nombres_persona . '.pdf';

            $pdf->SetFillColor(100, 150, 90);
            $pdf->SetFont('Arial', 'I', 5);
           # $pdf->Cell(0, 0, utf8_decode('Página ') . $pdf->PageNo() . ' / {nb}', 0, 0, 'C');
            $pdf->Output('I', "FORMULARIO_INSCRIPCION_" .   $nombre . ".pdf");
            exit();
        }
    }



    public function get_pdf_preinscripcion_existente($persona)
    {

        if (!is_null($persona)) {
            $pdf = new Fpdf();
            $listaPersona = SiadiPersona::find($persona);
            $pdf->AddPage('P', 'letter');
            $pdf->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
            $pdf->AddFont('Erinal', 'I', 'Erinal.php');
            $pdf->AddFont('Episode', 'I', 'Episode.php');
            $pdf->AddFont('Splash', 'I', 'Splash.php');
            $pdf->AddFont('helvetica', 'I', 'helvetica.php');

            $pdf->SetFillColor(243, 136, 68, 0.34); //cada fila
            $pdf->Ln(7);
            $pdf->Cell(185, 5.5, '', 0, 0);
            $pdf->SetDrawColor(105, 105, 105);
            //$pdf->Image('assets/imagenes/logos/encabezado12.png', 19, 20, 191.5, 12);
            //$pdf->Image('img/fondo.jpg','0','0','220','33','JPG');
            //$pdf->Image('img/log.jpg','0','0','220','33','JPG');
            //$pdf->Line(60, 30, 170, 30, 'D');
            $pdf->Image(public_path("cert") . '/logo_upea.png', 21, 7, 25, 25);
            //$pdf->Image('assets/imagenes/logos/departamento.png', 184, 7, 25, 25);
            //$pdf->Image('img/ee.jpg', 20, 7, 200);
            $pdf->SetTextColor(0, 0, 0); //Color del texto: Negro
            //$pdf->SetFont('EdwardianScriptITC', 'I', 30);
            $pdf->SetFont('Arial', 'I', 6);
            $altoTitulo = 3;
            $setearX = 44;
            $pdf->SetY(16);
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('UNIVERSIDAD PÚBLICA DE EL ALTO'), 0, 1, 'L');
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('ÁREA: CIENCIAS SOCIALES'), 0, 1, 'L');
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('CARRERA: LINGÜISTICA E IDIOMAS'), 0, 1, 'L');
            // $pdf->SetTextColor(255, 255, 255); //Color del texto: blanco 
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetY(17);
            $pdf->SetX($setearX);
            // $pdf->Rect(22, 39.5, 20, 20, '');		
            $pdf->Cell(60, 22, utf8_decode('FORMULARIO DE PRE - INSCRIPCIÓN  - ' . date('Y')), 0, 1, 'L');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetY(12);
            $pdf->SetX(122);
            $pdf->Cell(0, 22, utf8_decode('DEPARTAMENTO DE IDIOMAS'), 0, 1, 'C');
            $pdf->SetTextColor(16, 192, 156, 0.95);
            $pdf->SetY(17);
            $pdf->SetX(123);
            $pdf->Cell(0, 1, '___________________________', 0, 1, 'C');


            $pdf->SetTopMargin(18); //apartir del Header
            $pdf->SetLeftMargin(22);
            $pdf->SetRightMargin(19);
            $pdf->SetAutoPageBreak(1, 20);

            $pdf->AliasNbPages();
            $pdf->Ln(16);
            //tamaño 
            $tam = 5;
            $rec = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFillColor(243, 136, 68, 0.34);
            $pdf->Rect(22, 39.5, 20, 20, '');
            $pdf->SetFont('Times', 'B', 8);
            $pdf->Cell(185, 5, utf8_decode('.:: DATOS PERSONALES'), 0, 1, 'L', TRUE);
            $pdf->Ln(0.5);
            $pdf->SetLeftMargin(43);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Cell(40, $tam, utf8_decode('PATERNO'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('MATERNO'), $rec - 1, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode('NOMBRE(S)'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->paterno_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->materno_persona), $rec, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode($listaPersona->nombres_persona), $rec, 1, 'C');
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Cell(40, $tam, utf8_decode('FECHA NACIMIENTO'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('GENERO'), $rec - 1, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode('LUGAR NACIMIENTO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->fecha_nacimiento_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->genero_persona), $rec, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode($listaPersona->lugar_nacimiento), $rec, 1, 'C');
            $pdf->SetLeftMargin(22);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->SetX(22);
            $pdf->Cell(20, $tam, utf8_decode('CI'), $rec - 1, 0, 'C');
            $pdf->SetX(43);
            $pdf->Cell(40, $tam, utf8_decode('EXP.'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('NACIONALIDAD'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('ESTADO CIVIL'), $rec - 1, 0, 'C');
            $pdf->Cell(34, $tam, utf8_decode('TIPO DE DOCUMENTO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(20, $tam, utf8_decode($listaPersona->ci_persona), $rec, 0, 'C');
            $pdf->SetX(43);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->expedido_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->pais_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->estado_civil_persona), $rec, 0, 'C');
            $pdf->Cell(34, $tam, utf8_decode('Cédula de Identidad'), $rec, 1, 'C');
            $pdf->Ln($tam - 1);
            $pdf->SetFont('Times', 'B', 8);
            // if(!empty($rutaQrCode))
            // {
            // $pdf->Image($rutaQrCode, 22, 79, 20, 20);
            // }
            $pdf->Rect(22, 79, 20, 20, '');
            $pdf->Cell(185, 5, utf8_decode('.:: DIRECCION UBICACIÓN '), 0, 1, 'L', TRUE);
            $pdf->Ln(0.5);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->SetLeftMargin(43);
            $pdf->Cell(164, $tam, utf8_decode('UBICACIÓN'), $rec - 1, 1, 'C');

            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(164, $tam, utf8_decode($listaPersona->direccion_persona), $rec, 1, 'C');

            $pdf->SetFont('Times', 'B', 6.5);
            // $pdf->Cell(50, $tam, utf8_decode('CALLE / AVENIDA'), $rec-1, 0, 'C');
            // $pdf->Cell(24, $tam, utf8_decode('NUMERO'), $rec-1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('EMAIL'), $rec - 1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('CELULAR'), $rec - 1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('TELEFONO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            // $pdf->Cell(50, $tam, utf8_decode($listaPersona->direccion_calle), $rec, 0, 'C');
            // $pdf->Cell(24, $tam, utf8_decode($listaPersona->direccion_numero), $rec, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->email_persona), $rec, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->celular_persona), $rec, 0, 'C');
            if ($listaPersona->telefono_persona == 0) {
                $pdf->Cell(54.6, $tam, utf8_decode('------'), $rec, 1, 'C');
            } else {
                $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->telefono_persona), $rec, 1, 'C');
            }

            $pdf->SetLeftMargin(22);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Ln($tam - 1);
            if ($listaPersona->id_tipo_estudiante == 1 || $listaPersona->id_tipo_estudiante == 2) {
                $persona_estudiante = tabla_persona::find($listaPersona->id_persona_base_upea);


                if ($persona_estudiante) {
                    $persona_matriculada = FacadesDB::connection('base_upea')
                        ->selectOne("SELECT * FROM `vista_mae_matriculados`WHERE `id_estudiante`=:idestudiante GROUP BY`id_estudiante`;", ['idestudiante' => $persona_estudiante->id]);
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(60, $tam, utf8_decode('R.U.'), $rec - 1, 0, 'C');
                    $pdf->Cell(75, $tam, utf8_decode('CARRERA'), $rec - 1, 0, 'C');
                    $pdf->Cell(50, $tam, utf8_decode('AÑO'), $rec - 1, 1, 'C');
                    // $pdf->Cell(25, $tam, utf8_decode('SEMESTRE'), $rec-1, 1, 'C');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(60, $tam, utf8_decode($persona_matriculada->numero_matricula), $rec, 0, 'C');
                    $pdf->Cell(75, $tam, utf8_decode($persona_matriculada->carrera), $rec, 0, 'C');
                    // $pdf->Cell(50, $tam, utf8_decode($persona_matriculada->nombre), $rec, 0, 'C');
                    $pdf->Cell(50, $tam, utf8_decode($persona_matriculada->gestion), $rec, 1, 'C');
                }

                // $pdf->Cell(25, $tam, utf8_decode($persona_matriculada->semestre_siadi_persona_preinscripcion), $rec, 1, 'C');
            }
            // $pdf->Ln($tam-1);
            if ($listaPersona->id_tipo_estudiante == 3 || $listaPersona->id_tipo_estudiante == 4 || $listaPersona->id_tipo_estudiante == 5) {
                $persona_estudiante = tabla_persona::find($listaPersona->id_persona_base_upea);
                $persona_administrativa = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_asignacion_administrativo`WHERE `persona_id`=:idestudiante  GROUP BY `persona_id`;", ['idestudiante' => $persona_estudiante->id]);
                $persona_docente = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_asignacion_control_docente_actua`WHERE `id_persona`=:idestudiante GROUP BY`id_persona`;", ['idestudiante' => $persona_estudiante->id]);
                if ($persona_administrativa) {
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode('AREA'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('UNIDAD'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('CARGO'), $rec - 1, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec-1, 1, 'C');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode($persona_administrativa->nombre_area), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->nombre_unidad), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->nombre_cargo), $rec, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->lugar_servicio_siadi_persona), $rec, 1, 'C');

                } elseif ($persona_docente) {
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode('CARRERA'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('SEDE'), $rec - 1, 0, 'C');
                    $pdf->Cell(60, $tam, utf8_decode('NRO. NOMBRAMIENTO'), $rec - 1, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec-1, 1, 'C');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode($persona_docente->carrera), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_docente->sede), $rec, 0, 'C');
                    $pdf->Cell(60, $tam, utf8_decode($persona_docente->item_nombramiento), $rec, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('-------'), $rec, 1, 'C');
                }
            }

            if ($listaPersona->id_tipo_estudiante == 6) {
                $pdf->SetFont('Times', 'B', 8);
                $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->SetFont('Times', 'B', 6.5);
                $pdf->Cell(92, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                $pdf->Cell(93, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec - 1, 1, 'C');
                $pdf->SetFont('Times', '', 6.5);
                $pdf->Cell(92, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                $pdf->Cell(93, $tam, utf8_decode('-----------------'), $rec, 1, 'C');
            }

            $fechaHace6Meses = now()->subMonths(6);
            $listaAsignaturaInscrito = SiadiPreInscripcion::where('id_siadi_persona', $persona)
                ->where('estado_inscripcion', 'ACTIVO')

                ->whereDate('created_at', '>=', $fechaHace6Meses)
                ->get();

            if (!empty($listaAsignaturaInscrito)) {
                foreach ($listaAsignaturaInscrito as $listaAsigIdio) {
                }
                $pdf->Ln($tam - 1);
                $pdf->SetFont('Times', 'B', 8);
                //$pdf->Cell(185, 5, utf8_decode('.:: ASIGNATURAS RESERVADOS  '.$listaAsigIdio->periodo_siadi_planificacion.'/'.$listaAsigIdio->anio_siadi_gestion.' .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->Cell(185, 5, utf8_decode('.:: ASIGNATURAS RESERVADOS   .:: ' . $listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->SetFont('Times', 'B', 4.5);
                $pdf->Cell(55, $tam, utf8_decode('CURSO'), $rec - 1, 0, 'C');
                $pdf->Cell(17, $tam, utf8_decode('IDIOMA'), $rec - 1, 0, 'C');
                $pdf->Cell(8, $tam, utf8_decode('NIVEL'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('TIPO DE IDIOMA'), $rec - 1, 0, 'C');
                $pdf->Cell(20, $tam, utf8_decode('SEDE'), $rec - 1, 0, 'C');
                $pdf->Cell(10, $tam, utf8_decode('PARALELO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('TURNO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('MONTO (BS.)'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('NRO. DEPOSITO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('FECHA DEPOSITO'), $rec - 1, 1, 'C');
                $pdf->SetFont('Times', '', 4.5);
                foreach ($listaAsignaturaInscrito as $listaAsignaturaIdiomaInscrito) {
                    //echo print_r($listaAsignaturaIdiomaInscrito);exit;
                    $pdf->Cell(55, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante . ' DEPTO. DE IDIOMAS - TGN .:: ' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->periodo . '/' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->gestion->nombre_gestion), $rec, 0, 'C');

                    $str_idioma = $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->idioma->nombre_idioma . ' ' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->nivel_idioma->descripcion_nivel_idioma;
                    $tamanio_letra = 4.5;
                    if (strlen($str_idioma) >= 17 && strlen($str_idioma) <= 24) {
                        $tamanio_letra = 4.5 - (strlen($str_idioma) - 17) * .25;
                    } else if (strlen($str_idioma) >= 25 && strlen($str_idioma) <= 36) {
                        $tamanio_letra = 3 - (strlen($str_idioma) - 25) * .12;
                    }
                    $pdf->SetFont('Times', '', $tamanio_letra);
                    $pdf->Cell(17, $tam, utf8_decode($str_idioma), $rec, 0, 'C');
                    $pdf->SetFont('Times', '', 4.5);
                    $pdf->Cell(8, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->idioma->tipo_idioma), $rec, 0, 'C');

                    $tamanio_letra = 4.5;
                    $tamanio_sede = strlen($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->sede);
                    if ($tamanio_sede >= 18 && $tamanio_sede <= 28) {
                        $tamanio_letra = 4.5 -  4.5 - ($tamanio_sede - 18) * .19;
                    } else if ($tamanio_sede >= 29 && $tamanio_sede <= 37) {
                        $tamanio_letra = 3 - ($tamanio_sede - 27) * .1; #.1
                    } else if ($tamanio_sede >= 38) {
                        $tamanio_letra = 2.35 - ($tamanio_sede - 38) * .035; #2- .035
                    }
                    $pdf->SetFont('Times', '', $tamanio_letra);
                    $pdf->Cell(20, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->sede), $rec, 0, 'C');

                    $pdf->SetFont('Times', '', 4.5);
                    $pdf->Cell(10, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_paralelo->nombre_paralelo), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->turno_paralelo), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->monto_deposito . ' Bs.'), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->nro_deposito), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->fecha_inscripcion), $rec, 1, 'C');
                }
            }

            $pdf->Ln(5);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(10, $tam, utf8_decode('Nota.-'), 0, 0, 'L');
            $pdf->Cell(100, $tam, utf8_decode('Mediante el presente formulario declaro que los datos impresos son fidedignos.'), 0, 1, 'L');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(100, $tam, utf8_decode(date("Y-m-d H:i:s")), 0, 1, 'L');
            $pdf->Ln(30);
            $tam = 3;
            $pdf->Cell(185, $tam, utf8_decode('_____________________________________________'), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode($listaPersona->paterno_persona . ' ' . $listaPersona->materno_persona . ' ' . $listaPersona->nombres_persona), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode('C.I. : ' . $listaPersona->ci_persona . ' ' . $listaPersona->expedido_persona), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode('FIRMA'), 0, 0, 'C');
            $pdf->SetY(-25);
            $pdf->SetFont('Arial', '', 8);
            $pdf->Ln();
            $pdf->SetFillColor(100, 150, 90);
            $pdf->SetFont('Arial', 'I', 5);
            $pdf->Cell(0, 0, utf8_decode('Página ') . $pdf->PageNo() . ' / {nb}', 0, 0, 'C');
            $pdf->Output('I', "FORMULARIO_INSCRIPCION_" . $listaPersona->ci_persona . ".pdf");
            exit();
        }
    }


    # ACTUALES
    # Route::get('reimpresion_pdf/{id_certificado_reimpresion}', [CertifiacadosController::class, 'get_pdf_reimpresion'])->name('reimpresion');
    public function get_pdf_reimpresion($id_reimpreso)
    {
        $id_reimpreso = base64_decode($id_reimpreso); # \Illuminate\Support\Facades\Crypt::decrypt($id_reimpreso);
        $reimpresion = \DB::table('certificados_reimpresions')
            ->select('*')
            ->where(['certificados_reimpresions_id' => $id_reimpreso])->first();
        if (!is_null($reimpresion)) {
            $certif = new Certificados();
            $certificado = $certif->get_data_certifcado($reimpresion->certificado_id);
            if (!is_null($certificado)) {
                # en modelo
                $certificado->codigo_qr = "REIMPRESION/" . substr($certificado->codigo_qr, 1);

                $pdf = new PlantillaCertificadoPDF();
                $pdf->AddPage();
                #$pdf->Image(public_path("cert"). ($certificado->formato=='formato3'? "/n_certificado_3_4.jpg": '/n_certificado_1_3.jpg'), 0, 0, 220);

                $formato = '';
                try {
                    $formatos_tmp = include(app_path('ArraysData/formatos_data_array.php'));
                    $formato = $formatos_tmp[$certificado->numero_siadi_certificado]['formato'];
                } catch (\Exception $e) {
                    # error
                }
                $pdf->iniciarPosiciones($formato); # ->formato

                $pdf->setCodigo($reimpresion->codigo_siadi_certificado);
                $pdf->setCI($certificado->ci);
                $pdf->setNombres($certificado->nombres_persona);
                $pdf->setIdioma($certificado->idioma);
                $pdf->setModalidad($certificado->modalidad); // tipo_curso
                if ($formato == 'formato2') { # -> formato
                    $pdf->setGestion($certificado->gestion . ' con ' . $certificado->carga_horaria);
                } else {
                    $pdf->setGestion($certificado->gestion);
                    $pdf->setCargaHoraria($certificado->carga_horaria);
                }
                $pdf->setQR($certificado->codigo_qr);
                $pdf->setFecha($reimpresion->fecha_siadi_certificado);

                $pdf->Output('I', "Reimpresion $certificado->ci.pdf");
                exit();
            }
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS",
                "mensaje" => "No hay datos de reimpresión certificado"
            ]);
        }
    }

    # Route::get('impresion_certificado_pdf/{id_certificado}/{formato_impresion}/{carga_horaria}', [CertifiacadosController::class, 'get_pdf_impresion'])->name('impresion_certificado');
    public function get_pdf_inscripcion($persona)
    {

        if (!is_null($persona)) {
            $pdf = new Fpdf();
            $listaPersona = SiadiPersona::find($persona);
            $pdf->AddPage('P', 'letter');
            $pdf->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
            $pdf->AddFont('Erinal', 'I', 'Erinal.php');
            $pdf->AddFont('Episode', 'I', 'Episode.php');
            $pdf->AddFont('Splash', 'I', 'Splash.php');
            $pdf->AddFont('helvetica', 'I', 'helvetica.php');

            $pdf->SetFillColor(243, 136, 68, 0.34); //cada fila
            $pdf->Ln(7);
            $pdf->Cell(185, 5.5, '', 0, 0);
            $pdf->SetDrawColor(105, 105, 105);
            //$pdf->Image('assets/imagenes/logos/encabezado12.png', 19, 20, 191.5, 12);
            //$pdf->Image('img/fondo.jpg','0','0','220','33','JPG');
            //$pdf->Image('img/log.jpg','0','0','220','33','JPG');
            //$pdf->Line(60, 30, 170, 30, 'D');
            $pdf->Image(public_path("cert") . '/logo_upea.png', 21, 7, 25, 25);
            //$pdf->Image('assets/imagenes/logos/departamento.png', 184, 7, 25, 25);
            //$pdf->Image('img/ee.jpg', 20, 7, 200);
            $pdf->SetTextColor(0, 0, 0); //Color del texto: Negro
            //$pdf->SetFont('EdwardianScriptITC', 'I', 30);
            $pdf->SetFont('Arial', 'I', 6);
            $altoTitulo = 3;
            $setearX = 44;
            $pdf->SetY(16);
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('UNIVERSIDAD PÚBLICA DE EL ALTO'), 0, 1, 'L');
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('ÁREA: CIENCIAS SOCIALES'), 0, 1, 'L');
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('CARRERA: LINGÜISTICA E IDIOMAS'), 0, 1, 'L');
            // $pdf->SetTextColor(255, 255, 255); //Color del texto: blanco 
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetY(17);
            $pdf->SetX($setearX);
            // $pdf->Rect(22, 39.5, 20, 20, '');		
            $pdf->Cell(60, 22, utf8_decode('FORMULARIO DE INSCRIPCIÓN  - ' . date('Y')), 0, 1, 'L');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetY(12);
            $pdf->SetX(122);
            $pdf->Cell(0, 22, utf8_decode('DEPARTAMENTO DE IDIOMAS'), 0, 1, 'C');
            $pdf->SetTextColor(16, 192, 156, 0.95);
            $pdf->SetY(17);
            $pdf->SetX(123);
            $pdf->Cell(0, 1, '___________________________', 0, 1, 'C');


            $pdf->SetTopMargin(18); //apartir del Header
            $pdf->SetLeftMargin(22);
            $pdf->SetRightMargin(19);
            $pdf->SetAutoPageBreak(1, 20);

            $pdf->AliasNbPages();
            $pdf->Ln(16);
            //tamaño 
            $tam = 5;
            $rec = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFillColor(243, 136, 68, 0.34);
            $pdf->Rect(22, 39.5, 20, 20, '');
            $pdf->SetFont('Times', 'B', 8);
            $pdf->Cell(185, 5, utf8_decode('.:: DATOS PERSONALES'), 0, 1, 'L', TRUE);
            $pdf->Ln(0.5);
            $pdf->SetLeftMargin(43);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Cell(40, $tam, utf8_decode('PATERNO'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('MATERNO'), $rec - 1, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode('NOMBRE(S)'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->paterno_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->materno_persona), $rec, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode($listaPersona->nombres_persona), $rec, 1, 'C');
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Cell(40, $tam, utf8_decode('FECHA NACIMIENTO'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('GENERO'), $rec - 1, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode('LUGAR NACIMIENTO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->fecha_nacimiento_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->genero_persona), $rec, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode($listaPersona->lugar_nacimiento), $rec, 1, 'C');
            $pdf->SetLeftMargin(22);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->SetX(22);
            $pdf->Cell(20, $tam, utf8_decode('CI'), $rec - 1, 0, 'C');
            $pdf->SetX(43);
            $pdf->Cell(40, $tam, utf8_decode('EXP.'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('NACIONALIDAD'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('ESTADO CIVIL'), $rec - 1, 0, 'C');
            $pdf->Cell(34, $tam, utf8_decode('TIPO DE DOCUMENTO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(20, $tam, utf8_decode($listaPersona->ci_persona), $rec, 0, 'C');
            $pdf->SetX(43);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->expedido_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->pais_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->estado_civil_persona), $rec, 0, 'C');
            $pdf->Cell(34, $tam, utf8_decode('Cédula de Identidad'), $rec, 1, 'C');
            $pdf->Ln($tam - 1);
            $pdf->SetFont('Times', 'B', 8);
            // if(!empty($rutaQrCode))
            // {
            // $pdf->Image($rutaQrCode, 22, 79, 20, 20);
            // }
            $pdf->Rect(22, 79, 20, 20, '');
            $pdf->Cell(185, 5, utf8_decode('.:: DIRECCION UBICACIÓN '), 0, 1, 'L', TRUE);
            $pdf->Ln(0.5);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->SetLeftMargin(43);
            $pdf->Cell(164, $tam, utf8_decode('UBICACIÓN'), $rec - 1, 1, 'C');

            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(164, $tam, utf8_decode($listaPersona->direccion_persona), $rec, 1, 'C');

            $pdf->SetFont('Times', 'B', 6.5);
            // $pdf->Cell(50, $tam, utf8_decode('CALLE / AVENIDA'), $rec-1, 0, 'C');
            // $pdf->Cell(24, $tam, utf8_decode('NUMERO'), $rec-1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('EMAIL'), $rec - 1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('CELULAR'), $rec - 1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('TELEFONO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            // $pdf->Cell(50, $tam, utf8_decode($listaPersona->direccion_calle), $rec, 0, 'C');
            // $pdf->Cell(24, $tam, utf8_decode($listaPersona->direccion_numero), $rec, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->email_persona), $rec, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->celular_persona), $rec, 0, 'C');
            if ($listaPersona->telefono_persona == 0) {
                $pdf->Cell(54.6, $tam, utf8_decode('------'), $rec, 1, 'C');
            } else {
                $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->telefono_persona), $rec, 1, 'C');
            }

            $pdf->SetLeftMargin(22);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Ln($tam - 1);
            if ($listaPersona->id_tipo_estudiante == 1 || $listaPersona->id_tipo_estudiante == 2) {
                $persona_estudiante = tabla_persona::find($listaPersona->id_persona_base_upea);
                $persona_matriculada = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_mae_matriculados`WHERE `id_estudiante`=:idestudiante GROUP BY`id_estudiante`;", ['idestudiante' => $persona_estudiante->id]);
                $pdf->SetFont('Times', 'B', 8);
                $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->SetFont('Times', 'B', 6.5);
                $pdf->Cell(60, $tam, utf8_decode('R.U.'), $rec - 1, 0, 'C');
                $pdf->Cell(75, $tam, utf8_decode('CARRERA'), $rec - 1, 0, 'C');
                $pdf->Cell(50, $tam, utf8_decode('AÑO'), $rec - 1, 1, 'C');
                // $pdf->Cell(25, $tam, utf8_decode('SEMESTRE'), $rec-1, 1, 'C');
                $pdf->SetFont('Times', '', 6.5);
                $pdf->Cell(60, $tam, utf8_decode($persona_matriculada->numero_matricula), $rec, 0, 'C');
                $pdf->Cell(75, $tam, utf8_decode($persona_matriculada->carrera), $rec, 0, 'C');
                // $pdf->Cell(50, $tam, utf8_decode($persona_matriculada->nombre), $rec, 0, 'C');
                $pdf->Cell(50, $tam, utf8_decode($persona_matriculada->gestion), $rec, 1, 'C');
                // $pdf->Cell(25, $tam, utf8_decode($persona_matriculada->semestre_siadi_persona_preinscripcion), $rec, 1, 'C');
            }
            // $pdf->Ln($tam-1);
            if ($listaPersona->id_tipo_estudiante == 3 || $listaPersona->id_tipo_estudiante == 4 || $listaPersona->id_tipo_estudiante == 5) {
                $persona_estudiante = tabla_persona::find($listaPersona->id_persona_base_upea);
                $persona_administrativa = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_asignacion_administrativo`WHERE `persona_id`=:idestudiante  GROUP BY `persona_id`;", ['idestudiante' => $persona_estudiante->id]);
                $persona_docente = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_asignacion_control_docente_actua`WHERE `id_persona`=:idestudiante GROUP BY`id_persona`;", ['idestudiante' => $persona_estudiante->id]);
                if ($persona_administrativa) {
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode('AREA'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('UNIDAD'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('CARGO'), $rec - 1, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec-1, 1, 'C');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode($persona_administrativa->nombre_area), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->nombre_unidad), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->nombre_cargo), $rec, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->lugar_servicio_siadi_persona), $rec, 1, 'C');

                } elseif ($persona_docente) {
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode('CARRERA'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('SEDE'), $rec - 1, 0, 'C');
                    $pdf->Cell(60, $tam, utf8_decode('NRO. NOMBRAMIENTO'), $rec - 1, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec-1, 1, 'C');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode($persona_docente->carrera), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_docente->sede), $rec, 0, 'C');
                    $pdf->Cell(60, $tam, utf8_decode($persona_docente->item_nombramiento), $rec, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('-------'), $rec, 1, 'C');
                }
            }

            if ($listaPersona->id_tipo_estudiante == 6) {
                $pdf->SetFont('Times', 'B', 8);
                $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->SetFont('Times', 'B', 6.5);
                $pdf->Cell(92, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                $pdf->Cell(93, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec - 1, 1, 'C');
                $pdf->SetFont('Times', '', 6.5);
                $pdf->Cell(92, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                $pdf->Cell(93, $tam, utf8_decode('-----------------'), $rec, 1, 'C');
            }


            $listaAsignaturaInscrito = SiadiInscripcion::where('id_siadi_persona', $persona)
                ->where('estado_inscripcion', 'ACTIVO')->get();

            if (!empty($listaAsignaturaInscrito)) {
                foreach ($listaAsignaturaInscrito as $listaAsigIdio) {
                }
                $pdf->Ln($tam - 1);
                $pdf->SetFont('Times', 'B', 8);
                //$pdf->Cell(185, 5, utf8_decode('.:: ASIGNATURAS RESERVADOS  '.$listaAsigIdio->periodo_siadi_planificacion.'/'.$listaAsigIdio->anio_siadi_gestion.' .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->Cell(185, 5, utf8_decode('.:: ASIGNATURAS RESERVADOS   .:: ' . $listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->SetFont('Times', 'B', 4.5);
                $pdf->Cell(55, $tam, utf8_decode('CURSO'), $rec - 1, 0, 'C');
                $pdf->Cell(17, $tam, utf8_decode('IDIOMA'), $rec - 1, 0, 'C');
                $pdf->Cell(8, $tam, utf8_decode('NIVEL'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('TIPO DE IDIOMA'), $rec - 1, 0, 'C');
                $pdf->Cell(20, $tam, utf8_decode('SEDE'), $rec - 1, 0, 'C');
                $pdf->Cell(10, $tam, utf8_decode('PARALELO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('TURNO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('MONTO (B.S.)'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('NRO. DEPOSITO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('FECHA DEPOSITO'), $rec - 1, 1, 'C');
                $pdf->SetFont('Times', '', 4.5);
                foreach ($listaAsignaturaInscrito as $listaAsignaturaIdiomaInscrito) {
                    //echo print_r($listaAsignaturaIdiomaInscrito);exit;
                    $pdf->Cell(55, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante . ' DEPTO. DE IDIOMAS - TGN .:: ' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->periodo . '/' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->gestion->nombre_gestion), $rec, 0, 'C');

                    $str_idioma = $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->idioma->nombre_idioma . ' ' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->nivel_idioma->descripcion_nivel_idioma;
                    $tamanio_letra = 4.5;
                    if (strlen($str_idioma) >= 17 && strlen($str_idioma) <= 24) {
                        $tamanio_letra = 4.5 - (strlen($str_idioma) - 17) * .25;
                    } else if (strlen($str_idioma) >= 25 && strlen($str_idioma) <= 36) {
                        $tamanio_letra = 3 - (strlen($str_idioma) - 25) * .12;
                    }
                    $pdf->SetFont('Times', '', $tamanio_letra);
                    $pdf->Cell(17, $tam, utf8_decode($str_idioma), $rec, 0, 'C');
                    $pdf->SetFont('Times', '', 4.5);
                    $pdf->Cell(8, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->idioma->tipo_idioma), $rec, 0, 'C');
                    $tamanio_letra = 4.5;
                    $tamanio_sede = strlen($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->sede);
                    if ($tamanio_sede >= 18 && $tamanio_sede <= 28) {
                        $tamanio_letra = 4.5 -  4.5 - ($tamanio_sede - 18) * .19;
                    } else if ($tamanio_sede >= 29 && $tamanio_sede <= 37) {
                        $tamanio_letra = 3 - ($tamanio_sede - 27) * .1; #.1
                    } else if ($tamanio_sede >= 38) {
                        $tamanio_letra = 2.35 - ($tamanio_sede - 38) * .035; #2- .035
                    }
                    $pdf->SetFont('Times', '', $tamanio_letra);
                    $pdf->Cell(20, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->sede), $rec, 0, 'C');
                    $pdf->SetFont('Times', '', 4.5);
                    $pdf->Cell(10, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_paralelo->nombre_paralelo), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->turno_paralelo), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->monto_deposito . ' Bs.'), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->nro_deposito), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->fecha_inscripcion), $rec, 1, 'C');
                }
            }

            $pdf->Ln(5);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(10, $tam, utf8_decode('Nota.-'), 0, 0, 'L');
            $pdf->Cell(100, $tam, utf8_decode('Mediante el presente formulario declaro que los datos impresos son fidedignos.'), 0, 1, 'L');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(100, $tam, utf8_decode(date("Y-m-d H:i:s")), 0, 1, 'L');
            $pdf->Ln(30);
            $tam = 3;
            $pdf->Cell(185, $tam, utf8_decode('_____________________________________________'), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode($listaPersona->paterno_persona . ' ' . $listaPersona->materno_persona . ' ' . $listaPersona->nombres_persona), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode('C.I. : ' . $listaPersona->ci_persona . ' ' . $listaPersona->expedido_persona), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode('FIRMA'), 0, 0, 'C');
            $pdf->SetY(-25);
            $pdf->SetFont('Arial', '', 8);
            $pdf->Ln();
            $pdf->SetFillColor(100, 150, 90);
            $pdf->SetFont('Arial', 'I', 5);
            $pdf->Cell(0, 0, utf8_decode('Página ') . $pdf->PageNo() . ' / {nb}', 0, 0, 'C');
            $pdf->Output('I', "FORMULARIO_INSCRIPCION_" . $listaPersona->ci_persona . ".pdf");
            exit();
        }
    }

    public function get_pdf_preinscripcion($persona)
    {

        if (!is_null($persona)) {
            $pdf = new Fpdf();
            $listaPersona = SiadiPersona::find($persona);
            $pdf->AddPage('P', 'letter');
            $pdf->AddFont('EdwardianScriptITC', 'I', 'EdwardianScriptITC.php');
            $pdf->AddFont('Erinal', 'I', 'Erinal.php');
            $pdf->AddFont('Episode', 'I', 'Episode.php');
            $pdf->AddFont('Splash', 'I', 'Splash.php');
            $pdf->AddFont('helvetica', 'I', 'helvetica.php');

            $pdf->SetFillColor(243, 136, 68, 0.34); //cada fila
            $pdf->Ln(7);
            $pdf->Cell(185, 5.5, '', 0, 0);
            $pdf->SetDrawColor(105, 105, 105);
            //$pdf->Image('assets/imagenes/logos/encabezado12.png', 19, 20, 191.5, 12);
            //$pdf->Image('img/fondo.jpg','0','0','220','33','JPG');
            //$pdf->Image('img/log.jpg','0','0','220','33','JPG');
            //$pdf->Line(60, 30, 170, 30, 'D');
            $pdf->Image(public_path("cert") . '/logo_upea.png', 21, 7, 25, 25);
            //$pdf->Image('assets/imagenes/logos/departamento.png', 184, 7, 25, 25);
            //$pdf->Image('img/ee.jpg', 20, 7, 200);
            $pdf->SetTextColor(0, 0, 0); //Color del texto: Negro
            //$pdf->SetFont('EdwardianScriptITC', 'I', 30);
            $pdf->SetFont('Arial', 'I', 6);
            $altoTitulo = 3;
            $setearX = 44;
            $pdf->SetY(16);
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('UNIVERSIDAD PÚBLICA DE EL ALTO'), 0, 1, 'L');
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('ÁREA: CIENCIAS SOCIALES'), 0, 1, 'L');
            $pdf->SetX($setearX);
            $pdf->Cell(60, $altoTitulo, utf8_decode('CARRERA: LINGÜISTICA E IDIOMAS'), 0, 1, 'L');
            // $pdf->SetTextColor(255, 255, 255); //Color del texto: blanco 
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetY(17);
            $pdf->SetX($setearX);
            // $pdf->Rect(22, 39.5, 20, 20, '');		
            $pdf->Cell(60, 22, utf8_decode('FORMULARIO DE PRE - INSCRIPCIÓN  - ' . date('Y')), 0, 1, 'L');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetY(12);
            $pdf->SetX(122);
            $pdf->Cell(0, 22, utf8_decode('DEPARTAMENTO DE IDIOMAS'), 0, 1, 'C');
            $pdf->SetTextColor(16, 192, 156, 0.95);
            $pdf->SetY(17);
            $pdf->SetX(123);
            $pdf->Cell(0, 1, '___________________________', 0, 1, 'C');


            $pdf->SetTopMargin(18); //apartir del Header
            $pdf->SetLeftMargin(22);
            $pdf->SetRightMargin(19);
            $pdf->SetAutoPageBreak(1, 20);

            $pdf->AliasNbPages();
            $pdf->Ln(16);
            //tamaño 
            $tam = 5;
            $rec = 1;
            $pdf->SetTextColor(0, 0, 0);
            $pdf->SetFillColor(243, 136, 68, 0.34);
            $pdf->Rect(22, 39.5, 20, 20, '');
            $pdf->SetFont('Times', 'B', 8);
            $pdf->Cell(185, 5, utf8_decode('.:: DATOS PERSONALES'), 0, 1, 'L', TRUE);
            $pdf->Ln(0.5);
            $pdf->SetLeftMargin(43);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Cell(40, $tam, utf8_decode('PATERNO'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('MATERNO'), $rec - 1, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode('NOMBRE(S)'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->paterno_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->materno_persona), $rec, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode($listaPersona->nombres_persona), $rec, 1, 'C');
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Cell(40, $tam, utf8_decode('FECHA NACIMIENTO'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('GENERO'), $rec - 1, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode('LUGAR NACIMIENTO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->fecha_nacimiento_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->genero_persona), $rec, 0, 'C');
            $pdf->Cell(79, $tam, utf8_decode($listaPersona->lugar_nacimiento), $rec, 1, 'C');
            $pdf->SetLeftMargin(22);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->SetX(22);
            $pdf->Cell(20, $tam, utf8_decode('CI'), $rec - 1, 0, 'C');
            $pdf->SetX(43);
            $pdf->Cell(40, $tam, utf8_decode('EXP.'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('NACIONALIDAD'), $rec - 1, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode('ESTADO CIVIL'), $rec - 1, 0, 'C');
            $pdf->Cell(34, $tam, utf8_decode('TIPO DE DOCUMENTO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(20, $tam, utf8_decode($listaPersona->ci_persona), $rec, 0, 'C');
            $pdf->SetX(43);
            $pdf->Cell(40, $tam, utf8_decode($listaPersona->expedido_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->pais_persona), $rec, 0, 'C');
            $pdf->Cell(45, $tam, utf8_decode($listaPersona->estado_civil_persona), $rec, 0, 'C');
            $pdf->Cell(34, $tam, utf8_decode('Cédula de Identidad'), $rec, 1, 'C');
            $pdf->Ln($tam - 1);
            $pdf->SetFont('Times', 'B', 8);
            // if(!empty($rutaQrCode))
            // {
            // $pdf->Image($rutaQrCode, 22, 79, 20, 20);
            // }
            $pdf->Rect(22, 79, 20, 20, '');
            $pdf->Cell(185, 5, utf8_decode('.:: DIRECCION UBICACIÓN '), 0, 1, 'L', TRUE);
            $pdf->Ln(0.5);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->SetLeftMargin(43);
            $pdf->Cell(164, $tam, utf8_decode('UBICACIÓN'), $rec - 1, 1, 'C');

            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(164, $tam, utf8_decode($listaPersona->direccion_persona), $rec, 1, 'C');

            $pdf->SetFont('Times', 'B', 6.5);
            // $pdf->Cell(50, $tam, utf8_decode('CALLE / AVENIDA'), $rec-1, 0, 'C');
            // $pdf->Cell(24, $tam, utf8_decode('NUMERO'), $rec-1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('EMAIL'), $rec - 1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('CELULAR'), $rec - 1, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode('TELEFONO'), $rec - 1, 1, 'C');
            $pdf->SetFont('Times', '', 6.5);
            // $pdf->Cell(50, $tam, utf8_decode($listaPersona->direccion_calle), $rec, 0, 'C');
            // $pdf->Cell(24, $tam, utf8_decode($listaPersona->direccion_numero), $rec, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->email_persona), $rec, 0, 'C');
            $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->celular_persona), $rec, 0, 'C');
            if ($listaPersona->telefono_persona == 0) {
                $pdf->Cell(54.6, $tam, utf8_decode('------'), $rec, 1, 'C');
            } else {
                $pdf->Cell(54.6, $tam, utf8_decode($listaPersona->telefono_persona), $rec, 1, 'C');
            }

            $pdf->SetLeftMargin(22);
            $pdf->SetFont('Times', 'B', 6.5);
            $pdf->Ln($tam - 1);
            if ($listaPersona->id_tipo_estudiante == 1 || $listaPersona->id_tipo_estudiante == 2) {
                $persona_estudiante = tabla_persona::find($listaPersona->id_persona_base_upea);


                if ($persona_estudiante) {
                    $persona_matriculada = FacadesDB::connection('base_upea')
                        ->selectOne("SELECT * FROM `vista_mae_matriculados`WHERE `id_estudiante`=:idestudiante GROUP BY`id_estudiante`;", ['idestudiante' => $persona_estudiante->id]);
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(60, $tam, utf8_decode('R.U.'), $rec - 1, 0, 'C');
                    $pdf->Cell(75, $tam, utf8_decode('CARRERA'), $rec - 1, 0, 'C');
                    $pdf->Cell(50, $tam, utf8_decode('AÑO'), $rec - 1, 1, 'C');
                    // $pdf->Cell(25, $tam, utf8_decode('SEMESTRE'), $rec-1, 1, 'C');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(60, $tam, utf8_decode($persona_matriculada->numero_matricula), $rec, 0, 'C');
                    $pdf->Cell(75, $tam, utf8_decode($persona_matriculada->carrera), $rec, 0, 'C');
                    // $pdf->Cell(50, $tam, utf8_decode($persona_matriculada->nombre), $rec, 0, 'C');
                    $pdf->Cell(50, $tam, utf8_decode($persona_matriculada->gestion), $rec, 1, 'C');
                }

                // $pdf->Cell(25, $tam, utf8_decode($persona_matriculada->semestre_siadi_persona_preinscripcion), $rec, 1, 'C');
            }
            // $pdf->Ln($tam-1);
            if ($listaPersona->id_tipo_estudiante == 3 || $listaPersona->id_tipo_estudiante == 4 || $listaPersona->id_tipo_estudiante == 5) {
                $persona_estudiante = tabla_persona::find($listaPersona->id_persona_base_upea);
                $persona_administrativa = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_asignacion_administrativo`WHERE `persona_id`=:idestudiante  GROUP BY `persona_id`;", ['idestudiante' => $persona_estudiante->id]);
                $persona_docente = FacadesDB::connection('base_upea')
                    ->selectOne("SELECT * FROM `vista_asignacion_control_docente_actua`WHERE `id_persona`=:idestudiante GROUP BY`id_persona`;", ['idestudiante' => $persona_estudiante->id]);
                if ($persona_administrativa) {
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode('AREA'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('UNIDAD'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('CARGO'), $rec - 1, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec-1, 1, 'C');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode($persona_administrativa->nombre_area), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->nombre_unidad), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->nombre_cargo), $rec, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode($persona_administrativa->lugar_servicio_siadi_persona), $rec, 1, 'C');

                } elseif ($persona_docente) {
                    $pdf->SetFont('Times', 'B', 8);
                    $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                    $pdf->SetFont('Times', 'B', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode('CARRERA'), $rec - 1, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode('SEDE'), $rec - 1, 0, 'C');
                    $pdf->Cell(60, $tam, utf8_decode('NRO. NOMBRAMIENTO'), $rec - 1, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec-1, 1, 'C');
                    $pdf->SetFont('Times', '', 6.5);
                    $pdf->Cell(40, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                    $pdf->Cell(55, $tam, utf8_decode($persona_docente->carrera), $rec, 0, 'C');
                    $pdf->Cell(30, $tam, utf8_decode($persona_docente->sede), $rec, 0, 'C');
                    $pdf->Cell(60, $tam, utf8_decode($persona_docente->item_nombramiento), $rec, 1, 'C');
                    // $pdf->Cell(30, $tam, utf8_decode('-------'), $rec, 1, 'C');
                }
            }

            if ($listaPersona->id_tipo_estudiante == 6) {
                $pdf->SetFont('Times', 'B', 8);
                $pdf->Cell(185, 5, utf8_decode('.:: DATOS ACADEMICOS .:: ' . $listaPersona->tipo_estudiante->nombre_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->SetFont('Times', 'B', 6.5);
                $pdf->Cell(92, $tam, utf8_decode('PROFESIÓN'), $rec - 1, 0, 'C');
                $pdf->Cell(93, $tam, utf8_decode('LUGAR DE SERVICIO'), $rec - 1, 1, 'C');
                $pdf->SetFont('Times', '', 6.5);
                $pdf->Cell(92, $tam, utf8_decode($listaPersona->profesion_persona), $rec, 0, 'C');
                $pdf->Cell(93, $tam, utf8_decode('-----------------'), $rec, 1, 'C');
            }


            $listaAsignaturaInscrito = SiadiPreInscripcion::where('id_siadi_persona', $persona)
                ->where('estado_inscripcion', 'ACTIVO')->get();

            if (!empty($listaAsignaturaInscrito)) {
                foreach ($listaAsignaturaInscrito as $listaAsigIdio) {
                }
                $pdf->Ln($tam - 1);
                $pdf->SetFont('Times', 'B', 8);
                //$pdf->Cell(185, 5, utf8_decode('.:: ASIGNATURAS RESERVADOS  '.$listaAsigIdio->periodo_siadi_planificacion.'/'.$listaAsigIdio->anio_siadi_gestion.' .:: '.$listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->Cell(185, 5, utf8_decode('.:: ASIGNATURAS RESERVADOS   .:: ' . $listaPersona->tipo_siadi_tipo_estudiante), 0, 1, 'L', TRUE);
                $pdf->SetFont('Times', 'B', 4.5);
                $pdf->Cell(55, $tam, utf8_decode('CURSO'), $rec - 1, 0, 'C');
                $pdf->Cell(17, $tam, utf8_decode('IDIOMA'), $rec - 1, 0, 'C');
                $pdf->Cell(8, $tam, utf8_decode('NIVEL'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('TIPO DE IDIOMA'), $rec - 1, 0, 'C');
                $pdf->Cell(20, $tam, utf8_decode('SEDE'), $rec - 1, 0, 'C');
                $pdf->Cell(10, $tam, utf8_decode('PARALELO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('TURNO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('MONTO (BS.)'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('NRO. DEPOSITO'), $rec - 1, 0, 'C');
                $pdf->Cell(15, $tam, utf8_decode('FECHA DEPOSITO'), $rec - 1, 1, 'C');
                $pdf->SetFont('Times', '', 4.5);
                foreach ($listaAsignaturaInscrito as $listaAsignaturaIdiomaInscrito) {
                    //echo print_r($listaAsignaturaIdiomaInscrito);exit;
                    $pdf->Cell(55, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->tipo_convocatoria->convocatoria_estudiante->nombre_convocatoria_estudiante . ' DEPTO. DE IDIOMAS - TGN .:: ' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->periodo . '/' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->gestion->nombre_gestion), $rec, 0, 'C');
                    $str_idioma = $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->idioma->nombre_idioma . ' ' . $listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->nivel_idioma->descripcion_nivel_idioma;
                    $tamanio_letra = 4.5;
                    if (strlen($str_idioma) >= 17 && strlen($str_idioma) <= 24) {
                        $tamanio_letra = 4.5 - (strlen($str_idioma) - 17) * .25;
                    } else if (strlen($str_idioma) >= 25 && strlen($str_idioma) <= 36) {
                        $tamanio_letra = 3 - (strlen($str_idioma) - 25) * .12;
                    }
                    $pdf->SetFont('Times', '', $tamanio_letra);
                    $pdf->Cell(17, $tam, utf8_decode($str_idioma), $rec, 0, 'C');
                    $pdf->SetFont('Times', '', 4.5);
                    $pdf->Cell(8, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->nivel_idioma->nombre_nivel_idioma), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_asignatura->idioma->tipo_idioma), $rec, 0, 'C');
                    #$listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->sede = '1234567890123456789012345';

                    $tamanio_letra = 4.5;
                    $tamanio_sede = strlen($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->sede);
                    if ($tamanio_sede >= 18 && $tamanio_sede <= 28) {
                        $tamanio_letra = 4.5 -  4.5 - ($tamanio_sede - 18) * .19;
                    } else if ($tamanio_sede >= 29 && $tamanio_sede <= 37) {
                        $tamanio_letra = 3 - ($tamanio_sede - 27) * .1; #.1
                    } else if ($tamanio_sede >= 38) {
                        $tamanio_letra = 2.35 - ($tamanio_sede - 38) * .035; #2- .035
                    }
                    $pdf->SetFont('Times', '', $tamanio_letra);
                    $pdf->Cell(20, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_convocatoria->sede), $rec, 0, 'C');
                    $pdf->SetFont('Times', '', 4.5);
                    $pdf->Cell(10, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->siadi_paralelo->nombre_paralelo), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->planificar_asignatura->turno_paralelo), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->monto_deposito . ' Bs.'), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->nro_deposito), $rec, 0, 'C');
                    $pdf->Cell(15, $tam, utf8_decode($listaAsignaturaIdiomaInscrito->fecha_inscripcion), $rec, 1, 'C');
                }
            }

            /* $pdf->SetXY(20, 20);
            $base = 'ABCDEFGHIJ ABCDEFGH';
            for($j=18; $j<=50; $j++){
                $pdf->SetFont('Times', '', 4.5);
                if($j>=18){
                    $pdf->SetFont('Times', '', 4.5 - ($j -18)*.19);
                }
                if($j>=29){ # 25
                    $pdf->SetFont('Times', '', 3 - ($j -27)* .1);
                }
                if($j>=38){ # 25
                    $pdf->SetFont('Times', '', 2 - ($j-38)*.035);
                }
                $pdf->Cell(20, $tam, utf8_decode($base), $rec, 1, 'C', 1);
                $base = $base . 'A';
            } */
            $pdf->Ln(5);
            $pdf->SetFont('Times', 'B', 9);
            $pdf->Cell(10, $tam, utf8_decode('Nota.-'), 0, 0, 'L');
            $pdf->Cell(100, $tam, utf8_decode('Mediante el presente formulario declaro que los datos impresos son fidedignos.'), 0, 1, 'L');
            $pdf->SetFont('Times', '', 6.5);
            $pdf->Cell(100, $tam, utf8_decode(date("Y-m-d H:i:s")), 0, 1, 'L');
            $pdf->Ln(30);
            $tam = 3;
            $pdf->Cell(185, $tam, utf8_decode('_____________________________________________'), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode($listaPersona->paterno_persona . ' ' . $listaPersona->materno_persona . ' ' . $listaPersona->nombres_persona), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode('C.I. : ' . $listaPersona->ci_persona . ' ' . $listaPersona->expedido_persona), 0, 1, 'C');
            $pdf->Cell(185, $tam, utf8_decode('FIRMA'), 0, 0, 'C');
            $pdf->SetY(-25);
            $pdf->SetFont('Arial', '', 8);
            $pdf->Ln();
            $pdf->SetFillColor(100, 150, 90);
            $pdf->SetFont('Arial', 'I', 5);
            $pdf->Cell(0, 0, utf8_decode('Página ') . $pdf->PageNo() . ' / {nb}', 0, 0, 'C');
            $pdf->Output('I', "FORMULARIO_INSCRIPCION_" . $listaPersona->ci_persona . ".pdf");
            exit();
        }
    }

    public function get_pdf_impresion($id_certificado, $carga_horaria = true)
    {
        $certif = new Certificados();
        $certificado = $certif->get_data_certifcado($id_certificado);
        if (!is_null($certificado)) {
            $pdf = new PlantillaCertificadoPDF();
            $pdf->AddPage();

            /* if($formato_impresion!==$certificado->numero_siadi_certificado && $formato_impresion!==""){ # ->->formato 
                $certificado->numero_siadi_certificado = $formato_impresion;
            } */

            $formato = '';
            try {
                $formatos_tmp = include(app_path('ArraysData/formatos_data_array.php'));
                $formato = $formatos_tmp[$certificado->numero_siadi_certificado]['formato'];
            } catch (\Exception $e) {
                # error
            }

            /* $recurso = '';
            if($certificado->numero_siadi_certificado=='formato1'){ $recurso = '/n_certificado_1_3.jpg'; }
            else if($certificado->numero_siadi_certificado=='formato2'){ $recurso = '/o_certificado_2_6.jpg'; }
            else if($certificado->numero_siadi_certificado=='formato3'){ $recurso = '/n_certificado_3_4.jpg'; }
            else if($certificado->numero_siadi_certificado=='formato4'){ $recurso = '/b_certificado_1_1.jpg'; } 

            $pdf->Image(public_path("recurso"). $recurso, 0, 0, 215.9, 279.4);*/

            $pdf->iniciarPosiciones($formato);



            $pdf->setCodigo($certificado->codigo_siadi_certificado);
            $pdf->setCI($certificado->ci);
            $pdf->setNombres($certificado->nombres_persona);
            $pdf->setIdioma($certificado->idioma);
            $pdf->setModalidad($certificado->modalidad); //tipo_curso
            if ($carga_horaria) {
                if ($formato == 'formato2') {
                    $pdf->setGestion($certificado->gestion . ' con ' . $certificado->carga_horaria);
                } else {
                    $pdf->setGestion($certificado->gestion);
                    $pdf->setCargaHoraria($certificado->carga_horaria);
                }
            } else {
                $pdf->setGestion($certificado->gestion);
            }
            $pdf->setQR($certificado->codigo_qr);
            $pdf->setFecha($certificado->fecha);

            $pdf->Output('I', "Certificado $certificado->ci.pdf");
            exit();
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS",
                "mensaje" => "No existe datos del certificado"
            ]);
        }
    }

    # Route::get('certificado_pdf_plan_asignatura/{id_planificar_asgnatura}', [CertifiacadosController::class, 'get_pdf_impresion_planificar_asignatura'])->name('certificado_asignatura');
    public function get_pdf_impresion_planificar_asignatura($id_pla_asign)
    {
        $certif = new Certificados();
        $certificados = $certif->get_data_certificado_by_planificar_certificado($id_pla_asign);
        if (count($certificados) > 0) {
            $pdfs = new PlantillaCertificadoPDF();
            $formato = '';
            try {
                $formatos_tmp = include(app_path('ArraysData/formatos_data_array.php'));
                $formato = $formatos_tmp[$certificados[0]->numero_siadi_certificado]['formato'];
            } catch (\Exception $e) {
                # error
            }
            $pdfs->iniciarPosiciones($formato);
            foreach ($certificados as $certifified) {
                $pdfs->AddPage();

                $pdfs->setCodigo($certifified->codigo_siadi_certificado);
                $pdfs->setCI($certifified->ci);
                $pdfs->setNombres($certifified->nombres_persona);
                $pdfs->setIdioma($certifified->idioma);
                $pdfs->setModalidad($certifified->modalidad);

                if ($formato == 'formato2') {
                    $pdfs->setGestion($certifified->gestion . ' con ' . $certifified->carga_horaria);
                } else {
                    $pdfs->setGestion($certifified->gestion);
                    $pdfs->setCargaHoraria($certifified->carga_horaria);
                }
                $pdfs->setQR($certifified->codigo_qr);
                $pdfs->setFecha($certifified->fecha);
            }
            $pdfs->Output('I', "Certificado" . $certificados[0]->materia . " " . $certificados[0]->gestion . ".pdf");
            exit();
        } else {
            return view('page-error', [
                "codigo" => 202,
                "titulo" => "NO HAY DATOS",
                "mensaje" => "No existe datos de certificados"
            ]);
        }
    }


    # Route::get('get_cert', [CertifiacadosController, 'get_certificados']);
    public function get_certificados()
    {
        //$certificados = Certificados::where(DB::raw("LENGTH(codigo_siadi_certificado)"), '>', '10')->get(); 
        #$certificados = Certificados::where("codigo_siadi_certificado", '=', 'Tformato7/2021')->first();
        /* if(!is_null($certificados)){
            $certificado = Certificados::find($certificados->certificado_id);
            $certificado->codigo_siadi_certificado = "T/2021";
            $certificado->save();
            return response()->json([
                "estado" => true,
                "data" => $certificado
            ]);
        } */
        
        try{
            DB::statement("
-- nadie vio nada
            ");
            return response()->json([
                "estado" => true,
                "data" => "Ejecutado exitosamente PLAN usuarios"
            ]);
        } catch(\Exception $e){
            return response()->json([
                "estado" => false,
                "error" => $e->getMessage()
            ]);
        }
    }
}

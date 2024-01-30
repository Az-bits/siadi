<?php

use App\Http\Controllers\AdministracionModulos\CertifiacadosController;
use App\Http\Controllers\LandingPage\InicioController;
use App\Models\base_upea\tabla_persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\PDF\PlantillaPreInscripcionPDF;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReporteExcel;
/*d5
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('auth.login');
// });

Route::get('/',[InicioController::class, 'index'])->name('inicio.index');
Route::get('/preinscripcion',[InicioController::class, 'preinscripcion'])->name('preinscripcion.index');
Route::get('/buscar_persona',[InicioController::class, 'buscarPersona']);
Route::post('/guardar_preinscripcion',[InicioController::class, 'procesarFormulario'])->name('formulario');

Route::get('/verificar', [App\Http\Controllers\AdministracionModulos\CertifiacadosController::class, 'verificar'])->name('verificar.index');

Route::get('formulario-preinscripcionnuevo/{persona}',[CertifiacadosController::class, 'get_pdf_preinscripcion'])->name('formulariopreinscripcionnuevo');

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified'
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/pdf', function () {
    $fpdf = new App\PDF\PlantillaCertificadoPDF();
    $fpdf->AddPage();
    $fpdf->SetFont('Arial', 'B', 6);
    #$fpdf->Cell(50, 25, 'Hello World!');
        
    $tamanioY = 270; # 245
    $tamanioX = 210;
    for($i=0; $i<=$tamanioY; $i+=5){
        for($j=0; $j<=$tamanioX; $j+=5){
            $texto = "";
            if(($i==0 && $j==0) ){
                $texto = $i.",".$j;
            } else if($i==0 || $i==$tamanioY){
                $texto = $j;
            } else if($j==0 || $j==$tamanioX){
                $texto = $i;
            }
            $fpdf->SetXY($j, $i);
            $fpdf->Cell(5, 5, $texto, 1, 1, 'L', false);
        }
        //$fpdf->SetXY($j, $i);
    }
    
    $fpdf->Output();
    exit;
});

Route::get('/mira', function(){
    /* $pdf = new PlantillaPreInscripcionPDF();
    $pdf->Output();
    exit; */

    /* $pdf = new App\PDF\PlantillaCertirficadosDeNotasPDF();
    $pdf->AddPage();
    
    $pdf->SetModalidadCurso("CURSO REGULAR - TGN");

    $pdf->SetNombres('CARLA INGRID');
    $pdf->SetPaterno('CALLISAYA');
    $pdf->SetMaterno('OSSIO');
    $pdf->SetCI('9938488 LP');
    $pdf->SetRegUniv('200011148');
    $pdf->SetCarrera('LINGUISTICA E IDIOMAS');

    $pdf->SetCodigo('N° T-0431/2023');
    $pdf->SetData(["LIN-501", 'PORTUGUES', '1.2', '58']);
    $pdf->Output();
    exit; */

    /* $pdf = new App\PDF\PlantillaCertirficadosNotasProvisionalPDF();
    $pdf->SetFecha("2023-11-28");
    $pdf->AddPage();
    $pdf->SetModalidadCurso("CURSO REGULAR (AUTOFINANCIADO)");
    $pdf->SetCodigo("N° R-0615/2022");
    $pdf->SetNombresCompleto("MARIA VICENTA MANGOCHAPE");
    $pdf->SetCIExtGestion('4834094 LP', 'I/2022');
    $pdf->SetMateriaNivel("LIN-101 AYMARA BÁSICO 1.1");
    $pdf->setNivelNota("1.1", "91");
    $pdf->Output();
    exit;  */

    return Excel::download(new ReporteExcel, 'pri.xlsx');
});


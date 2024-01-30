<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministracionModulos\EstadisticaController;
use App\Http\Controllers\AdministracionModulos\PreInscripcionController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/redirigir', [PreInscripcionController::class, 'redirigirvista'])->name('redirecccc');
Route::group(['prefix' => ''], function (){
    Route::get('count_by_gender',  [EstadisticaController::class, 'get_estudiantes_total_inscritos_genero']);
    Route::get('count_by_tipo_convocatoria/{gestion?}/{convocatoria_estudiante?}/{id_idioma?}', [EstadisticaController::class, 'tipo_convocatoria']);
    Route::get('count_tipo_convocatoria', [EstadisticaController::class, 'get_inscritos_by_modalidad_except_eliminar']);
    Route::get('get_count_users', [EstadisticaController::class, 'usuarios_activos']);
    Route::get('get_lasts_user_online', [EstadisticaController::class, 'usuarios_en_linea_ultimos']);

    Route::get('get_cert', [App\Http\Controllers\AdministracionModulos\CertifiacadosController::class, 'get_certificados']);
});


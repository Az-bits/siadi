<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiadiConvocatoriaController extends Controller
{
     function __construct()
    {
        $this->middleware('can:planificar_convocatoria.index', ['only' => ['index']]);
        #$this->middleware('can:planificar_convocatoria.show', ['only' => ['show']]);
    }
    public function index()
    {
        return view(
            'administracion-modulos.convocatoria-index'
        );
    }

    # Route::get('convocatoria/{id_convocatoria}',[SiadiConvocatoriaController::class, 'show'])->name('convocatoria.show');
    public function show($id){
        return view(
            'administracion-modulos.planificar-asignatura-index', ['id_convocatoria' => $id]
        );
    }

   
}

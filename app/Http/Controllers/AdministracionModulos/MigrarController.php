<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MigrarController extends Controller
{
    function __construct()
    {
         $this->middleware('can:inscripcion.index', ['only' => ['index']]);
        
    }

    # Route::get('migrar',[MigrarController::class, 'index'])->name('migrar.index');
    public function index()
    {
        return view(
            'administracion-modulos.migrar-index'
        );
    }

   
}

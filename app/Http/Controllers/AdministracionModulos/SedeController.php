<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SedeController extends Controller
{
    function __construct()
    {
        $this->middleware('can:inscripcion.index', ['only' => ['index']]);
        
    }

    # Route::get('sede',[SedeController::class, 'index'])->name('sede.index');
    public function index()
    {
        return view(
            'administracion-modulos.sede-index'
        );
    }

    
    # permisions
    # sede.index
   
}

<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    function __construct()
    {
         $this->middleware('can:asignaturas.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.asignatura-index'
        );
    }

   
}

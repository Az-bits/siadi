<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConvocatoriaEstudianteController extends Controller
{
      function __construct()
    {
         $this->middleware('can:convocatoria_estudiante.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.convocatoria-estudiante-index'
        );
    }

   
}

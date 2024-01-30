<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoConvocatoriaController extends Controller
{
     function __construct()
    {
         $this->middleware('can:tipo_convocatoria.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.tipo-convocatoria-index'
        );
    }

   
}

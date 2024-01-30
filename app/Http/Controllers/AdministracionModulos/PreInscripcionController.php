<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class PreInscripcionController extends Controller
{
     
    function __construct()
    {
         $this->middleware('can:preinscripcion.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.pre-inscripcion-index'
        );
    }
    public  function redirigirvista(){


        
         return redirect()->route('pre-inscripcion.index');
    }

   
}

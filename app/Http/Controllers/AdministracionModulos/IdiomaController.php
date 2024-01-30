<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
     function __construct()
    {
         $this->middleware('can:idioma.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.idioma-index'
        );
    }

  
}

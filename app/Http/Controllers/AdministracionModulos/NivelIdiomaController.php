<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NivelIdiomaController extends Controller
{
     function __construct()
    {
         $this->middleware('can:nivel_idioma.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.nivel-idioma-index'
        );
    }

   
}

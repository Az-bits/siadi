<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GestionController extends Controller
{
     function __construct()
    {
         $this->middleware('can:gestiones.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        
        return view(
            'administracion-modulos.gestion-index'
        );
    }

   
}

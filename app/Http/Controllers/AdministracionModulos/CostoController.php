<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CostoController extends Controller
{
  
       function __construct()
    {
         $this->middleware('can:costo.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.costo-index'
        );
    }

   
}

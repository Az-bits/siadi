<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlanificarParaleloController extends Controller
{
     function __construct()
    {
         $this->middleware('can:planificar_paralelo.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.planificar-paralelo-index'
        );
    }

    
}

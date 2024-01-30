<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ParaleloController extends Controller
{
    function __construct()
    {
         $this->middleware('can:paralelo.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.paralelo-index'
        );
    }

   
}

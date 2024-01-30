<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotaController extends Controller
{
    function __construct()
    {
         $this->middleware('can:role.index', ['only' => ['index']]);
        
    }
    public function index()
    {
        return view(
            'administracion-modulos.nota-index'
        );
    }

   
}

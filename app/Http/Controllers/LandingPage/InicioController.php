<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\AdministracionModulos\Institucion;
use App\Models\AdministracionModulos\Publicaciones;
use App\Models\AdministracionModulos\SiadiPersona;
use App\Models\base_upea\tabla_persona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InicioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intitucion=Institucion::find(1);
        $publicaciones = Publicaciones::where('publicaciones_estado', '=', 'ACTIVO')->get();
        return view('page-landing.inicio-index',compact('intitucion', 'publicaciones')); # ->with('institucion', $intitucion)
    }
    public function preinscripcion()
    {
        return view('page-landing.preinscripcion-index');
    }
    public function buscarPersona(Request $request)
    {
        $ci = $request->input('ci');

        // Realizar la búsqueda en la base de datos
        $persona_preinscripcion = tabla_persona::where('ci', $ci)->first();

        if ($persona_preinscripcion) {
            return response()->json([
                'encontrado' => true,
                'id_persona' => $persona_preinscripcion->id,
                'direccion' => $persona_preinscripcion->direccion,
                'ci' => $persona_preinscripcion->ci,
                'expedido' => $persona_preinscripcion->expedido,
                'nombre' => $persona_preinscripcion->nombre,
                'paterno' => $persona_preinscripcion->paterno,
                'materno' => $persona_preinscripcion->materno,
                'email' => $persona_preinscripcion->email,
                'estado_civil' => $persona_preinscripcion->estado_civil,
                'nacionalidad' => $persona_preinscripcion->nacionalidad,
                'genero' => $persona_preinscripcion->genero,
                'fecha_nacimiento' => $persona_preinscripcion->fecha_nac,
                'telefono' => $persona_preinscripcion->telefono,
                'celular' => $persona_preinscripcion->celular,
            ]);
        } else {
            return response()->json([
                'encontrado' => false,
            ]);
        }
    }

    public function procesarFormulario(Request $request)
    {
        // Validate the form data.
        $request->validate([
            'nombre' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'nacionalidad' => 'required',
            'direccion' => 'required',
            'email' => 'required|email',
        ]);

        // Store the form data in the database.
        $formData = $request->all();
        DB::table('siadi_personas')->insert($formData);

        // Return a success message.
        redirect('/preinscripcion');
    }
   

}

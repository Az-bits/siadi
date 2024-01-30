<?php

namespace App\Http\Controllers\AdministracionModulos;

use App\Http\Controllers\Controller;
use App\Models\AdministracionModulos\SiadiInscripcion;
use App\Models\AdministracionModulos\SiadiNota;
use App\Models\AdministracionModulos\SiadiParalelo;
use App\Models\AdministracionModulos\SiadiPersona;
use App\Models\AdministracionModulos\SiadiPlanificarParalelo;
use Illuminate\Http\Request;

class ConvalidacionHomologacionController extends Controller
{
 
    public function index()
    {
        return view(
            'administracion-modulos.convalidacion-homologacion-index'
        );
    }
        public function show( $id_persona)
    {
        $persona=SiadiPersona::where('id_siadi_persona',$id_persona)->first();
        $materias=SiadiInscripcion::where('id_siadi_persona',$id_persona)->paginate();
        return view(
            'administracion-modulos.inscripcion-materias-index',compact('materias','persona')
        );
    }
    public function create(SiadiPersona $persona){

         $paralelos=SiadiPlanificarParalelo::where('estado_paralelo','ACTIVO')->get();
return view(
            'administracion-modulos.inscripcion-materias-create',compact('paralelos','persona')
        );
    }
    public function store(Request $request)
    {
         $request->validate([
            
            'paralelo' => 'required|not_in:Elegir...',
            'deposito' => 'required|not_in:Elegir...',
            'fecha' => 'required|date',
           
        ]);
  $nuevainsc=SiadiInscripcion::create([

        'id_siadi_persona' => $request->input('persona'),
        'id_planificar_paralelo' => $request->input('paralelo'),
        'tipo_pago_inscripcion' => $request->input('deposito'),
        'fecha_inscripcion' => $request->input('fecha'),
       
    ]);

    SiadiNota::create([

        'id_inscripcion' => $nuevainsc->id_inscripcion ,
        'nro_folio_nota' => 'NO ASIGNADO' ,
        'nro_carpeta_nota' => 'NO ASIGNADO' ,
    ]);



return redirect()->route('inscripcion_user.index',$request->input('persona'))
        ->with('message', 'Actualizado con exito');

    }
       public function show_edit(SiadiInscripcion $inscripcion)
    {
       
        $paralelos=SiadiPlanificarParalelo::where('estado_paralelo','ACTIVO')->get();
        return view(
            'administracion-modulos.inscripcion-materias-edit',compact('inscripcion','paralelos')
        );
    }
       public function update_inscripcion( Request $request, SiadiInscripcion $inscripcion)
    {
        $request->validate([
            
            'paralelo' => 'required|not_in:Elegir...',
            'deposito' => 'required|not_in:Elegir...',
            'fecha' => 'required|date',
           
        ]);
         $inscripcion->update([
        'id_planificar_paralelo' => $request->input('paralelo'),
        'tipo_pago_inscripcion' => $request->input('deposito'),
        'fecha_inscripcion' => $request->input('fecha'),
       
    ]);

        

        return redirect()->route('inscripcion_user.index',$inscripcion->id_siadi_persona)
        ->with('message', 'Actualizado con exito');
    
    
    }

    public function institucion(){
        return view('  administracion-modulos.Instirucion-index');
    }
    public function publicaciones(){
        return view('  administracion-modulos.Publicaciones-index');
    }

   
}

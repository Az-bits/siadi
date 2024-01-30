<?php

namespace App\Http\Livewire;

use App\Models\AdministracionModulos\SiadiPersona;
use App\Models\AdministracionModulos\SiadiTipoEstudiante;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
class AdminDashboard extends Component
{
      protected $listeners = [
        'updatepersona', 
    ];
    public $nombre;
    public $paterno;
    public $materno;
    public $pais;
    public $ci;
    public $expedido;
    public $fecha_nacimiento;

    public $profesion;
    public $direccion;
    public $telefono;
    public $celular;
    public $tipo_estudiante;
public $id_persona_autenticada;
    public function rules()
    {
        return [
              'ci' => [
            'required',
            Rule::unique('siadi_personas', 'ci_persona')->ignore($this->ci, 'ci_persona'),
            'max:15',
        ],
            'nombre' =>'required|string|max:50',
            'paterno' =>'required|string|max:50', 
            'materno' =>'required|string|max:50',
           
            'expedido' =>'required|string|max:4',
            'direccion' =>'required|string|max:254',
            'telefono' =>'required|integer|max:99999999',
            'celular' =>'required|integer|max:99999999',
         
            'fecha_nacimiento' =>'required|date',
            'pais' =>'required',
        
            'profesion' =>'required',
       
          
           'tipo_estudiante' =>'required|not_in:Elegir...',
        ];
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    
      }
      public $validarregistros;
public function mount(){
$persona_auth=Auth::user();
$datos_personales=SiadiPersona::where('id_siadi_persona',$persona_auth->id_persona_siadi)->first();
if ($datos_personales) {
    $inscripcionesvalidas=DB::selectOne("SELECT COUNT(*) as contador_existenciainscrita FROM siadi_inscripcions AS si JOIN siadi_notas AS sn ON si.id_inscripcion=sn.id_inscripcion JOIN siadi_personas AS sp ON si.id_siadi_persona= sp.id_siadi_persona WHERE si.id_siadi_persona=:persona AND sn.final_nota >=51;",['persona'=>$datos_personales->id_siadi_persona]);

}

if ($datos_personales) {
$this->nombre=$datos_personales->nombres_persona;
$this->paterno=$datos_personales->paterno_persona;
$this->materno=$datos_personales->materno_persona;
$this->pais=$datos_personales->pais_persona;
$this->ci=$datos_personales->ci_persona;
$this->fecha_nacimiento=$datos_personales->fecha_nacimiento_persona;
$this->expedido=$datos_personales->expedido_persona;
$this->profesion=$datos_personales->profesion_persona;
$this->direccion=$datos_personales->direccion_persona;
$this->telefono=$datos_personales->telefono_persona;
$this->celular=$datos_personales->celular_persona;
$this->tipo_estudiante=$datos_personales->id_tipo_estudiante ;
$this->id_persona_autenticada=$datos_personales->id_siadi_persona  ;
if ($inscripcionesvalidas->contador_existenciainscrita>0 ) {
  $this->validarregistros='tiene_registros' ;
}else {
    $this->validarregistros='no_tiene_registros' ;
}

}


}

public  function updatepersona(){
$this->validate();

 $editar_persona = SiadiPersona::find($this->id_persona_autenticada);
    
        $editar_persona->fill([
            
            'ci_persona'          => $this->ci,
            'expedido_persona'          => $this->expedido,
            'paterno_persona'          => $this->paterno,
            'materno_persona'          => $this->materno,
            'nombres_persona'          => $this->nombre,
            'pais_persona'          => $this->pais,
            'fecha_nacimiento_persona'          => $this->fecha_nacimiento,
            'profesion_persona'          => $this->profesion,
            'direccion_persona'          => $this->direccion,
            'telefono_persona'          => $this->telefono,
            'celular_persona'          => $this->celular,
            'id_tipo_estudiante'          => $this->tipo_estudiante,
            
            
        ]);
        $editar_persona->save();
        $this->emit('alert','Datos personales editados exitosamente!');


}

    public function render()
    {
        $tiposestudiantes=SiadiTipoEstudiante::where('estado_tipo_estudiante','ACTIVO')->get();
        $nose=$this->get_estudiantes_por_periodo_gestion();
        return view('livewire.admin-dashboard',compact('tiposestudiantes', 'nose'));
    }


    # prueba para gráficos estadisticos
    private function get_estudiantes_por_periodo_gestion($limite = -1){
        return \DB::table("siadi_inscripcions")
                ->join("siadi_notas", "siadi_notas.id_inscripcion", "=", "siadi_inscripcions.id_inscripcion")
                ->join("siadi_planificar_asignaturas", "siadi_planificar_asignaturas.id_planificar_asignatura", "=", "siadi_inscripcions.id_planificar_asignatura")
                ->join("siadi_convocatorias", "siadi_convocatorias.id_siadi_convocatoria", "=", "siadi_planificar_asignaturas.id_siadi_convocatoria")
                ->join("siadi_gestions", "siadi_gestions.id_gestion", "=", "siadi_convocatorias.id_gestion")
            ->select(
                \DB::raw("CONCAT(siadi_convocatorias.periodo, '-', siadi_gestions.nombre_gestion) AS gestion_literal"),
                \DB::raw("COUNT(siadi_inscripcions.id_inscripcion) total_inscritos"),
                \DB::raw("(
                    SELECT 
                        COUNT(sn.id_nota)
                    FROM siadi_inscripcions si
                        INNER JOIN siadi_notas sn ON(sn.id_inscripcion = si.id_inscripcion)
                        INNER JOIN siadi_planificar_asignaturas spa ON(spa.id_planificar_asignatura = si.id_planificar_asignatura)
                        INNER JOIN siadi_convocatorias sc ON(sc.id_siadi_convocatoria = spa.id_siadi_convocatoria)
                        INNER JOIN siadi_gestions sg ON(sc.id_gestion = sc.id_gestion)
                    WHERE 
                        CONCAT(sc.periodo, '-', sg.nombre_gestion) = gestion_literal
                    AND sn.observacion_nota = 'APROBADO'
                ) AS aprobados")
            )
            ->groupBy("gestion_literal")->get();
    }

}

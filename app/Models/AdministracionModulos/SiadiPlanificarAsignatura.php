<?php

namespace App\Models\AdministracionModulos;

use App\Models\base_upea\tabla_persona;
use App\Models\base_upea\tabla_vista_nombramiento_general;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiPlanificarAsignatura extends Model
{
    use HasFactory;
    
    protected $primaryKey = 'id_planificar_asignatura';
    protected $fillable = [
        
        
        'nombre_planificar_asignatura',
        'id_siadi_asignatura',
        'id_paralelo',
        'turno_paralelo',
        'cupo_maximo_paralelo',
        'cupo_minimo_paralelo',
        'id_asignacion_docente',

        'id_siadi_convocatoria',
        'carga_horaria_planificar_asignartura',
        'estado_planificar_asignartura',
       
        
    ];
    public function siadi_asignatura(){
        return $this->belongsTo(SiadiAsignatura::class, 'id_siadi_asignatura');
    }
     
       public function siadi_paralelo(){
        return $this->belongsTo(SiadiParalelo::class, 'id_paralelo');
    }

    public function siadi_persona_asignada_docente(){
        return $this->belongsTo(tabla_persona::class, 'id_asignacion_docente');
    }
    public function siadi_nombramiento(){
        return $this->belongsTo(tabla_vista_nombramiento_general::class, 'id_asignacion_nombramiento');
    }
      

    public function siadi_convocatoria(){
        return $this->belongsTo(SiadiConvocatoria::class, 'id_siadi_convocatoria');
    }
        public function planifica_asignatura_asignatura(){
        return $this->hasMany(SiadiAsignatura::class, 'id_siadi_asignatura');
    }
        public function inscripcipciones(){
        return $this->hasMany(SiadiInscripcion::class, 'id_planificar_asignatura');
    }
}

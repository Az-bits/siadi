<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiPlanificarParalelo extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_planificar_paralelo';
    protected $fillable = [
        
        
        'id_planificar_asignatura',
        'id_paralelo',
        'turno_paralelo',
        'cupo_maximo_paralelo',
        'cupo_minimo_paralelo',
        'estado_paralelo',
       
        
    ];
    public function planificar_asignatura(){
        return $this->belongsTo(SiadiPlanificarAsignatura::class, 'id_planificar_asignatura');
    }
    public function paralelo(){
        return $this->belongsTo(SiadiParalelo::class, 'id_paralelo');
    }

        public function paralelo_planifica_asignatura(){
        return $this->hasMany(SiadiPlanificarAsignatura::class, 'id_planificar_asignatura');
    }
}

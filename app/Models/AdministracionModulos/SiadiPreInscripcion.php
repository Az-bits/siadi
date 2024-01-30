<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiPreInscripcion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_pre_inscripcion';
    protected $fillable = [
        
        
        'id_siadi_persona',
        'id_planificar_asignatura',
        'tipo_pago_inscripcion',
        'fecha_inscripcion',
        'observacion_inscripcion',
        'estado_inscripcion',
        'monto_deposito',
        'id_usuario',
     
       
       
        
    ];
    public function siadi_persona(){
        return $this->belongsTo(SiadiPersona::class, 'id_siadi_persona');
    }
    public function planificar_paralelo(){
        return $this->belongsTo(SiadiPlanificarParalelo::class, 'id_planificar_paralelo');
    }
    public function planificar_asignatura(){
        return $this->belongsTo(SiadiPlanificarAsignatura::class, 'id_planificar_asignatura');
    }
}

<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiPersona extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_siadi_persona';
    protected $fillable = [
        
        
        'ci_persona',
        'id_persona_base_upea',
        'expedido_persona',
        'estado_civil_persona',
        'paterno_persona',
        'materno_persona',
        'nombres_persona',
        'pais_persona',
        'id_pais',
        'genero_persona',
        'fecha_nacimiento_persona',
        'profesion_persona',
        'direccion_persona',
        'telefono_persona',
        'celular_persona',
        'email_persona',
        'estado_persona',
        'id_tipo_estudiante',
       
        
    ];
     public function persona_inscrita(){
        return $this->hasMany(SiadiInscripcion::class, 'id_siadi_persona');
    }
     public function persona_preinscrita(){
        return $this->hasMany(SiadiPreInscripcion::class, 'id_siadi_persona');
    }
     public function tipo_estudiante(){
        return $this->belongsTo(SiadiTipoEstudiante::class, 'id_tipo_estudiante');
    }

    public function pais(){
        return $this->belongsTo(Pais::class, 'id_pais');
    }

    
}


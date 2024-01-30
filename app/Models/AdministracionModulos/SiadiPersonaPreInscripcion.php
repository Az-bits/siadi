<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiPersonaPreInscripcion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_persona_pre_inscripcion';
    protected $fillable = [
        
        
        'ci_persona',
        'id_persona_base_upea',
        'expedido_persona',
        'estado_civil_persona',
        'paterno_persona',
        'materno_persona',
        'nombres_persona',
        'pais_persona',
        'genero_persona',
        'fecha_nacimiento_persona',
        'profesion_persona',
        'direccion_persona',
        'telefono_persona',
        'celular_persona',
        'email_persona',
        'estado_persona',
       
    ];


}

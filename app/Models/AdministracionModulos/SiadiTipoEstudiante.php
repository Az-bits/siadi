<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiTipoEstudiante extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_estudiante';
    protected $fillable = [
        
        
        'nombre_tipo_estudiante',
        'estado_tipo_estudiante',
        
       
        
    ];
}

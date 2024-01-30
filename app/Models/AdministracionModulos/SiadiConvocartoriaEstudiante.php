<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiConvocartoriaEstudiante extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_convocartoria_estudiante';
    protected $fillable = [
        
        
        'nombre_convocatoria_estudiante',
        'estado_convocatoria_estudiante',
        
       
        
    ];
   
}

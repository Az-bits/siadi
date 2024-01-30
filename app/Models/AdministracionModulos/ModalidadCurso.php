<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModalidadCurso extends Model
{
    use HasFactory;


    protected $table='siadi_modalidad_curso';
      protected $primaryKey = 'id_convocartoria_estudiante';
    protected $fillable = [
        'nombre_convocatoria_estudiante',
        'estado_convocatoria_estudiante',
          
               
    ];
}

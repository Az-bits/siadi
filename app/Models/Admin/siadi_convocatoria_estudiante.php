<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_convocatoria_estudiante extends Model
{
    use HasFactory;



    protected $table = 'siadi_convocatoria_estudiante';
    protected $primaryKey = 'id_siadi_convocatoria_estudiante';

    protected $fillable = [
        
        
        'convocatoria_siadi_convocatoria_estudiante',
        'certificado_siadi_convocatoria_estudiante',
        'estado_siadi_convocatoria_estudiante',
       
        
    ];

    
}

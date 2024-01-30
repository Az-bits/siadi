<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_tipo_estudiante extends Model
{
    use HasFactory;
    protected $table = 'siadi_tipo_estudiante';
    protected $primaryKey = 'id_siadi_tipo_estudiante';

    protected $fillable = [
        
        
        'tipo_siadi_tipo_estudiante',
        'estado_siadi_tipo_estudiante',
        
       
        
    ];


}

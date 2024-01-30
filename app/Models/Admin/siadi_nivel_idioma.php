<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_nivel_idioma extends Model
{
    use HasFactory;
    protected $table = 'siadi_nivel_idioma';
    protected $primaryKey = 'id_siadi_nivel_idioma';

    protected $fillable = [
        
        
        'nivel_siadi_nivel_idioma',
        'descripcion_siadi_nivel_idioma',
        'estado_siadi_nivel_idioma',
        
        
        
        
    ];
}

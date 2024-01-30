<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiNivelIdioma extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_nivel_idioma';
    protected $fillable = [
        
        
        'nombre_nivel_idioma',
        'descripcion_nivel_idioma',
        'estado_nivel_idioma',
       
        
    ];
}

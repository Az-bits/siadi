<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiIdioma extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_idioma';
    protected $fillable = [
        
        
        'nombre_idioma',
        'tipo_idioma',
        'sigla_codigo_idioma',
        'estado_idioma',
       'sigla_codigo_idioma'
       
        
    ];
    
      public function asignatura_idiom(){
        return $this->hasMany(SiadiAsignatura::class, 'id_idioma');
    }
}

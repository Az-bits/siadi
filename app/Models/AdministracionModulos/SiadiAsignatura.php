<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiAsignatura extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_siadi_asignatura';
    protected $fillable = [
        'id_idioma',
        'id_nivel_idioma',
        'sigla_asignatura',
        'estado_asignatura',        
    ];
    public function idioma(){
        return $this->belongsTo(SiadiIdioma::class, 'id_idioma');
    }
     public function siadi_asignatura_planificar(){
        return $this->hasMany(SiadiPlanificarAsignatura::class, 'id_siadi_asignatura');
    }
    public function nivel_idioma(){
        return $this->belongsTo(SiadiNivelIdioma::class, 'id_nivel_idioma');
    }
  public function asignatura_nivel_idioma(){
        return $this->hasMany(SiadiNivelIdioma::class, 'id_nivel_idioma');
    }
     public function asignatura_idioma(){
        return $this->hasMany(SiadiIdioma::class, 'id_idioma');
    }
}

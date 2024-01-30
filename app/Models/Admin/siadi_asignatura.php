<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_asignatura extends Model
{
    use HasFactory;

    protected $table = 'siadi_asignatura';
    protected $primaryKey = 'id_siadi_asignatura';

    protected $fillable = [
        
        
        'id_siadi_idioma',
        'sigla_codigo_siadi_idioma',
        'id_siadi_nivel_idioma',
        'fecha_siadi_asignatura',
        'id_usuario',
        'estado_siadi_asignatura',
        
        
    ];
    public function siadiidioma(){
        return $this->belongsTo(siadi_idioma::class, 'id_siadi_idioma');
    }
    public function siadinivelidioma(){
        return $this->belongsTo(siadi_nivel_idioma::class, 'id_siadi_nivel_idioma');
    }
    public function siadiRequisitoIdioma()
    {
        return $this->hasMany(siadi_requisito_idioma::class, 'id_siadi_asignatura');
    }
}

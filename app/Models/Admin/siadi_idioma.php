<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_idioma extends Model
{
    use HasFactory;

    protected $table = 'siadi_idioma';
    protected $primaryKey = 'id_siadi_idioma';

    protected $fillable = [
        
        
        'id_siadi_tipo_idioma',
        'idioma_siadi_idioma',
        'sigla_codigo_siadi_idioma	',
        'estado_siadi_idioma',
        
        
        
    ];
    public function siadi_tipo_idioma(){
        return $this->belongsTo(siadi_tipo_idioma::class, 'id_siadi_tipo_idioma');
    }
}

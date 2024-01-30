<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_tipo_idioma extends Model
{
    use HasFactory;
    protected $table = 'siadi_tipo_idioma';
    protected $primaryKey = 'id_siadi_tipo_idioma';

    protected $fillable = [
        
        
        'tipo_siadi_tipo_idioma',
        'estado_siadi_tipo_idioma',
       
       
        
    ];
}

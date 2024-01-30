<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VistaSede extends Model
{
    use HasFactory;

    protected $table = 'vista_sede';
    protected $primaryKey = 'id_sede';

    protected $fillable = [
        
        
        'nombre_sede',
        'direccion',
       
       
        
    ];
}

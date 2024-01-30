<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiCosto extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_costo';

    protected $fillable = [
        
        
        'deposito',
        'costo_siado_costo',
        'observacion_costo',
        'tipo_costo',
        'estado_costo',
       
        
    ];
    
}

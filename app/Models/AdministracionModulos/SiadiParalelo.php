<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiParalelo extends Model
{
    use HasFactory;

    protected $table = 'siadi_paralelos';
    protected $primaryKey = 'id_paralelo';
    protected $fillable = [
        
        
        'nombre_paralelo',
        'estado_paralelo',
        
       
        
    ];
}

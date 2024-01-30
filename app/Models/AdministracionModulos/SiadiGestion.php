<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiGestion extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_gestion';
    protected $fillable = [
        
        
        'nombre_gestion',
        'estado_gestion',
        
       
        
    ];
   
    
}

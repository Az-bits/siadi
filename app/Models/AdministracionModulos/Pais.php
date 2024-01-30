<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;
    protected $table='siadi_pais';
    protected $primaryKey = 'id_siadi_pais';

    protected $fillable = [
        
        
        'nombre_siadi_pais',
        'codigo_siadi_pais	',
        'nacionalidad_siadi_pais',
        // 'tipo_costo',
        // 'estado_costo',
       
        
    ]; 
    
}

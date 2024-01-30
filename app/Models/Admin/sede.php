<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sede extends Model
{
    use HasFactory;
    
    protected $table = 'sede';
    protected $primaryKey = 'id';

    protected $fillable = [
        
        
        'nombre',
        'direccion',
        'distancia_km',
        'estado',
        
    ];

    
}

<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_gestion extends Model
{
    use HasFactory;
    protected $table = 'siadi_gestion';
    protected $primaryKey = 'id_siadi_gestion';

    protected $fillable = [
        
        
        'anio_siadi_gestion',
        'estado_siadi_gestion',
        
       
        
    ];
}

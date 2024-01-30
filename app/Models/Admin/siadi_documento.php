<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_documento extends Model
{
    use HasFactory;
    protected $table = 'siadi_documento';
    protected $primaryKey = 'id_siadi_documento';

    protected $fillable = [
        
        
        'tipo_siadi_documento',
        'color_siadi_documento',
        'estado_siadi_documento',
       
        
    ];
}

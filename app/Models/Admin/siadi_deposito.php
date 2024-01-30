<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_deposito extends Model
{
    use HasFactory;
    protected $table = 'siadi_deposito';
    protected $primaryKey = 'id_siadi_deposito';

    protected $fillable = [
        
        
        'numero_siadi_deposito',
        'banco_siadi_deposito',
        'estado_siadi_deposito',
       
        
    ];
}

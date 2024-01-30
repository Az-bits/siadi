<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_costo extends Model
{
    use HasFactory;

    protected $table = 'siadi_costo';
    protected $primaryKey = 'id_siadi_costo';

    protected $fillable = [
        
        
        'id_siadi_deposito',
        'costo_siadi_costo',
        'tipo_siadi_costo',
        'observacion_siadi_costo',
        'estado_siadi_costo',
        
       
        
    ];
    public function siadi_depositos(){
        return $this->belongsTo(siadi_deposito::class, 'id_siadi_deposito');
    }

}

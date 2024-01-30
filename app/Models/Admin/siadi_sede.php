<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_sede extends Model
{
    use HasFactory;
    protected $table = 'siadi_sede';
    protected $primaryKey = 'sede_id';

    protected $fillable = [
        
        'sede_id',
        'estado_siadi_sede',
       
      
       
        
    ];
    public function sede_nombre(){
        return $this->hasOne(sede::class, 'id');
    }
}

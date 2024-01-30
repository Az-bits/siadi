<?php

namespace App\Models\base_upea;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;
     protected $connection = 'base_upea';
      protected $table = 'docente';

      
       public function persona(){
        return $this->belongsTo(tabla_persona::class, 'id');
    }
}

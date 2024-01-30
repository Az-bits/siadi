<?php

namespace App\Models\base_upea;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsignacionDocente extends Model
{
    use HasFactory;
     protected $connection = 'base_upea';
      protected $table = 'asignacion_docente';

      
       public function docentes(){
        return $this->belongsTo(Docente::class, 'docente_id');
    }
}

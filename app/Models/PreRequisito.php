<?php

namespace App\Models;

use App\Models\AdministracionModulos\SiadiAsignatura;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreRequisito extends Model
{
    use HasFactory;
      protected $primaryKey = 'prerequisito_id';

     protected $fillable = [
        
        
        'id_prerequisito_asignatura',
        'id_asignatura',
       
       
        
    ];
        public function asignaturapre(){
        return $this->belongsTo(SiadiAsignatura::class, 'id_prerequisito_asignatura');
    }
        public function asignatura(){
        return $this->belongsTo(SiadiAsignatura::class, 'id_asignatura');
    }


}

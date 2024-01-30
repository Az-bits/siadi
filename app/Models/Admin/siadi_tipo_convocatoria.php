<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_tipo_convocatoria extends Model
{
    use HasFactory;
    protected $table = 'siadi_tipo_convocatoria';
    protected $primaryKey = 'id_siadi_tipo_convocatoria';

    protected $fillable = [
        
        
        'id_siadi_tipo_estudiante',
        'id_siadi_convocatoria_estudiante',
        'id_siadi_costo',
        'estado_siadi_tipo_convocatoria',
       
       
        
    ];
    
    public function siadi_tipo_estudiante(){
        return $this->belongsTo(siadi_tipo_estudiante::class, 'id_siadi_tipo_estudiante');
    }
    public function siadi_convocatoria_estudiante(){
        return $this->belongsTo(siadi_convocatoria_estudiante::class, 'id_siadi_convocatoria_estudiante');
    }
    public function siadi_costos(){
        return $this->belongsTo(siadi_costo::class, 'id_siadi_costo');
    }
}

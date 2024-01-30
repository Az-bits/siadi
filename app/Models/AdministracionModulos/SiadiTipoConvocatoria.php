<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiTipoConvocatoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_tipo_convocatoria';
    protected $fillable = [
        
        
        'id_tipo_estudiante',
        'id_convocartoria_estudiante',
        'id_costo',
        'estado_tipo_convocatoria',
        
       
        
    ];
    public function tipo_estudiante(){
        return $this->belongsTo(SiadiTipoEstudiante::class, 'id_tipo_estudiante');
    }
    public function convocatoria_estudiante(){
        return $this->belongsTo(SiadiConvocartoriaEstudiante::class, 'id_convocartoria_estudiante');
    }
    public function costo(){
        return $this->belongsTo(SiadiCosto::class, 'id_costo');
    }
}

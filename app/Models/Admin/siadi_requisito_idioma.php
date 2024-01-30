<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_requisito_idioma extends Model
{
    use HasFactory;

    protected $table = 'siadi_requisito_idioma';
    protected $primaryKey = 'id_siadi_requisito_idioma';
    public $timestamps = false;
    protected $fillable = [
        
        
        
        'id_siadi_convocatoria',
        'id_siadi_asignatura',
        'estado_siadi_requisito_idioma',
       
        
       
        
    ];
    public function siadiconvocatoria(){
        return $this->belongsTo(siadi_convocatoria::class, 'id_siadi_convocatoria');
    }
    public function siadi_asignatura(){
        return $this->belongsTo(siadi_asignatura::class, 'id_siadi_asignatura');
    }
}

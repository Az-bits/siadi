<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siadi_convocatoria extends Model
{
    use HasFactory;



    protected $table = 'siadi_convocatoria';
    protected $primaryKey = 'id_siadi_convocatoria';
    public $timestamps = false;
    protected $fillable = [
        
        
        'tipo_convocatoria_sede_id_id_gestion_periodo',
        'id_siadi_gestion',
        'periodo_siadi_convocatoria',
        'id_siadi_tipo_convocatoria',
        'sede_id',
        'id_siadi_documento',
        'texto_descripcion_siadi_convocatoria',
        'texto_observacion_siadi_convocatoria',
        'fecha_inicio_siadi_convocatoria',
        'fecha_fin_siadi_convocatoria',
        'fecha_siadi_convocatoria',
        'id_usuario',
        'estado_siadi_convocatoria',
       
        
    ];
    public function gestion(){
        return $this->belongsTo(siadi_gestion::class, 'id_siadi_gestion');
    }
    public function siadi_tipo_convocatoria(){
        return $this->belongsTo(siadi_tipo_convocatoria::class, 'id_siadi_tipo_convocatoria');
    }
    public function siadi_sedes(){
        return $this->belongsTo(siadi_sede::class, 'sede_id');
    }
    public function siadi_documentos(){
        return $this->belongsTo(siadi_documento::class, 'id_siadi_documento');
    }
    public function user(){
        return $this->belongsTo(user::class, 'id');
    }

}

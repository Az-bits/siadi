<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiConvocatoria extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_siadi_convocatoria';
    protected $fillable = [
        'nombre_convocatoria',
        'id_gestion',
        'periodo',
        'id_tipo_convocatoria',
        'sede',
        'descripcion_convocatoria',
        'fecha_inicio',
        'fecha_fin',
        'estado_convocatoria',
    ];
    public function tipo_convocatoria(){
        return $this->belongsTo(SiadiTipoConvocatoria::class, 'id_tipo_convocatoria');
    }
    public function gestion(){
        return $this->belongsTo(SiadiGestion::class, 'id_gestion');
    }
    public function siadi_sede() {
        return $this->belongsTo(SiadiSede::class, 'id_siadi_sede');
    }
    public function modalidad() {
        return $this->belongsTo(ModalidadCurso::class, 'id_modalidad_curso');
    }
    public function convocatoria_costo() {
        return $this->belongsTo(SiadiCosto::class, 'id_costo');
    }
}

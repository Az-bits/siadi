<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiadiNota extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_nota';
    protected $fillable = [
        
        
        'id_inscripcion',
        'primera_nota',
        'segunda_nota',
        'tercera_nota',
        'segundo_turno_nota',
        'final_nota',
        'nro_folio_nota',
        'nro_carpeta_nota',
        'observacion_nota',
        'nota_convalidacion',
        'observaciones_detalle',
        'id_usuario',
       
        
    ];
    public function inscripcion(){
        return $this->hasOne(SiadiInscripcion::class, 'id_inscripcion');
    }
    public function certificados(){
        return $this->hasOne(Certificados::class, 'id_nota');
    }

    public function certificados_provisional(){
        return $this->hasOne(CertificadosProvisional::class, 'id_nota');
    }
    
}

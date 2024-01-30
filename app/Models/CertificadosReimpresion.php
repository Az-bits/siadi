<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\AdministracionModulos\Certificados;

class CertificadosReimpresion extends Model
{
    use HasFactory;
    #comentario

    public function certificado()
    {
        return $this->belongsTo(Certificados::class, 'certificado_id');
    }
}

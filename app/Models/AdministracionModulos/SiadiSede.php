<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\base_upea\tabla_sede;

class SiadiSede extends Model
{
    use HasFactory;

    protected $table = 'siadi_sede';
    protected $primaryKey = 'id_siadi_sede';

    protected $fillable = [
        'id_sede',
        'direccion',
    ];

    public function siadi_convocatorias(){
        return $this->hasMany(SiadiConvocatoria::class, 'id_siadi_sede');
    }

    public function sede_upea(){
        return $this->belongsTo(tabla_sede::class, 'id_sede');
    }
}

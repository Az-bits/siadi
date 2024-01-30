<?php

namespace App\Models\base_upea;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabla_vista_nombramiento_general extends Model
{
    use HasFactory;
    protected $connection = 'base_upea';
    protected $table = 'vista_nombramiento_general';
    protected $primaryKey = 'codex'; 

    /* attributes
    	* codex
        * id_persona,
        * gestion # gestion literal
        * periodo
        * carrera_id = 13
        * carrera = LINGÜÍSTICA E IDIOMAS # literal
        * item_nombramiento = %IDI%
        * grado_nombramiento
        * nombre
        * paterno
        * materno
        * ci
        * sede # literal
       	* nombre_asignatura
       	* sigla_asignatura
     */

}

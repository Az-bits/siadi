<?php

namespace App\Models\base_upea;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

# se muestran de la gestion actual
class tabla_vista_asignacion_control_docente_actua extends Model
{
    use HasFactory;
    protected $connection = 'base_upea'; 

    /* attributes
        * asignacion_id,
        * id_persona,
        * ci
        * inicial sede
        * carrera_id
        * carrera
        * sede
        * carsed_id
        * grado_nombramiento
        * item_nombramiento 
     */

    protected $table = 'vista_asignacion_control_docente_actua';
}

<?php

namespace App\Models\base_upea;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabla_vista_mae_matriculados extends Model
{
    use HasFactory;
    protected $connection = 'base_upea';
    #protected $primaryKey = 'id_estudiante'; 

    /* attributes
        * id,
        * tipo
        * inicial sede
        * nombre
        * direccion
     */

    protected $table = 'vista_mae_matriculados';
}

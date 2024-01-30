<?php

namespace App\Models\base_upea;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabla_sede extends Model
{
    use HasFactory;
    protected $connection = 'base_upea';

    /* attributes
        * id,
        * tipo
        * inicial sede
        * nombre
        * direccion
     */

    protected $table = 'sede';
}

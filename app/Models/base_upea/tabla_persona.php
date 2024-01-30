<?php

namespace App\Models\base_upea;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabla_persona extends Model
{
    use HasFactory;
    protected $connection = 'base_upea';

    protected $table = 'persona';

protected $fillable = ['ci', 'nombre', 'paterno','materno','email'];
}

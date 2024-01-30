<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Publicaciones extends Model
{
    use HasFactory;
    protected $table ='publicaciones';
    protected $primaryKey = 'publicaciones_id';
    protected $fillable = [
        'publicaciones_titulo',
        'publicaciones_descripcion',
        'publicaciones_estado',
        'publicaciones_imagen',        
        'publicaciones_imagen_url',        
        'publicaciones_tipo',        
        'user_id',        
    ];

    public function usuario(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

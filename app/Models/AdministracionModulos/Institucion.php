<?php

namespace App\Models\AdministracionModulos;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institucion extends Model
{


    use HasFactory;


protected $table='institucions';
 protected $primaryKey = 'intitucion_id';
    protected $fillable = [
        'intitucion_nombre',
        'intitucion_titulo',
        'intitucion_subtitulo',
        'intitucion_mision',        
        'intitucion_vision',        
        'intitucion_historia',        
        'intitucion_url_instagram',        
        'intitucion_url_tiktok',        
        'intitucion_url_facebook',        
        'intitucion_url_youtube',        
        'intitucion_url_twitter',        
        'intitucion_url_telefono',        
        'intitucion_url_logo',        
        'intitucion_url_banner1',        
        'intitucion_url_banner2',        
        'intitucion_rector',        
        'intitucion_vicerector',        
        'intitucion_jefe',        
    ];


}

<?php

namespace Database\Seeders;

use App\Models\AdministracionModulos\SiadiNivelIdioma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelesIdiomas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiadiNivelIdioma::create([
'nombre_nivel_idioma'=>'1.1',
'descripcion_nivel_idioma'=>'BÁSICO'
        ]);
        SiadiNivelIdioma::create([
'nombre_nivel_idioma'=>'1.2',
'descripcion_nivel_idioma'=>'BÁSICO'
        ]);
        SiadiNivelIdioma::create([
'nombre_nivel_idioma'=>'2.1',
'descripcion_nivel_idioma'=>'INTERMEDIO'
        ]);
        SiadiNivelIdioma::create([
'nombre_nivel_idioma'=>'2.2',
'descripcion_nivel_idioma'=>'INTERMEDIO'
        ]);
        SiadiNivelIdioma::create([
'nombre_nivel_idioma'=>'3.1',
'descripcion_nivel_idioma'=>'AVANZADO'
        ]);
        SiadiNivelIdioma::create([
'nombre_nivel_idioma'=>'3.2',
'descripcion_nivel_idioma'=>'AVANZADO'
        ]);
       
    }
}

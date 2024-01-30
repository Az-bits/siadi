<?php

namespace Database\Seeders;

use App\Models\AdministracionModulos\SiadiIdioma;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdiomaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiadiIdioma::create([
            'nombre_idioma'  => 'AYMARA',
            'sigla_codigo_idioma'  => 'LIN-101',
            'tipo_idioma'  => 'NATIVO',
           
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'INGLÉS',
            'sigla_codigo_idioma'  => 'LIN-201',
            'tipo_idioma'  => 'EXTRANJERO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'CASTELLANO',
            'sigla_codigo_idioma'  => 'LIN-801',
            'tipo_idioma'  => 'EXTRANJERO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'QUECHUA',
            'sigla_codigo_idioma'  => 'LIN-301',
            'tipo_idioma'  => 'NATIVO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'CHINO MANDARÍN',
            'sigla_codigo_idioma'  => 'LIN-401',
            'tipo_idioma'  => 'EXTRANJERO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'PORTUGUÉS',
            'sigla_codigo_idioma'  => 'LIN-501',
            'tipo_idioma'  => 'EXTRANJERO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'FRANCÉS',
            'sigla_codigo_idioma'  => 'LIN-601',
            'tipo_idioma'  => 'EXTRANJERO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'ITALIANO',
            'sigla_codigo_idioma'  => 'LIN-701',
            'tipo_idioma'  => 'EXTRANJERO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'ALEMÁN',
            'sigla_codigo_idioma'  => 'LIN-901',
            'tipo_idioma'  => 'EXTRANJERO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'GUARANI',
            'sigla_codigo_idioma'  => 'LIN-1001',
            'tipo_idioma'  => 'NATIVO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'URU PUKINA',
            'sigla_codigo_idioma'  => 'LIN-1101',
            'tipo_idioma'  => 'NATIVO',
        ]);
        SiadiIdioma::create([
            'nombre_idioma'  => 'RUSO',
            'sigla_codigo_idioma'  => 'LIN-1001',
            'tipo_idioma'  => 'EXTRANJERO',
        ]);
    }
}

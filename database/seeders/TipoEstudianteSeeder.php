<?php

namespace Database\Seeders;

use App\Models\AdministracionModulos\SiadiTipoEstudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoEstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiadiTipoEstudiante::create([
            'nombre_tipo_estudiante'  => 'UNIVERSITARIO U.P.E.A.',
        ]);
        SiadiTipoEstudiante::create([
            'nombre_tipo_estudiante'  => 'EGRESADO U.P.E.A.',
        ]);
        SiadiTipoEstudiante::create([
            'nombre_tipo_estudiante'  => 'DOCENTE U.P.E.A.',
        ]);
        SiadiTipoEstudiante::create([
            'nombre_tipo_estudiante'  => 'ADMINISTRATIVO U.P.E.A.',
        ]);
        SiadiTipoEstudiante::create([
            'nombre_tipo_estudiante'  => 'DOCENTE ADMINISTRATIVO U.P.E.A.',
        ]);
        SiadiTipoEstudiante::create([
            'nombre_tipo_estudiante'  => 'EXTERNO',
        ]);
        SiadiTipoEstudiante::create([
            'nombre_tipo_estudiante'  => 'CONVENIO U.P.E.A',
        ]);
    }
}

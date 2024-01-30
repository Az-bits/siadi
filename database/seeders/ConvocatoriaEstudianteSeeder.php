<?php

namespace Database\Seeders;

use App\Models\AdministracionModulos\SiadiConvocartoriaEstudiante;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConvocatoriaEstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'CURSO REGULAR',
        ]);
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'PRUEBA DE EXAMEN DE SUFICIENCIA',
        ]);
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'CONVALIDACIÓN DEPARTAMENTO IDIOMAS',
        ]);
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'ACTUALIZACION DE CERTIFICADO',
        ]);
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'MIGRACIÓN',
        ]);
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'HOMOLOGACIÓN DEPARTAMENTO IDIOMAS',
        ]);
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'CONVALIDACIÓN LINGUISTICA E IDIOMAS',
        ]);
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'HOMOLOGACIÓN LINGUISTICA E IDIOMAS',
        ]);
        SiadiConvocartoriaEstudiante::create([
            'nombre_convocatoria_estudiante'  => 'CURSO REGULAR(T.G.N.)',
        ]);
    }
}

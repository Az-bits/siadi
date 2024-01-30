<?php

namespace Database\Seeders;

use App\Models\AdministracionModulos\SiadiGestion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class GestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
        SiadiGestion::create([
            'nombre_gestion'  => '2018',
           
        ]);
        SiadiGestion::create([
            'nombre_gestion'  => '2019',
           
        ]);
        SiadiGestion::create([
            'nombre_gestion'  => '2020',
           
        ]);
        SiadiGestion::create([
            'nombre_gestion'  => '2021',
           
        ]);
        SiadiGestion::create([
            'nombre_gestion'  => '2022',
           
        ]);
        SiadiGestion::create([
            'nombre_gestion'  => '2023',
           
        ]);
        
    }
}

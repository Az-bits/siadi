<?php

namespace Database\Seeders;

use App\Models\AdministracionModulos\SiadiCosto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CostoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SiadiCosto::create([
            'deposito'  => '10000004713083 - BANCO UNION S.A.'  , 
            'costo_siado_costo'  => 0  , 
            'tipo_costo'  => 'GRATUITO' , 
            'observacion_costo'  => 'POR RESOLUCION DE HCU 03/2009' , 

        ]);
        SiadiCosto::create([
            'deposito'  => '10000004713083 - BANCO UNION S.A.'  , 
            'costo_siado_costo'  => 250  , 
            'tipo_costo'  => 'EXAMEN' , 
            'observacion_costo'  => 'POR RESOLUCION DE HCU 03/2009' , 

        ]);
        SiadiCosto::create([
            'deposito'  => '10000004713083 - BANCO UNION S.A.'  , 
            'costo_siado_costo'  => 150  , 
            'tipo_costo'  => 'CONVALIDACIÓN DEPARTAMENTO DE IDIOMAS' , 
            'observacion_costo'  => 'POR RESOLUCION DE HCU 03/2009' , 

        ]);
        SiadiCosto::create([
            'deposito'  => '10000004713083 - BANCO UNION S.A.'  , 
            'costo_siado_costo'  => 800  , 
            'tipo_costo'  => 'AUTOFINANCIADO' , 
            'observacion_costo'  => 'POR RESOLUCION DE HCU 03/2009' , 

        ]);
        SiadiCosto::create([
            'deposito'  => '10000004713083 - BANCO UNION S.A.'  , 
            'costo_siado_costo'  => 400  , 
            'tipo_costo'  => 'CONVENIO' , 
            'observacion_costo'  => 'POR RESOLUCION DE HCU 03/2009' , 

        ]);
        SiadiCosto::create([
            'deposito'  => '10000004713083 - BANCO UNION S.A.'  , 
            'costo_siado_costo'  => 250  , 
            'tipo_costo'  => 'HOMOLOGACIÓN DEPARTAMENTO DE IDIOMAS' , 
            'observacion_costo'  => 'POR RESOLUCION DE HCU 03/2009' , 

        ]);
        SiadiCosto::create([
            'deposito'  => '10000004713083 - BANCO UNION S.A.'  , 
            'costo_siado_costo'  => 0  , 
            'tipo_costo'  => 'CONVALIDACIÓN LINGUISTICA E IDIOMAS' , 
            'observacion_costo'  => 'POR RESOLUCION DE HCU 03/2009' , 

        ]);
        SiadiCosto::create([
            'deposito'  => '10000004713083 - BANCO UNION S.A.'  , 
            'costo_siado_costo'  => 150  , 
            'tipo_costo'  => 'GRATUITO' , 
            'observacion_costo'  => 'HOMOLOGACIÓN LINGUISTICA E IDIOMAS' , 

        ]);

    }
}

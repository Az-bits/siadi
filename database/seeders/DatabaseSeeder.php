<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(GestionSeeder::class);
        $this->call(TipoEstudianteSeeder::class);
        $this->call(IdiomaSeeder::class);
        $this->call(ConvocatoriaEstudianteSeeder::class);
        $this->call(CostoSeeder::class);
        $this->call(NivelesIdiomas::class);
    }
}

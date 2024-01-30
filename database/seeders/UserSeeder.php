<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',
            'ci'  => '12121',

'ci'  => '12121',
            'email' => 'navi@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Admin');
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',
'ci'  => '12121',

            'email' => 'navi2@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Auxiliar');
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',
'ci'  => '12121',

            'email' => 'navi3@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Auxiliar');
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',
            'ci'  => '12121',
'ci'  => '12121',

            'email' => 'navi4@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Auxiliar');
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',
'ci'  => '12121',

            'email' => 'navi5@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Auxiliar');
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',

'ci'  => '12121',
            'email' => 'navi6@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Auxiliar');
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',

'ci'  => '12121',
            'email' => 'navi7@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Auxiliar');
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',

'ci'  => '12121',
            'email' => 'navi8@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Auxiliar');
        User::create([
            'name'  => 'navito',
            'paterno'  => 't',
            'materno'  => 'v',
'ci'  => '12121',

            'email' => 'navi9@upea.bo',
            'password' => bcrypt('navi1234')
        ])->assignRole('Auxiliar');
        User::create([
            'name'  => 'Gary',
            'paterno'  => 'Apaza',
            'materno'  => 'Mamani',
'ci'  => '12121',

            'email' => 'gary7apaza@gmail.com',
            'password' => bcrypt('gary1234')
        ])->assignRole('Admin');
    }
}

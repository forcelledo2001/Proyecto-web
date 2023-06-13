<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Equipo;
use App\Models\Deportista;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // creando usuarios
        User::create([
            'name' => 'Alejandro Forcelledo',
            'email' => 'alejandrofm@nauta.com.cu',
            'password' => Hash::make('Ale.1234'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Raidelic Fabregas',
            'email' => 'raidelicfm@estudiantes.uci.cu',
            'password' => Hash::make('12345678'),
            'role' => 'admin'
        ]);
        User::create([
            'name' => 'Carlos Javier',
            'email' => 'carlosjah@estudiantes.uci.cu',
            'password' => Hash::make('12345678'),
            'role' => 'user'
        ]);
        User::create([
            'name' => 'Odlanyer Martinez',
            'email' => 'odlanyerer@estudiantes.uci.cu',
            'password' => Hash::make('12345678'),
            'role' => 'user'
        ]);


        // creando equipos y deportistas
        $equipos = Equipo::factory(6)->create();

        foreach($equipos as $equipo){
            Deportista::factory(rand(1, 4))->create([
                'equipo_id' => $equipo->id
            ]);
        }
    }
}

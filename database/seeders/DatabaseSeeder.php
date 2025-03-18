<?php

namespace Database\Seeders;

use App\Models\Doctor;
use App\Models\Enfermera;
use App\Models\Horario;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use PhpParser\Comment\Doc;


class DatabaseSeeder extends Seeder
{

    public function run(): void
    {   

        $this->call([RoleSeeder::class,]);

        User::create([
            'name' => 'Administrador',
            'apellido' => 'Consuelo',
            'rut' => '12345678-9',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456789')
        ])->assignRole('administrador');

        User::create([
            'name' => 'Camila',
            'apellido' => 'Lopez',
            'rut' => '22222222-2',
            'email' => 'enfermera@admin.cl',
            'password' => Hash::make('123456789')
        ])->assignRole('enfermera');

        User::create([
            'name' => 'Luis',
            'apellido' => 'Rojas',
            'rut' => '44444444-4',
            'email' => 'doctor@admin.cl',
            'password' => Hash::make('123456789')
        ])->assignRole('doctor');


        User::create([
            'name' => 'Nicole',
            'apellido' => 'Bezares',
            'rut' => '88888888-8',
            'email' => 'nicoleBezares@admin.cl',
            'password' => Hash::make('123456789')
        ])->assignRole('rolDoble');

        $this->call([PacienteSeeder::class,]);

    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{

    public function run(): void
    {
        //seeder para los roles y permisos   admin, enfermera, doctores etc...
        $administrador = Role::create(['name'=>'administrador']);
        $enfermera = Role::create(['name'=>'enfermera']);
        $doctor = Role::create(['name'=>'doctor']);
        $rolDoble = Role::create(['name'=>'rolDoble']);
        $paciente = Role::create(['name'=>'paciente']);
        $usuario = Role::create(['name'=>'usuario']);

        
        Permission::create(['name' => 'admin.index']);

        //Rutas para el admin - usuarios        
        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.usuarios.store'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.usuarios.update'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.usuarios.confirmDelete'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$administrador]);

        //Rutas para el admin - configuraciones        
        Permission::create(['name' => 'admin.configuraciones.index'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.configuraciones.create'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.configuraciones.store'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.configuraciones.show'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.configuraciones.edit'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.configuraciones.update'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.configuraciones.confirmDelete'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.configuraciones.destroy'])->syncRoles([$administrador]);

        //Rutas para el admin - enfermeras  
        Permission::create(['name' => 'admin.enfermeras.index'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.enfermeras.create'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.enfermeras.store'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.enfermeras.show'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.enfermeras.edit'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.enfermeras.update'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.enfermeras.confirmDelete'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.enfermeras.destroy'])->syncRoles([$administrador]);

        //Rutas para el admin - enfermeras con rolDobles  
        Permission::create(['name' => 'admin.rolDobles.index'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.rolDobles.create'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.rolDobles.store'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.rolDobles.show'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.rolDobles.edit'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.rolDobles.update'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.rolDobles.confirmDelete'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.rolDobles.destroy'])->syncRoles([$administrador]);

        //Rutas para el admin-pacientes
        Permission::create(['name' => 'admin.pacientes.index'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.pacientes.create'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.pacientes.store'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.pacientes.show'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.pacientes.edit'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.pacientes.update'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.pacientes.confirmDelete'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.pacientes.destroy'])->syncRoles([$administrador]);

        //Rutas para el admin - Box
        Permission::create(['name' => 'admin.boxes.index'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.boxes.create'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.boxes.store'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.boxes.show'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.boxes.edit'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.boxes.update'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.boxes.confirmDelete'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.boxes.destroy'])->syncRoles([$administrador, $enfermera, $rolDoble]);

        //Rutas para el admin - doctor 
        Permission::create(['name' => 'admin.doctores.index'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.create'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.store'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.show'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.edit'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.update'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.confirmDelete'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.destroy'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.reportes'])->syncRoles([$administrador]);
        Permission::create(['name' => 'admin.doctores.pdf'])->syncRoles([$administrador]);

        //Rutas para el admin - horarios
        Permission::create(['name' => 'admin.horarios.index'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.horarios.create'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.horarios.store'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.horarios.show'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.horarios.edit'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.horarios.update'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.horarios.confirmDelete'])->syncRoles([$administrador, $enfermera, $rolDoble]);
        Permission::create(['name' => 'admin.horarios.destroy'])->syncRoles([$administrador, $enfermera, $rolDoble]);

        //ajax
        Permission::create(['name' => 'admin.horarios.cargar_datos_boxes'])->syncRoles([$administrador]);
        $this->call([PacienteSeeder::class,]);

        //Rutas para el usuario
        //ajax

        Permission::create(['name' => 'cargar_datos_boxes'])->syncRoles([$administrador, $rolDoble]);
        Permission::create(['name' => 'cargar_fullCalendar'])->syncRoles([$administrador, $enfermera, $doctor]);
        Permission::create(['name' => 'ver_reservas'])->syncRoles([$administrador, $doctor]);
        Permission::create(['name' => 'admin.eventos.create'])->syncRoles([$administrador, $usuario]);
        Permission::create(['name' => 'admin.eventos.destroy'])->syncRoles([$administrador, $usuario]); 
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();

            $table->string('rut', length:100)->unique();
            $table->string('nombre', length:100);
            $table->string('apellido', length:100); 
            $table->string('fecha_nacimiento', length:100);
            $table->string('genero', length:10);
            $table->string('celular', length:20);
            $table->string('correo', length:100)->unique();
            $table->string('direccion', length:255);
            $table->string('comuna', length:255);            
            $table->string('observaciones', length:255)->nullable();

            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
};

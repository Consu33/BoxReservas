<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('rol_dobles', function (Blueprint $table) {
            $table->id();
            
            $table->string('rut', length:100)->unique();
            $table->string('nombre', length:100);
            $table->string('apellido', length:100);  
            $table->string('profesion', length:100); 
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rol_dobles');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('boxes', function (Blueprint $table) {
            $table->id();

            $table->string('numero');
            $table->string('recinto');
            $table->string('especialidades')->nullable();
            $table->string('piso');
            $table->string('torre');             

            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('boxes');
    }
};

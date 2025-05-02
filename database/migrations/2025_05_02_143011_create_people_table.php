<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre
            $table->string('last_name'); // Apellido
            $table->string('email')->unique();
            $table->string('dni')->unique();  // Documento Nacional de Identidad
            $table->string('state'); // Estado
            $table->string('city'); // Ciudad
            $table->string('parish'); // Parroquia
            $table->string('phone'); // Teléfono
            $table->string('voting_center'); // Centro de votaciones
            $table->string('address'); // Dirección
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('people');
    }
};

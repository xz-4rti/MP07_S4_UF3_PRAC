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
        // Crea la tabla 'usuaris' en la base de datos
        Schema::create('usuaris', function (Blueprint $table) {
            // Crea una columna 'id' como clave primaria autoincremental
            $table->id();
            // Crea una columna 'nom' para almacenar el nombre del usuario
            $table->string('nom');
            // Crea una columna 'email' para almacenar el correo electrónico, debe ser único
            $table->string('email')->unique();
            // Crea una columna 'edat' para almacenar la edad del usuario
            $table->integer('edat');
            // Crea columnas 'created_at' y 'updated_at' para gestionar las marcas de tiempo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuaris');
    }
};

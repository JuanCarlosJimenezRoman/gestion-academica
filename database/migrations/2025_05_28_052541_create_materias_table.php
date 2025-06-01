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
        Schema::create('materias', function (Blueprint $table) {
            $table->string('clave_materia', 10)->primary();
            $table->string('nombre', 100);
            $table->string('nombre_abreviado', 20)->nullable();
            $table->tinyInteger('nivel')->nullable();
            $table->enum('tipo', ['Base', 'Optativa', 'Especialidad', 'Extra'])->default('Base');
            $table->string('area_academica', 50)->nullable();
            $table->timestamps();

            $table->index('nombre');
            $table->index('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};

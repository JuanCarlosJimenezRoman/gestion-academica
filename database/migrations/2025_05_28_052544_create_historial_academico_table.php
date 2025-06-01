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
        Schema::create('historial_academico', function (Blueprint $table) {
            $table->id('id_historial');
            $table->string('num_control', 10);
            $table->string('clave_materia', 10);
            $table->decimal('calificacion', 4, 2)->nullable();
            $table->enum('tipo_eval', ['Ordinario', 'Extraordinario', 'Especial'])->default('Ordinario');
            $table->date('fecha_eval')->nullable();
            $table->foreignId('id_periodo')->constrained('periodos', 'id_periodo');
            $table->timestamps();

            $table->foreign('num_control')
                  ->references('num_control')
                  ->on('estudiantes')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreign('clave_materia')
                  ->references('clave_materia')
                  ->on('materias')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();

            $table->unique(['num_control', 'clave_materia', 'id_periodo']);
            $table->index('calificacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historial_academico');
    }
};

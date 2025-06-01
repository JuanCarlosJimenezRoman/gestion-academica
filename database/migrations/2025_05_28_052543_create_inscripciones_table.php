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
        Schema::create('inscripciones', function (Blueprint $table) {
            $table->id('id_inscripcion');
            $table->string('num_control', 10);
            $table->foreignId('id_grupo')->constrained('grupos', 'id_grupo');
            $table->timestamp('fecha_inscripcion')->useCurrent();
            $table->enum('estatus', ['Inscrito', 'Baja', 'Finalizado'])->default('Inscrito');
            $table->timestamps();

            $table->foreign('num_control')
                  ->references('num_control')
                  ->on('estudiantes')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->unique(['num_control', 'id_grupo']);
            $table->index('estatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inscripciones');
    }
};

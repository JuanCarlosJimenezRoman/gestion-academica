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
        Schema::create('asistencias_estudiantes', function (Blueprint $table) {
            $table->id();
            $table->string('num_control', 10);
            $table->foreignId('id_grupo')->constrained('grupos', 'id_grupo');
            $table->date('fecha');
            $table->boolean('presente')->default(true);
            $table->timestamps();

            $table->foreign('num_control')
                  ->references('num_control')
                  ->on('estudiantes')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->unique(['num_control', 'id_grupo', 'fecha']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias_estudiantes');
    }
};

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
        Schema::create('asistencias_docentes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_docente')->constrained('docentes', 'id_docente');
            $table->foreignId('id_grupo')->constrained('grupos', 'id_grupo');
            $table->date('fecha');
            $table->boolean('presente')->default(true);
            $table->timestamps();

            $table->unique(['id_docente', 'id_grupo', 'fecha']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistencias_docentes');
    }
};

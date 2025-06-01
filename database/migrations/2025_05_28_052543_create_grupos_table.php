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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id('id_grupo');
            $table->string('clave_grupo', 20)->unique();
            $table->string('clave_materia', 10);
            $table->foreignId('id_docente')->constrained('docentes', 'id_docente');
            $table->foreignId('id_periodo')->constrained('periodos', 'id_periodo');
            $table->foreignId('id_aula')->nullable()->constrained('aulas', 'id_aula')->onDelete('set null');
            $table->string('horario', 100);
            $table->integer('capacidad_max');
            $table->timestamps();

            $table->foreign('clave_materia')
                  ->references('clave_materia')
                  ->on('materias')
                  ->restrictOnDelete()
                  ->cascadeOnUpdate();

            $table->index('clave_grupo');
            $table->index('id_periodo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};

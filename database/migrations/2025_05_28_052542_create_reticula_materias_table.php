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
        Schema::create('reticula_materias', function (Blueprint $table) {
            $table->foreignId('id_reticula')->constrained('reticulas', 'id_reticula')->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('clave_materia', 10);

            $table->primary(['id_reticula', 'clave_materia']);

            $table->foreign('clave_materia')
                  ->references('clave_materia')
                  ->on('materias')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reticula_materias');
    }
};

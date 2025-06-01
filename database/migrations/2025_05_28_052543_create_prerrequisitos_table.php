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
        Schema::create('prerrequisitos', function (Blueprint $table) {
            $table->string('clave_materia', 10);
            $table->string('clave_materia_requisito', 10);

            $table->primary(['clave_materia', 'clave_materia_requisito']);

            $table->foreign('clave_materia')
                  ->references('clave_materia')
                  ->on('materias')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();

            $table->foreign('clave_materia_requisito')
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
        Schema::dropIfExists('prerrequisitos');
    }
};

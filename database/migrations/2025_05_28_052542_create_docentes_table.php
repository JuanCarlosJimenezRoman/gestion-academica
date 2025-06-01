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
        Schema::create('docentes', function (Blueprint $table) {
            $table->id('id_docente');
            $table->string('nombre', 100);
            $table->string('rfc', 13)->unique();
            $table->string('correo', 100)->nullable();
            $table->string('departamento', 50)->nullable();
            $table->string('especialidad', 100)->nullable();
            $table->foreignId('id_departamento')->nullable()->constrained('departamentos', 'id_departamento')->onDelete('set null');
            $table->enum('estatus', ['Activo', 'Inactivo'])->default('Activo');
            $table->timestamps();

            $table->index('nombre');
            $table->index('estatus');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docentes');
    }
};

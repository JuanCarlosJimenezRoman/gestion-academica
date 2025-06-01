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
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->string('num_control', 10)->primary();
            $table->string('nombre', 100);
            $table->char('curp', 18)->unique();
            $table->string('correo', 100)->unique();
            $table->foreignId('id_reticula')->nullable()->constrained('reticulas', 'id_reticula')->onDelete('set null');
            $table->enum('estatus', ['Regular', 'Baja temporal', 'Egresado'])->default('Regular');
            $table->date('fecha_ingreso')->nullable();
            $table->date('fecha_egreso')->nullable();
            $table->decimal('promedio', 4, 2)->nullable();
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
        Schema::dropIfExists('estudiantes');
    }
};

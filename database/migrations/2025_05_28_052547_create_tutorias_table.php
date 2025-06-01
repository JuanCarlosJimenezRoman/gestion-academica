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
        Schema::create('tutorias', function (Blueprint $table) {
            $table->id('id_tutoria');
            $table->foreignId('id_docente')->constrained('docentes', 'id_docente');
            $table->string('num_control', 10);
            $table->date('fecha');
            $table->text('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('num_control')
                  ->references('num_control')
                  ->on('estudiantes')
                  ->cascadeOnUpdate()
                  ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutorias');
    }
};

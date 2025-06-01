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
        Schema::create('avisos', function (Blueprint $table) {
            $table->id('id_aviso');
            $table->string('titulo', 100);
            $table->text('mensaje');
            $table->timestamp('fecha')->useCurrent();
            $table->enum('dirigido_a', ['Todos','Estudiantes','Docentes','Administrador','Desarrollador'])->default('Todos');
            $table->foreignId('id_usuario')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avisos');
    }
};

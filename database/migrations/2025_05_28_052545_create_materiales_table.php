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
        Schema::create('materiales', function (Blueprint $table) {
            $table->id('id_material');
            $table->foreignId('id_grupo')->constrained('grupos', 'id_grupo');
            $table->string('titulo', 100);
            $table->text('descripcion')->nullable();
            $table->string('url_recurso', 255);
            $table->timestamp('fecha_publicacion')->useCurrent();
            $table->foreignId('id_docente')->nullable()->constrained('docentes', 'id_docente')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materiales');
    }
};

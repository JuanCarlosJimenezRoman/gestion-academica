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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->enum('role', ['Estudiante', 'Docente', 'Administrador', 'Desarrollador'])->default('Estudiante');
            $table->foreignId('id_docente')->nullable()->constrained('docentes', 'id_docente')->onDelete('set null');
            $table->string('num_control', 10)->nullable();
            $table->timestamps();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('remember_token', 100)->nullable();
            $table->string('foto', 255)->nullable();
            $table->string('telefono', 15)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('codigo_postal', 10)->nullable();
            $table->string('estado', 50)->nullable();
            $table->string('ciudad', 50)->nullable();
            $table->string('pais', 50)->nullable();
            $table->string('curp', 18)->nullable();
            $table->string('rfc', 13)->nullable();
            $table->string('estatus', 20)->default('Activo');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('genero', 10)->nullable();

            $table->foreign('num_control')->references('num_control')->on('estudiantes')->onDelete('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};

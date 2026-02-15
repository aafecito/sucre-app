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
        Schema::create('docente_asignaturas', function (Blueprint $table) {
            $table->id('id_docente_asignatura');
            $table->string('requisito_experiencia_docente')
                ->nullable(true);
            $table->unsignedBigInteger('id_docente');
            $table->unsignedBigInteger('id_asignatura');

            $table->foreign('id_docente')
                ->references('id_usuario')
                ->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_asignatura')
                ->references('id_asignatura')
                ->on('asignaturas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->index('id_docente');
            $table->index('id_asignatura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_asignaturas');
    }
};

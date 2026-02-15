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
        Schema::create('sistema_de_evaluacions', function (Blueprint $table) {
            $table->id('id_sistema_evaluacion');
            $table->tinyInteger('numero_unidad');
            $table->string('trabajo_autonomo', 10)->nullable(true);
            $table->string('evaluaciones_parciales', 10)->nullable(true);
            $table->string('trabajos_en_clase', 10)->nullable(true);
            $table->string('examen_parcial', 10)->nullable(true);
            $table->string('desarrollo_de_practicas', 10)->nullable(true);
            $table->string('proyecto_final', 10)->nullable(true);
            $table->unsignedBigInteger('id_asignatura');

            $table->foreign('id_asignatura')
                ->references('id_asignatura')
                ->on('asignaturas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->index('id_asignatura');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistema_de_evaluacions');
    }
};

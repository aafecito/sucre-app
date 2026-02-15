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
        Schema::create('practica_minimas', function (Blueprint $table) {
            $table->id('id_practica_minima');
            $table->string('descripcion', 50);
            $table->tinyInteger('numero')
                ->default(1);
            $table->string('resultados_esperados', 500)
                ->nullable(true);
            $table->string('sustentacion', 500)
                ->nullable(true);
            $table->string('tipo', 50)
                ->nullable(true);
            $table->unsignedBigInteger('id_asignatura')->nullable(true);

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
        Schema::dropIfExists('practica_minimas');
    }
};

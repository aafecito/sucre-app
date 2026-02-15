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
        Schema::create('horas_semanales', function (Blueprint $table) {
            $table->id('id_hora_semanal');
            $table->string('tipo', 50);
            $table->string('subtipo', 50)
                ->nullable(true);
            $table->tinyInteger('horas')
                ->default(0);
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
        Schema::dropIfExists('horas_semanales');
    }
};

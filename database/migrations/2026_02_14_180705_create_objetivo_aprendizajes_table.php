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
        Schema::create('objetivo_aprendizajes', function (Blueprint $table) {
            $table->id('id_objetivo_aprendizaje');
            $table->string('descripcion', 500);
            $table->tinyInteger('numero')->default(1);
            $table->string('tipo', 10)->nullable(true);
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
        Schema::dropIfExists('objetivo_aprendizajes');
    }
};

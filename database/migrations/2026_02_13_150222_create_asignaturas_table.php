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
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id('id_asignatura');
            $table->string('descripcion', 100);
            $table->string('codigo', 20)->nullable(true);
            $table->string('tipo', 20)->nullable(true);
            $table->string('semestre', 50)->nullable(true);
            $table->longtext('educacion_ambiental')->nullable(true);
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('id_carrera')->nullable(true);

            $table->foreign('id_carrera')
                ->references('id_carrera')
                ->on('carreras')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->index('id_carrera');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asignaturas');
    }
};

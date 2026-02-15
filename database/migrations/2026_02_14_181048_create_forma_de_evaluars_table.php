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
        Schema::create('forma_de_evaluars', function (Blueprint $table) {
            $table->id('id_forma_evaluar');
            $table->string('descripcion', 50);
            $table->tinyInteger('numero')
                ->default(1);
            $table->boolean('estado')
                ->default(false);
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
        Schema::dropIfExists('forma_de_evaluars');
    }
};

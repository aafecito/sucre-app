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
        Schema::create('bibliografia_basicas', function (Blueprint $table) {
            $table->id('id_bibliografia_basica');
            $table->tinyInteger('numero')
                ->default(1);
            $table->string('descripcion', 250);
            $table->string('sustentacion', 500);
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
        Schema::dropIfExists('bibliografia_basicas');
    }
};

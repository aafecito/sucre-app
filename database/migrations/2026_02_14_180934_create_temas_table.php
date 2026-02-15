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
        Schema::create('temas', function (Blueprint $table) {
            $table->id('id_tema');
            $table->string('descripcion', 250);
            $table->string('sustentacion', 500)
                ->nullable(true);
            $table->tinyInteger('numero')
                ->default(0);
            $table->tinyInteger('semana')
                ->default(0);
            $table->tinyInteger('numero_horas')
                ->default(0);
            $table->unsignedBigInteger('id_unidad');

            $table->foreign('id_unidad')
                ->references('id_unidad')
                ->on('unidads')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->index('id_unidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('temas');
    }
};

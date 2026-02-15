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
        Schema::create('carreras', function (Blueprint $table) {
            $table->id('id_carrera');
            $table->string('descripcion', 50);
            $table->string('codigo', 10)->nullable(true);
            $table->string('semestres', 2)->nullable(true);
            $table->boolean('estado')->default(true);
            $table->unsignedBigInteger('id_sede')->nullable(true);

            $table->foreign('id_sede')
                ->references('id_sede')
                ->on('sedes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->index('id_sede');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carreras');
    }
};

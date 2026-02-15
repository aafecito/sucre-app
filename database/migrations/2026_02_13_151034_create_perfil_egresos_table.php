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
        Schema::create('perfil_egresos', function (Blueprint $table) {
            $table->id('id_perfil_egreso');
            $table->string('descripcion', 500);
            $table->tinyInteger('numero')->default(1);
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
        Schema::dropIfExists('perfil_egresos');
    }
};

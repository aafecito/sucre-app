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
        Schema::create('objetivo_pdes', function (Blueprint $table) {
            $table->id('id_objetivo_pde');
            $table->unsignedBigInteger('id_objetivo_aprendizaje');
            $table->unsignedBigInteger('id_perfil_egreso');

            $table->foreign('id_objetivo_aprendizaje')
                ->references('id_objetivo_aprendizaje')
                ->on('objetivo_aprendizajes')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('id_perfil_egreso')
                ->references('id_perfil_egreso')
                ->on('perfil_egresos')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->index('id_objetivo_aprendizaje');
            $table->index('id_perfil_egreso');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('objetivo_pdes');
    }
};

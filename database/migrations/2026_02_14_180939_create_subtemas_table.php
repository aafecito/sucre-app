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
        Schema::create('subtemas', function (Blueprint $table) {
            $table->id('id_sub_tema');
            $table->string('descripcion', 100);
            $table->tinyInteger('numero')
                ->default(1);
            $table->unsignedBigInteger('id_tema');

            $table->foreign('id_tema')
                ->references('id_tema')
                ->on('temas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->index('id_tema');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subtemas');
    }
};

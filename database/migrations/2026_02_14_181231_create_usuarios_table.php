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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('primer_nombre');
            $table->string('segundo_nombre')
                ->nullable(true);
            $table->string('primer_apellido');
            $table->string('segundo_apellido')
                ->nullable(true);
            $table->string('tipo')
                ->nullable(true);
            $table->boolean('estado')
                ->default(true);
            $table->unsignedBigInteger('id_user')->nullable(true);

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->index('id_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};

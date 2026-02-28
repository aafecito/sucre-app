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
        Schema::table('usuarios', function (Blueprint $table) {
            // Agregar la columna de FK a tipo_usuario
            $table->unsignedBigInteger('id_tipo_usuario')
                ->default(5)
                ->after('segundo_apellido');

            // Agregar la restricción de clave foránea
            $table->foreign('id_tipo_usuario')
                ->references('id_tipo_usuario')
                ->on('tipo_usuario')
                ->onDelete('restrict')
                ->onUpdate('cascade');
        });

        // Eliminar la columna 'tipo' original
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('usuarios', function (Blueprint $table) {
            // Agregar de vuelta la columna 'tipo'
            $table->string('tipo')->nullable();
        });

        Schema::table('usuarios', function (Blueprint $table) {
            // Eliminar la FK y la columna
            $table->dropForeign(['id_tipo_usuario']);
            $table->dropColumn('id_tipo_usuario');
        });
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipo_usuario', function (Blueprint $table) {
            $table->id('id_tipo_usuario');
            $table->string('descripcion', 25);
            $table->boolean('estado')->default(true);
            $table->timestamps();
        });

        // Insertar los tipos de usuario predefinidos
        DB::table('tipo_usuario')->insert([
            [
                'id_tipo_usuario' => 1,
                'descripcion' => 'admin',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tipo_usuario' => 2,
                'descripcion' => 'operador',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tipo_usuario' => 3,
                'descripcion' => 'docente',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tipo_usuario' => 4,
                'descripcion' => 'estudiante',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id_tipo_usuario' => 5,
                'descripcion' => 'guest',
                'estado' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipo_usuario');
    }
};

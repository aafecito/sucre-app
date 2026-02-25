<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioAdministradorSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 */
	public function run(): void
	{
		// Crear el usuario en la tabla users si no existe
		$user = User::firstOrCreate(
			['id' => 1],
			[
				'name' => 'administrador sucre',
				'email' => 'admin@sucre.edu.bo',
				'password' => Hash::make('password'),
			]
		);

		// Crear el usuario en la tabla usuarios
		Usuario::firstOrCreate(
			['id_user' => 1],
			[
				'primer_nombre' => 'administrador',
				'primer_apellido' => 'sucre',
				'segundo_nombre' => null,
				'segundo_apellido' => null,
				'tipo' => 'admin',
				'estado' => true,
				'id_user' => 1,
			]
		);
	}
}

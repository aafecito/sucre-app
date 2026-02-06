<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Sede;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret')
        ]);

        // Create sample sedes
        Sede::create([
            'descripcion' => 'Sede Central',
            'codigo' => 'SC-01',
            'direccion' => 'Av Central 123',
            'telefono' => '1234567890',
            'estado' => true,
        ]);

        Sede::create([
            'descripcion' => 'Sede Norte',
            'codigo' => 'SN-02',
            'direccion' => 'Calle Norte 45',
            'telefono' => '0987654321',
            'estado' => true,
        ]);
    }
}

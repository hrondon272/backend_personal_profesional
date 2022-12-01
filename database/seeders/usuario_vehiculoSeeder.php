<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario_vehiculo;

class usuario_vehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario_vehiculo::create([
            'user_id' => 2,
            'vehiculo_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_vehiculo::create([
            'user_id' => 3,
            'vehiculo_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_vehiculo::create([
            'user_id' => 4,
            'vehiculo_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_vehiculo::create([
            'user_id' => 5,
            'vehiculo_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_vehiculo::create([
            'user_id' => 6,
            'vehiculo_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_vehiculo::create([
            'user_id' => 7,
            'vehiculo_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_vehiculo::create([
            'user_id' => 8,
            'vehiculo_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_vehiculo::create([
            'user_id' => 9,
            'vehiculo_id' => 8,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_vehiculo::create([
            'user_id' => 10,
            'vehiculo_id' => 10,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

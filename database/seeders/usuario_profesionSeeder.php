<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario_profesion;

class usuario_profesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario_profesion::create([
            'user_id' => 1,
            'profesion_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_profesion::create([
            'user_id' => 2,
            'profesion_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_profesion::create([
            'user_id' => 3,
            'profesion_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_profesion::create([
            'user_id' => 4,
            'profesion_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_profesion::create([
            'user_id' => 5,
            'profesion_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_profesion::create([
            'user_id' => 6,
            'profesion_id' => 5,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_profesion::create([
            'user_id' => 7,
            'profesion_id' => 6,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_profesion::create([
            'user_id' => 8,
            'profesion_id' => 4,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Usuario_profesion::create([
            'user_id' => 9,
            'profesion_id' => 7,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

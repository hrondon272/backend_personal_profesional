<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([ 
            usuarioSeeder::class,
            profesionSeeder::class,
            vehiculoSeeder::class,
            usuario_profesionSeeder::class,
            usuario_vehiculoSeeder::class
        ]);
    }
}

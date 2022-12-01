<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesion;

class profesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        Profesion::create([
            'nombre' => 'Docente',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Profesion::create([
            'nombre' => 'Ingeniero',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Profesion::create([
            'nombre' => 'Publicista',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Profesion::create([
            'nombre' => 'Profesor',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Profesion::create([
            'nombre' => 'Medico',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Profesion::create([
            'nombre' => 'Abogado',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        Profesion::create([
            'nombre' => 'Programador',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

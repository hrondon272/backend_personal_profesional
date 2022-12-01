<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Vehiculo;

class vehiculoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vehiculo::create([
            'nombre' => 'Camioneta',
            'marca' => 'Ford',
            'anio' => '2005',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'Motocicleta',
            'marca' => 'Yamaha',
            'anio' => '2013',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'Automovil',
            'marca' => 'Chevrolet',
            'anio' => '1998',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'Motocicleta',
            'marca' => 'Empire',
            'anio' => '2009',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'Automovil',
            'marca' => 'Fiat',
            'anio' => '2010',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'Camioneta',
            'marca' => 'Chevrolet',
            'anio' => '2016',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'Motocicleta',
            'marca' => 'Yahama',
            'anio' => '2016',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'Automovil',
            'marca' => 'Ford',
            'anio' => '2002',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'Motocicleta',
            'marca' => 'Yamaha',
            'anio' => '2013',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        
        Vehiculo::create([
            'nombre' => 'No posee',
            'marca' => 'NA',
            'anio' => '0',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

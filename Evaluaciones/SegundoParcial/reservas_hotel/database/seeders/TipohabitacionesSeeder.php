<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipohabitacionesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipohabitaciones')->insert([
            [
                'nombre' => 'simple',
                'descripcion' => 'Habitación para una persona',
                'precio' => 50.00,
            ],
            [
                'nombre' => 'doble',
                'descripcion' => 'Habitación para dos personas',
                'precio' => 90.00,
            ],
            [
                'nombre' => 'triple',
                'descripcion' => 'Habitación para tres personas',
                'precio' => 120.00,
            ],
            [
                'nombre' => 'matrimonio',
                'descripcion' => 'Habitación para pareja',
                'precio' => 100.00,
            ],
        ]);
    }
}

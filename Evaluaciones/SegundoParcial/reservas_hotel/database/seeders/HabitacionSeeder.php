<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class HabitacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run():void
    {
        $habitaciones = [];

   
        for ($i = 1; $i <= 10; $i++) {
            $habitaciones[] = [
                'numero_habitacion' => '1' . str_pad($i, 2, '0', STR_PAD_LEFT), 
                'tipo_habitacion_id' => 1,
                'precio_por_noche' => 50.00,
                'estado' => 'disponible',
                'descripcion' => 'Habitación individual',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        
        for ($i = 1; $i <= 5; $i++) {
            $habitaciones[] = [
                'numero_habitacion' => '2' . str_pad($i, 2, '0', STR_PAD_LEFT), 
                'tipo_habitacion_id' => 2,
                'precio_por_noche' => 90.00,
                'estado' => 'disponible',
                'descripcion' => 'Habitación doble',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $habitaciones[] = [
                'numero_habitacion' => '3' . str_pad($i, 2, '0', STR_PAD_LEFT), 
                'tipo_habitacion_id' => 3,
                'precio_por_noche' => 120.00,
                'estado' => 'disponible',
                'descripcion' => 'Habitación triple',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

       
        for ($i = 1; $i <= 8; $i++) {
            $habitaciones[] = [
                'numero_habitacion' => '4' . str_pad($i, 2, '0', STR_PAD_LEFT), 
                'tipo_habitacion_id' => 4,
                'precio_por_noche' => 100.00,
                'estado' => 'disponible',
                'descripcion' => 'Habitación matrimonial',
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
         DB::table('habitacions')->insert($habitaciones);
    }
}

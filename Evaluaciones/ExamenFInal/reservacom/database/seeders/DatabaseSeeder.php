<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use App\Models\Espacio;
use App\Models\Reserva;
use App\Models\Penalidad;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $admin = Usuario::create([
            'name' => 'Admin General',
            'email' => 'admin@reservacom.com',
            'password' => Hash::make('admin123'),
            'rol' => 'Administrador'
        ]);

        // Crear Encargados
        $encargados = Usuario::factory(2)->create([
            'rol' => 'Encargado'
        ]);

        // Crear Residentes
        $residentes = Usuario::factory(10)->create([
            'rol' => 'Residente'
        ]);

        // Crear Espacios
        $espacios = collect([
            [
                'nombre' => 'Salón Comunal',
                'descripcion' => 'Espacio para eventos sociales',
                'capacidad' => 50,
                'ubicacion' => 'Planta baja',
                'horarios_permitidos' => json_encode(['08:00-12:00', '14:00-18:00']),
                'encargado_id' => $encargados[0]->id,
            ],
            [
                'nombre' => 'Cancha Deportiva',
                'descripcion' => 'Para fútbol o básquet',
                'capacidad' => 20,
                'ubicacion' => 'Exterior',
                'horarios_permitidos' => json_encode(['06:00-10:00', '16:00-21:00']),
                'encargado_id' => $encargados[1]->id,
            ],
            [
                'nombre' => 'Sala Cowork',
                'descripcion' => 'Espacio para trabajo remoto',
                'capacidad' => 10,
                'ubicacion' => 'Segundo piso',
                'horarios_permitidos' => json_encode(['09:00-17:00']),
                'encargado_id' => $encargados[0]->id,
            ],
        ]);

        $espacios->each(fn($data) => Espacio::create($data));

        // Crear Reservas para algunos residentes
        foreach ($residentes as $residente) {
            Reserva::create([
                'usuario_id' => $residente->id,
                'espacio_id' => Espacio::inRandomOrder()->first()->id,
                'fecha_inicio' => Carbon::tomorrow()->setHour(10),
                'fecha_fin' => Carbon::tomorrow()->setHour(12),
                'estado' => 'pendiente',
            ]);
        }

        // Crear una penalidad a modo de ejemplo
        $reservaConPenalidad = Reserva::inRandomOrder()->first();
        Penalidad::create([
            'reserva_id' => $reservaConPenalidad->id,
            'motivo' => 'No asistencia sin previo aviso',
        ]);
        Espacio::factory(5)->create();
        Reserva::factory(15)->create();
    
    }
}

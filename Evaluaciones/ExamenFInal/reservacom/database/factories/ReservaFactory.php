<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;
use App\Models\Espacio;
use Carbon\Carbon;

class ReservaFactory extends Factory
{
    protected $model = \App\Models\Reserva::class;

    public function definition(): array
    {
        $inicio = Carbon::now()->addDays(rand(1, 10))->setHour(9);
        $fin = (clone $inicio)->addHours(2);

        return [
            'usuario_id' => Usuario::where('rol', 'Residente')->inRandomOrder()->first()?->id,
            'espacio_id' => Espacio::inRandomOrder()->first()?->id,
            'fecha_inicio' => $inicio,
            'fecha_fin' => $fin,
            'estado' => $this->faker->randomElement(['pendiente', 'aprobada', 'rechazada']),
            'motivo_rechazo' => null,
        ];
    }
}

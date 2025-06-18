<?php
namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Usuario;

class EspacioFactory extends Factory
{
    protected $model = \App\Models\Espacio::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word . ' Comunal',
            'descripcion' => $this->faker->sentence,
            'capacidad' => $this->faker->numberBetween(10, 100),
            'ubicacion' => $this->faker->address,
            'horarios_permitidos' => json_encode(['08:00-12:00', '14:00-18:00']),
            'encargado_id' => Usuario::where('rol', 'Encargado')->inRandomOrder()->first()?->id,
        ];
    }
}

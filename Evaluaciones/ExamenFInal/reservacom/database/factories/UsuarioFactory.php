<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => bcrypt('password'), // o usa Hash::make()
            'rol' => $this->faker->randomElement(['Administrador', 'Encargado', 'Residente']),
            // Otros campos que tenga tu tabla usuarios
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Usuario>
 */
class UsuarioFactory extends Factory
{
    protected static ?string $password;

    public function definition(): array
    {
        $roles = ['Administrador', 'Encargado', 'Residente'];

        return [
            'nombre' => $this->faker->name(),
            'correo' => $this->faker->unique()->safeEmail(),
            'contrasena' => static::$password ??= Hash::make('password'),
            'rol' => $this->faker->randomElement($roles),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Define un estado para rol específico.
     */
    public function role(string $rol): static
    {
        return $this->state(fn(array $attributes) => [
            'rol' => $rol,
        ]);
    }
}

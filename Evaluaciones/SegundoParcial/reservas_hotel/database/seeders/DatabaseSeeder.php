<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\HabitacionSeeder;
use Database\Seeders\TipohabitacionesSeeder;
use Database\Seeders\UsuariosSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
        TipohabitacionesSeeder::class,
        HabitacionSeeder::class,
        UsuariosSeeder::class,
    ]);
    }
}

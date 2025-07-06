<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CursoSeeder;
use Database\Seeders\PruebaSeeder;
use Database\Seeders\TemaSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    // Primero crea el usuario
    User::factory()->create([
        'name' => 'Test User',
        'email' => 'test@example.com',
    ]);

    // Luego ejecuta los demás seeders que dependen del usuario
    $this->call([
        CursoSeeder::class,
        PruebaSeeder::class,
        TemaSeeder::class,
    ]);
}   
}

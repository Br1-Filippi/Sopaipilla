<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\User;

class CursoSeeder extends Seeder
{
    public function run()
    {
        $user = User::first();

        Curso::create([
            'user_id' => $user->id,
            'nombre' => 'Curso de Matemáticas',
        ]);
    }
}

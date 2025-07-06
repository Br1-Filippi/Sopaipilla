<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prueba;
use App\Models\Curso;
use Carbon\Carbon;

class PruebaSeeder extends Seeder
{
    public function run()
    {
        $curso = Curso::first();

        Prueba::create([
            'curso_id' => 1,
            'nombre' => 'Prueba de Álgebra',
            'fecha' => Carbon::now()->addHours(48), // prueba dentro de 72 horas
        ]);
    }
}

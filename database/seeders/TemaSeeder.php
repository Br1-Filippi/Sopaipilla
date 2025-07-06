<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tema;
use App\Models\Prueba;

class TemaSeeder extends Seeder
{
    public function run()
    {
        $prueba = Prueba::first();

        Tema::insert([
            [
                'prueba_id' => 1,
                'nombre' => 'Ecuaciones lineales',
                'estudiado' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'prueba_id' => 1,
                'nombre' => 'Sistemas de ecuaciones',
                'estudiado' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
{
    $user = \App\Models\User::first();

    // Obtener cursos con pruebas dentro de las próximas 72 horas, con todos los temas
    $pruebasProximas = $user->cursos()
        ->with('pruebas.temas')  // <-- sin filtro aquí para traer todos los temas
        ->get()
        ->flatMap(function ($curso) {
            return $curso->pruebas->filter(function ($prueba) {
                return Carbon::parse($prueba->fecha)
                    ->isBetween(now(), now()->addHours(72));
            })->map(function ($prueba) use ($curso) {
                return [
                    'curso' => $curso->nombre,
                    'prueba' => $prueba->nombre,
                    'fecha' => $prueba->fecha,
                    'prueba_id' => $prueba->id,
                    'temas' => $prueba->temas,  // todos los temas aquí
                ];
            });
        });

    return view('dashboard', compact('pruebasProximas'));
}

}

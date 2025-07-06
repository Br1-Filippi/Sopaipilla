<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = \App\Models\User::first();

        // Obtener cursos con pruebas dentro de las próximas 72 horas y temas no estudiados
        $pruebasProximas = $user->cursos()
            ->with(['pruebas.temas' => function ($query) {
                $query->where('estudiado', false);
            }])
            ->get()
            ->flatMap(function ($curso) {
                return $curso->pruebas->filter(function ($prueba) {
                    return Carbon::parse($prueba->fecha)->isBetween(now(), now()->addHours(72));
                })->map(function ($prueba) use ($curso) {
                    return [
                        'curso' => $curso->nombre,
                        'prueba' => $prueba->nombre,
                        'fecha' => $prueba->fecha,
                        'temas' => $prueba->temas->pluck('nombre', 'id'),
                    ];
                });
            });

        return view('dashboard', compact('pruebasProximas'));
    }
}

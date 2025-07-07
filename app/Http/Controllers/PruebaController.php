<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use App\Models\Prueba;

class PruebaController extends Controller
{
    public function create()
    {
        // Traemos todos los cursos para el select
        $cursos = Curso::all();
        return view('pruebas.create', compact('cursos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'curso_id' => 'required|exists:cursos,id',
            'nombre' => 'required|string|max:255',
            'fecha' => 'required|date',
        ]);

        $prueba = Prueba::create([
            'curso_id' => $request->curso_id,
            'nombre' => $request->nombre,
            'fecha' => $request->fecha,
        ]);

        // Opcional: si quieres agregar temas al crear prueba, puedes hacerlo aquí o en otra vista.

        return redirect()->route('dashboard')->with('success', 'Prueba creada correctamente.');
    }
}

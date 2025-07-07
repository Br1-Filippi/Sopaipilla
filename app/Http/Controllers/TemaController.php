<?php

namespace App\Http\Controllers;

use App\Models\Tema;
use App\Models\Prueba;
use Illuminate\Http\Request;

class TemaController extends Controller
{
    public function index(Prueba $prueba)
    {
        $temas = $prueba->temas;
        return view('temas.index', compact('temas', 'prueba'));
    }

    public function store(Request $request, Prueba $prueba)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $prueba->temas()->create([
            'nombre' => $request->nombre,
            'estudiado' => false,
        ]);

        return back();
    }

    public function update(Request $request, Tema $tema)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $tema->update(['nombre' => $request->nombre]);

        return back();
    }

    public function destroy(Tema $tema)
    {
        $tema->delete();
        return back();
    }

    public function toggleEstudiado(\App\Models\Tema $tema)
{
    $tema->estudiado = !$tema->estudiado;
    $tema->save();

    return back();
}
}

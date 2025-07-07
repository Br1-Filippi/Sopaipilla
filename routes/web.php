<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Models\Tema;
use App\Http\Controllers\TemaController;
use App\Http\Controllers\PruebaController;

Route::get('/pruebas/create', [PruebaController::class, 'create'])->name('pruebas.create');
Route::post('/pruebas', [PruebaController::class, 'store'])->name('pruebas.store');



Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/temas/{id}', function ($id) {
    $tema = Tema::findOrFail($id);
    return "Tema: " . $tema->nombre;
})->name('temas.show');

//Temas 
Route::get('/temas/{prueba}', [TemaController::class, 'index'])->name('temas.index');
Route::post('/temas/{prueba}', [TemaController::class, 'store'])->name('temas.store');
Route::put('/temas/{tema}', [TemaController::class, 'update'])->name('temas.update');
Route::delete('/temas/{tema}', [TemaController::class, 'destroy'])->name('temas.destroy');
Route::patch('/temas/{tema}/toggle-estudiado', [TemaController::class, 'toggleEstudiado'])->name('temas.toggleEstudiado');

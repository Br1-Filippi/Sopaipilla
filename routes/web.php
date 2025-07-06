<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Models\Tema;



Route::get('/', [DashboardController::class, 'index']);
Route::get('/temas/{id}', function ($id) {
    $tema = Tema::findOrFail($id);
    return "Tema: " . $tema->nombre;
})->name('temas.show');
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;

Route::get('/', function () {
 return view('welcome');
});
Route::get('/usuarios', [UserController::class, 'index']);

// Rutas de Animales

Route::get('/animales', [AnimalController::class, 'index'])->name('animales.index');

Route::get('/animales/create', [AnimalController::class, 'create'])->name('animales.create');

Route::post('/animales', [AnimalController::class, 'store'])->name('animales.store');

Route::get('/animales/{id}/edit', [AnimalController::class, 'edit'])->name('animales.edit');

Route::put('/animales/{id}', [AnimalController::class, 'update'])->name('animales.update');

Route::delete('/animales/{id}', [AnimalController::class, 'destroy'])->name('animales.destroy');
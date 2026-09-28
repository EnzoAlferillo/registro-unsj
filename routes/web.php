<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;

Route::get('/', function () {
 return view('welcome');
});
Route::get('/usuarios', [UserController::class, 'index']);

// Rutas de Animales
// Muestra el listado de animales
Route::get('/animales', [AnimalController::class, 'index'])->name('animales.index');
// Muestra el formulario para crear un nuevo animal
Route::get('/animales/create', [AnimalController::class, 'create'])->name('animales.create');
// Guarda un nuevo animal en la sesión
Route::post('/animales', [AnimalController::class, 'store'])->name('animales.store');
// Muestra el formulario para editar un animal existente
Route::get('/animales/{id}/edit', [AnimalController::class, 'edit'])->name('animales.edit');
// Actualiza los datos de un animal
Route::put('/animales/{id}', [AnimalController::class, 'update'])->name('animales.update');
// Elimina un animal de la sesión
Route::delete('/animales/{id}', [AnimalController::class, 'destroy'])->name('animales.destroy');
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AnimalServiceInterface;
use App\Http\Requests\AnimalDataRequest;

class AnimalController extends Controller
{
    // Inyecta el servicio mediante el Service Container
    public function __construct(
        private AnimalServiceInterface $animalService
    ) {}
    // Obtiene la lista de animales almacenada en la sesión, sino crea el arreglo vacío
    public function index()
    {
        return view('animales.index', [
            'animales' => $this->animalService->all()
        ]);
    }
    // Muestra el formulario para registrar un nuevo animal
    public function create()
    {
        return view('animales.create');
    }
    // Guarda un nuevo animal en la sesión
    public function store(AnimalDataRequest $request)
    {
        $this->animalService->create($request->validated());

        return redirect()
            ->route('animales.index')
            ->with('success', 'Animal registrado correctamente.');
    }
    // Obtiene el animal seleccionado y envía sus datos al formulario de edición
    public function edit(int|string $id)
    {
        $animal = $this->animalService->find($id);

        return view('animales.edit', compact('animal', 'id'));
    }
    // Actualiza los datos de un animal existente
    public function update(AnimalDataRequest $request, int|string $id)
    {
        try {

            $this->animalService->update($id, $request->validated());

            return redirect()
                ->route('animales.index')
                ->with('success', 'Animal actualizado correctamente.');

        } catch (\Exception $e) {

            return redirect()
                ->route('animales.index')
                ->with('error', $e->getMessage());
        }
    }
    // Elimina un animal de la sesión
    public function destroy(int|string $id)
    {
        try {

            $this->animalService->delete($id);

            return redirect()
                ->route('animales.index')
                ->with('success', 'Animal eliminado correctamente.');

        } catch (\Exception $e) {

            return redirect()
                ->route('animales.index')
                ->with('error', $e->getMessage());
        }
    }
}
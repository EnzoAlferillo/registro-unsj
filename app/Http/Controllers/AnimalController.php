<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
class AnimalController extends Controller
{
    // Obtiene la lista de animales almacenada en la sesión, sino crea el arreglo vacío
    public function index(Request $request)
    {
        $animales = $request->session()->get('animales', []);
        // Envía la lista a la vista principal
        return view('animales.index', compact('animales'));
    }
    // Muestra el formulario para registrar un nuevo animal
    public function create()
    {
        return view('animales.create');
    }
    // Guarda un nuevo animal en la sesión
    public function store(Request $request)
    {
        // Obtiene la lista actual de animales
        $animales = $request->session()->get('animales', []);
        // Agrega un nuevo animal al arreglo
        $animales[] = [
            'nombre' => $request->nombre,
            'especie' => $request->especie
        ];
    // Guarda nuevamente la lista en la sesión
        $request->session()->put('animales', $animales);
    // Regresa al listado principal
        return redirect()->route('animales.index');
    }
    // Obtiene el animal seleccionado y envía sus datos al formulario de edición
    public function edit(Request $request, $id)
    {
        // Recupera la lista de animales de la sesión
        $animales = $request->session()->get('animales', []);
         // Envía el animal seleccionado y su identificador a la vista
        return view('animales.edit', [
            'animal' => $animales[$id],
            'id' => $id
        ]);
    }
    // Actualiza los datos de un animal existente
    public function update(Request $request, $id)
    {
         // Recupera la lista de animales
        $animales = $request->session()->get('animales', []);
        // Reemplaza la información del animal seleccionado
        $animales[$id] = [
            'nombre' => $request->nombre,
            'especie' => $request->especie
        ];
        // Guarda los cambios en la sesión
        $request->session()->put('animales', $animales);
        // Regresa al listado principal
        return redirect()->route('animales.index');
    }
    // Elimina un animal de la sesión
    public function destroy(Request $request, $id)
    {
        // Recupera la lista de animales
        $animales = $request->session()->get('animales', []);
        // Elimina el animal seleccionado
        unset($animales[$id]);
        // Reorganiza los índices del arreglo
        $animales = array_values($animales);
        // Guarda la lista actualizada
        $request->session()->put('animales', $animales);
        // Regresa al listado principal
        return redirect()->route('animales.index');
    }
}
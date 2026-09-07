<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function index(Request $request)
    {
        $animales = $request->session()->get('animales', []);

        return view('animales.index', compact('animales'));
    }

    public function create()
    {
        return view('animales.create');
    }

    public function store(Request $request)
    {
        $animales = $request->session()->get('animales', []);

        $animales[] = [
            'nombre' => $request->nombre,
            'especie' => $request->especie
        ];

        $request->session()->put('animales', $animales);

        return redirect()->route('animales.index');
    }

    public function edit(Request $request, $id)
    {
        $animales = $request->session()->get('animales', []);

        return view('animales.edit', [
            'animal' => $animales[$id],
            'id' => $id
        ]);
    }

    public function update(Request $request, $id)
    {
        $animales = $request->session()->get('animales', []);

        $animales[$id] = [
            'nombre' => $request->nombre,
            'especie' => $request->especie
        ];

        $request->session()->put('animales', $animales);

        return redirect()->route('animales.index');
    }

    public function destroy(Request $request, $id)
    {
        $animales = $request->session()->get('animales', []);

        unset($animales[$id]);

        $animales = array_values($animales);

        $request->session()->put('animales', $animales);

        return redirect()->route('animales.index');
    }
}
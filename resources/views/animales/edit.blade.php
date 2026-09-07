@extends('layouts.app')

@section('titulo', 'Editar Animal')

@section('contenido')

<form action="{{ route('animales.update', $id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Nombre</label>

    <input type="text" name="nombre" value="{{ $animal['nombre'] }}">

    <br><br>

    <label>Especie</label>

    <input type="text" name="especie" value="{{ $animal['especie'] }}">

    <br><br>

    <button type="submit">
        Actualizar
    </button>

</form>

@endsection
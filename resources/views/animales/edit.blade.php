@extends('layouts.app')

@section('titulo','Editar Animal')

@section('contenido')

<h2>Editar Animal</h2>

<form action="{{ route('animales.update', $id) }}" method="POST">

    @csrf
    @method('PUT')

    <label>Nombre</label>

    <input type="text"
        name="name"
        value="{{ old('name', $animal['name']) }}">
    @error('name')
        <p>{{ $message }}</p>
    @enderror
    

    <label>Especie</label>

    <input type="text"
        name="species"
        value="{{ old('species', $animal['species']) }}">
    @error('species')
        <p>{{ $message }}</p>
    @enderror

    <label>Edad</label>

    <input type="number"
        name="age"
        value="{{ old('age', $animal['age']) }}">
    @error('age')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">
        Actualizar
    </button>

</form>

@endsection
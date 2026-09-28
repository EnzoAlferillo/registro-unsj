@extends('layouts.app')

@section('titulo','Nuevo Animal')

@section('contenido')

<h2>Registrar Animal</h2>

<form action="{{ route('animales.store') }}" method="POST">

    @csrf

    <label>Nombre</label>

    <input type="text" name="name" value="{{ old('name') }}">
    @error('name')
        <p>{{ $message }}</p>
    @enderror

    <label>Especie</label>

    <input type="text" name="species" value="{{ old('species') }}">
    @error('species')
        <p>{{ $message }}</p>
    @enderror

    <label>Edad</label>

    <input type="number" name="age" value="{{ old('age') }}">

    @error('age')
        <p>{{ $message }}</p>
    @enderror

    <button type="submit">
        Guardar
    </button>

</form>

@endsection
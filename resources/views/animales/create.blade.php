@extends('layouts.app')

@section('titulo', 'Nuevo Animal')

@section('contenido')

<form action="{{ route('animales.store') }}" method="POST">

    @csrf

    <label>Nombre</label>

    <input type="text" name="nombre">

    <br><br>

    <label>Especie</label>

    <input type="text" name="especie">

    <br><br>

    <button type="submit">

        Guardar

    </button>

</form>

@endsection
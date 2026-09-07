@extends('layouts.app')

@section('titulo', 'Animales')

@section('contenido')

<a href="{{ route('animales.create') }}">Nuevo Animal</a>

<ul>
@foreach($animales as $animal)

    <li>

        {{ $animal['nombre'] }}

        ({{ $animal['especie'] }})

        <a href="{{ route('animales.edit', $loop->index) }}">
            Editar
        </a>

        <form action="{{ route('animales.destroy', $loop->index) }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar
            </button>

        </form>

    </li>

@endforeach
</ul>

@endsection
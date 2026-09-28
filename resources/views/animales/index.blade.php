@extends('layouts.app')

@section('titulo','Animales')

@section('contenido')

<a href="{{ route('animales.create') }}">
    Nuevo Animal
</a>

<br><br>

<ul>

@foreach($animales as $animal)

<li>

    <strong>{{ $animal['name'] }}</strong>

    <br>

    Especie: {{ $animal['species'] }}

    <br>

    Edad: {{ $animal['age'] }} años

    <div class="acciones">

        <a href="{{ route('animales.edit', $animal['id']) }}">
            Editar
        </a>

        <form action="{{ route('animales.destroy', $animal['id']) }}" method="POST">

            @csrf
            @method('DELETE')

            <button type="submit">
                Eliminar
            </button>

        </form>

    </div>

</li>

@endforeach

</ul>

@endsection
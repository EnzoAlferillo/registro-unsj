<!DOCTYPE html>
{{-- Layout principal de la aplicación --}}
<html lang="es">
<head>
    <meta charset="UTF-8">
    {{-- Título dinámico de cada vista --}}
    <title>@yield('titulo')</title>
</head>
<body>

<h1>Sistema CRUD de Animales</h1>

<hr>
{{-- Contenido específico de cada página --}}
@yield('contenido')

</body>
</html>
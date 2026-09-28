<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>

    <style>
        body{
            font-family: Arial, sans-serif;
            background:#f4f4f4;
            margin:40px;
        }

        .contenedor{
            max-width:800px;
            margin:auto;
            background:white;
            padding:25px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,.15);
        }

        h1{
            text-align:center;
            color:#2c3e50;
        }

        a{
            text-decoration:none;
            color:white;
            background:#3498db;
            padding:8px 12px;
            border-radius:5px;
        }

        a:hover{
            background:#2980b9;
        }

        button{
            background:#27ae60;
            color:white;
            border:none;
            padding:8px 12px;
            border-radius:5px;
            cursor:pointer;
        }

        button:hover{
            background:#219150;
        }

        input{
            width:100%;
            padding:8px;
            margin-top:5px;
            margin-bottom:15px;
        }

        form{
            margin-top:15px;
        }

        ul{
            list-style:none;
            padding:0;
        }

        li{
            background:#ecf0f1;
            padding:15px;
            margin-bottom:10px;
            border-radius:6px;
        }

        .acciones{
            margin-top:10px;
            display:flex;
            gap:10px;
        }

        .eliminar button{
            background:#e74c3c;
        }

        .eliminar button:hover{
            background:#c0392b;
        }
    </style>
</head>

<body>

<div class="contenedor">

    <h1>Sistema CRUD de Animales</h1>

    <hr>

    @yield('contenido')

</div>

</body>
</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Administrador')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand px-4" href="{{ route('admin.videojuego.index') }}">Administrador</a>
        <ul class="navbar-nav mx-auto">
            <a class="navbar-brand px-3" href="{{ route('admin.compras') }}">Compras</a>
            <a class="navbar-brand px-3" href="{{ route('admin.usuarios') }}">Usuarios</a>
            <a class="navbar-brand px-3" href="{{ route('videojuego.index') }}">Ir a Inicio</a>
        </ul>
    </nav>

    <style>
        body {
            background-color: #6a737c;
        }
    </style>

    @yield('content')



    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

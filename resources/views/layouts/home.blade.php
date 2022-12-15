<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Tienda en linea Videojuegos')</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!--header-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('videojuego.index') }}"><i class=" fa fa-duotone fa-house"></i>
                Inicio</a>
            <ul class="navbar-nav ml-auto align-items-center">
                <li class="nav-item active"><a class="nav-link active text-white" href="{{ route('carrito.index') }}">
                        <i class="fa fa-shopping-cart"></i> Carrito</a></li>
                <li class="nav-item active">
                    @guest
                    <li class="nav-item active">
                        <a class="nav-link active" href="{{ route('login') }}">Ingresar</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link active" href="{{ route('register') }}">Registrarse</a>
                    </li>
                @else
                    @if (Auth::user()->rol == 'admin')
                        <a class="nav-link active text-white" href="{{ route('admin.videojuego.index') }}">
                            <i class="fa-solid fa-user-tie"></i> Admin
                        </a>
                    @endif
                    <li class="nav-item active"><a class="nav-link active text-white"
                            href="{{ route('micuenta.compras') }}"> <i class="fa fa-bag-shopping"></i> Mis
                            Compras</a></li>

                    <li class="nav-item active">
                        <a class="nav-link active text-white" href="#">
                            <i class="fa-regular fa-user"></i> {{ Auth::user()->nombre }}
                        </a>
                    </li>
                    <li class="nav-item active">
                        <form id="logout" action="{{ route('logout') }}" method="POST">
                            <a role="button" class="nav-link active text-white "
                                onclick="document.getElementById('logout').submit();"><i
                                    class="fa-solid fa-right-from-bracket"></i></i> Cerrar Sesion</a>
                            @csrf
                        </form>
                    </li>
                @endguest
            </ul>

        </div>
    </nav>
    <!--contenido-->
    <style>
        body {
            background-color: #2D3E50;
        }
    </style>
    <div class="cotainer my-4">
        @yield('content')
    </div>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
</body>

</html>

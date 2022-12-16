@extends('layouts.home')
@section('title', $data['title'])
@section('subtitle', $data['subtitle'])
@section('content')
    <style>
        .hover {
            z-index: 2;
        }

        .hover:hover {
            background-color: rgba(204, 199, 199, 0.182);
            box-shadow: 0 0 0 .5rem #000000;
        }
    </style>

    <div class="row">

        <div class="col-md-2">
            <div class="container">
                <div class="card" style="background-color: #0000001e">
                    <div class="card-body">
                        <h5 class="card-title text-center bg-dark text-white h4">Categorias</h5>
                        <p class="card-text">
                        <ul>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'Accion') }}">Accion</a></li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'Simulador') }}">Simulador</a>
                            </li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'Deportes') }}">Deportes</a>
                            </li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'Belico') }}">Belico</a></li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'Carreras') }}">Carreras</a>
                            </li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'Mundo Abierto') }}">Mundo
                                    Abierto</a></li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'FPS') }}">FPS</a></li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'RPG') }}">RPG</a></li>
                            <li><a class="text-white"
                                    href="{{ route('videojuego.categorias', 'Estrategia') }}">Estrategia</a></li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'Aventura') }}">Aventura</a>
                            </li>
                            <li><a class="text-white" href="{{ route('videojuego.categorias', 'Arcade') }}">Arcade</a></li>
                        </ul>
                        </p>
                    </div>
                </div>
                <br><br>
                <div class="card" style="background-color: #0000001e">
                    <div class="card-body">
                        <h5 class="card-title text-center bg-dark text-white h4">Rango de Precios</h5>
                        <ul>
                            <li><a class="text-white" href="{{ route('videojuego.precio', [1, 49]) }}">Entre 1$ y 49$</a>
                            </li>
                            <li><a class="text-white" href="{{ route('videojuego.precio', [50, 99]) }}">Entre 50$ y 99$</a>
                            </li>
                            <li><a class="text-white" href="{{ route('videojuego.precio', [100, 499]) }}">Entre 100$ y
                                    499$</a></li>
                            <li><a class="text-white" href="{{ route('videojuego.precio', [500, 999]) }}">Entre 500$ y
                                    999$</a></li>
                            <li><a class="text-white" href="{{ route('videojuego.precio', [1000, 1999]) }}">Entre $1000$ y
                                    1999$</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="container">
                <div class="row">
                    <div class="buscador mb-4">
                        <form class="form" method="POST" action="{{route('videojuego.buscar')}}">
                            @csrf
                            <div class=" navbar input-group mr-auto" style="width: 30%">
                                <input name="nombre_videojuego" type="search" class="mr-3 text-white bg-dark form-control rounded" placeholder="Buscar un videojuego" aria-label="Search"
                                    aria-describedby="search-addon" />
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                    </div>
                    @forelse ($data['videojuegos'] as $videojuego)
                        <div class="col-md-4 col-lg-3 mb-5">
                            <div class="card hover " style="width: 15rem; max-witdh: 15rem;background-color: #0000001e">
                                <a href="{{ route('videojuego.show', ['id' => $videojuego->getId()]) }}">
                                    <img style="pointer-events: none;" alt="xd" src="{{asset('/storage/'.$videojuego->getImage())}}">
                                    <div class="card-body text-center">
                                        <p class=" text-white">{{ $videojuego->getName() }} </p>
                                        <p
                                            style="margin-left:.5rem;font-size:2rem; display:inline-block;color:green;font-weight:bolder;">
                                            ${{ $videojuego->getPrice() }}MXN</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="alert alert-danger" role="alert">
                            Parece que no hay videojuegos con esta condicion!
                        </div>
                    @endforelse
                </div>
                <div style="margin-bottom:1rem;spacing:1rem;margin-top:4rem;">
                    {{ $data['videojuegos']->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
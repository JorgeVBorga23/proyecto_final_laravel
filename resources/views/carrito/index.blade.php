@extends('layouts.home')
@section('title', $data['title'])
@section('content')
    <div class="container">
        <div class="card"style="background-color: #0000009a">
            <div class="card-header bg-secondary text-white">
                Videojuegos en el carrito
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data['videojuegos'] as $videojuego)
                            <tr class="bg-light ">
                                <td>{{ $videojuego->getId() }}</td>
                                <td>{{ $videojuego->getName() }}</td>
                                <td>${{ $videojuego->getPrice() }}</td>
                                <td>{{ session('videojuegos')[$videojuego->getId()]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="text-end">
                        <a class="text-white btn btn-outline-secondary mb-2"><b>Total a pagar:</b> ${{ $data['total'] }}</a>
                        @if (count($data['videojuegos']) > 0)
                            <a href="{{route('carrito.comprar')}}" class="btn bg-primary text-white mb-2">Comprar</a>
                            <a href="{{ route('carrito.delete') }}">
                                <button class="btn btn-danger mb-2">
                                    Eliminar todos los juegos
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

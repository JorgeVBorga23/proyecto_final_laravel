@extends('layouts.home')
@section('title', $data['title'])
@section('content')
    <div class="container">
        <div class="card mb-3 mt-5">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="{{ asset('/storage/' . $data['videojuego']->getImage()) }}" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">
                            <strong class="h4">Titulo:</strong> {{ $data['videojuego']->getName() }}
                        </h5>
                        <br>
                        <p class="card-text"><strong class="h4">Descripcion:</strong>
                            {{ $data['videojuego']['descripcion'] }}</p>
                        <br>
                        <p class="card-text"><strong class="h4">Categoria:</strong> {{ $data['videojuego']['genero'] }}
                        </p>
                        <br>
                        <p class="card-text" ><strong class="h4">Precio</strong>
                            <strong class="text-success h4">${{ $data['videojuego']->getPrice() }}</strong></p>
                        <br>
                        <p class="card-text">
                        <form method="POST" action="{{ route('carrito.add', ['id' => $data['videojuego']->getId()]) }}">
                            <div class="row">
                                @csrf
                                <div class="col-auto">
                                    <div class="input-group col-auto">
                                        <div class="input-group-text">Cantidad</div>
                                        <input type="number" min="1" max="10"
                                            class="form-control quantity-input" name="cantidad" value="1">
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <button class="btn bg-primary text-white" type="submit">Añadir al carrito</button>
                                </div>
                            </div>
                        </form>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

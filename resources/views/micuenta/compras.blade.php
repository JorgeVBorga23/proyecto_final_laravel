@extends('layouts.home')
@section('title', $data['title'])
@section('content')

    <div class="container">
        @forelse ($data["compras"] as $compras)
        <div class="card mb-4" style="background-color: #0000009a">
            <div class="card-header bg-secondary text-white">
                Compra #{{ $compras->getId() }}
            </div>
            <div class="card-body text-white carta">
                <b>Fecha:</b> {{ $compras->getCreatedAt() }}<br />
                <b>Total:</b> ${{ $compras->getTotal() }}<br />
                <table class="table table-bordered table-striped text-center mt-3">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th scope="col">Videojuego ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($compras->getItems() as $item)
                            <tr class="bg-light">
                                <td>{{ $item->getId() }}</td>
                                <td>
                                    <a class="link-success"
                                        href="{{ route('videojuego.show', ['id' => $item->getVideojuego()->getId()]) }}">
                                        {{ $item->getVideojuego()->getName() }}
                                    </a>
                                </td>
                                <td>${{ $item->getPrice() }}</td>
                                <td>{{ $item->getQuantity() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @empty
        <div class="alert alert-danger" role="alert">
          Parece que no has hecho ninguna compra!
        </div>
    @endforelse
    </div>
@endsection

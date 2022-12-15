@extends('layouts.admin')
@section('title', $data['title'])
@section('content')


<div class="container">
    @forelse ($data["compras"] as $compras)
    <div class="card mt-5" style="background-color: #c5c5c59a">
        <div class="card-header bg-dark text-white" >
            Compra #{{ $compras->getId() }} 
            Hecha por: {{$compras->getUser()->getName()}}
        </div>
        <div class="card-body">
            <b>Fecha:</b> {{ $compras->getCreatedAt() }}<br />
            <b>Total:</b> ${{ $compras->getTotal() }}<br />
            <table class="table table-dark table-bordered table-striped text-center mt-3">
                <thead>
                    <tr>
                        <th scope="col">Videojuego ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($compras->getItems() as $item)
                        <tr>
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
     No hay ninguna compra aun
    </div>
@endforelse
</div>



@endsection

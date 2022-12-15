@extends('layouts.admin')
@section('title', $data['title'])
@section('content')
    <div class="row mt-4">
        <div class="col-md-4">
            <div class="card ml-4 text-white" style="background-color: #0000009a">
                <div class="card-body">
                    <h5 class="card-title h3 text-center">Ingresar un nuevo Videojuego</h5>
                    <div class="card-body">
                        @if ($errors->any())
                            <ul class="alert alert-danger list-unstyled">
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form enctype="multipart/form-data" method="post" action="{{ route('admin.videojuego.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="my-input">Nombre:</label>
                                <input id="my-input" class="form-control bg-secondary" type="text" name="nombre">
                            </div>
                            <div class="form-group">
                                <label for="my-input">Descripcion:</label>
                                <textarea id="my-input" class="form-control bg-secondary" type="text" cols="3" name="descripcion"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="my-input">Genero:</label>
                                <input id="my-input" class="form-control bg-secondary" type="text" name="genero">
                            </div>
                            <div class="form-group">
                                <label for="my-input">Precio:</label>
                                <input id="my-input" class="form-control bg-secondary" type="number" min="1" name="precio">
                            </div>
                            <div class="form-group">
                                <label for="my-input">Imagen:</label>
                                <input id="my-input" class="form-control bg-secondary" type="file" name="imagen">
                            </div>
                            <br>
                            <input type="submit" class="btn btn-primary" value="Registrar">

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">

            <div class="card mr-4 mb-4 text-white" style="background-color: #0000009a">
                <div class="card-body ">
                    <h5 class="card-title h3 text-center">Listado de videojuegos</h5>
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tr class="bg-light">
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Genero</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th>Creado el</th>
                                <th>Actualizado el</th>
                                <th>Acciones</th>
                            </tr>

                            @foreach ($data['videojuegos'] as $vj)
                                <tr class="table-dark">
                                    <th>{{ $vj->getID() }}</th>
                                    <th>{{ $vj->getName() }}</th>
                                    <th>{{ $vj->getDescription() }}</th>
                                    <th>{{ $vj->getGenero() }}</th>
                                    <th>{{ $vj->getPrice() }}</th>
                                    <th>{{ $vj->getImage() }}</th>
                                    <th>{{ $vj->getCreatedAt() }}</th>
                                    <th>{{ $vj->getUpdatedAt() }}</th>
                                    <th>
                                        <a class="btn btn-outline-success"
                                            href="{{ route('admin.videojuego.edit', ['id' => $vj->getId()]) }}">Editar</a>
                                        <form action="{{ route('admin.videojuego.delete', $vj->getId()) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
                                    </th>
                                </tr>
                            @endforeach

                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
    <div class="row ">
        {{$data['videojuegos']->links()}}
    </div>

@endsection

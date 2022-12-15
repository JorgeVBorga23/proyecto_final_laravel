@extends('layouts.admin')
@section('title', $data['title'])
@section('content')


    <div class="container">
        <div class="row">
            <div class="text-white col-md-6 offset-md-3 mt-5">
                @if ($errors->any())
                    <ul class="alert alert-danger list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>- {{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <form enctype="multipart/form-data" method="post" action="{{ route('admin.videojuego.update', ['id' => $data['videojuego']->getId()]) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="my-input">Nombre:</label>
                        <input id="my-input" class="form-control text-white bg-dark" type="text" name="nombre" value="{{ $data['videojuego']->getName() }}">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Descripcion:</label>
                        <textarea id="my-input" class="form-control text-white bg-dark" type="text" cols="3" name="descripcion">{{ $data['videojuego']->getDescription() }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="my-input">Genero:</label>
                        <input id="my-input" class="form-control text-white bg-dark" type="text" name="genero" value="{{ $data['videojuego']->getGenero() }}">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Precio:</label>
                        <input id="my-input" class="form-control text-white bg-dark" type="number" min="1" name="precio" value="{{ $data['videojuego']->getPrice() }}">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Imagen:</label>
                        <input id="my-input" class="form-control text-white bg-dark" type="file" name="imagen">
                    </div>
                    <br>
                    <input type="submit" class="btn bg-white text-primary form-control" value="Actualizar">
                </form>
            </div>
        </div>
    </div>


@endsection

@extends('layouts.admin')
@section('title', $data['title'])
@section('content')
    <div class="container pt-5">
        <table class="table table-dark table-bordered">
            <thead >
                <th>Id</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Rol</th>
                <th>Balance</th>
                <th>Creado el</th>
                <th>Actualizado el</th>
            </thead>
            <tbody>
                @foreach ($data['usuarios'] as $user)
                    
                <tr >
                    <th>{{$user->getId()}}</th>
                    <th>{{$user->getName()}}</th>
                    <th>{{$user->getEmail()}}</th>
                    <th>{{$user->getPassword()}}</th>
                    <th>{{$user->getRole()}}</th>
                    <th>{{$user->getBalance()}}</th>
                    <th>{{$user->getCreatedAt()}}l</th>
                    <th>{{$user->getUpdatedAt()}}</th>
                </tr>
                    
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
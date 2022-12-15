@extends('layouts.home')
@section('title', $data['title'])
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                Compra realizada!!!
            </div>
            <div class="card-body">
                <div class="alert alert-success" role="alert">
                    Gracias por tu compra, pedido finalizado. Tu numero de compra es: <b>#{{ $data['compra']->getId() }}</b>
                </div>
            </div>
        </div>
    </div>
@endsection

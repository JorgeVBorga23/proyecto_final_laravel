<?php

namespace App\Http\Controllers;

use App\Models\Videojuego;
use Illuminate\Http\Request;

class VideojuegoController extends Controller
{

    public function index()
    {
        $data = [];
        $data["title"] = "Videojuegos - Listado";
        $data["subtitle"] = "Lista de videojuegos";
        $data["videojuegos"] = Videojuego::paginate(8);
        return view('videojuego.index')->with("data", $data);
    }
    public function show($id)
    {
        $data = [];
        $product = Videojuego::findOrFail($id);
        $data["title"] = $product->getName() . " - Tienda Videojuegos";
        $data["videojuego"] = $product;
        return view('videojuego.show')->with("data", $data);
    }
    public function filtroCategorias($categoria){
        $data = [];
        $data["title"] = "Videojuegos - " . $categoria;
        $data["subtitle"] = "Lista de videojuegos en categoria";
        $data["videojuegos"] = Videojuego::where('genero', "like", $categoria)->paginate(8);
        return view('videojuego.index')->with("data", $data);

    }
    public function filtroPrecios($min, $max){
        $data = [];
        $data["title"] = "Videojuegos - Precio: " .$min. ' a '.$max;
        $data["subtitle"] = "Lista de videojuegos en Precio";
        $data["videojuegos"] = Videojuego::whereBetween('precio', [$min,$max])->paginate(8);
        return view('videojuego.index')->with("data", $data);
    }
    public function buscarVideojuego(Request $req){
        $nombre = $req->input('nombre_videojuego');
        $data = [];
        $data["title"] = "Videojuegos - Buscar";
        $data["subtitle"] = "Buscar";
        $data["videojuegos"] = Videojuego::where('nombre', 'like', '%'.$nombre.'%')->paginate(8);
        return view('videojuego.index')->with("data", $data);
    }
}

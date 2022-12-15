<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Item;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;

class AdminInicioController extends Controller
{ 
    public function index()
    {
        $data = [];
        $data["title"] = "Admin - Videojuegos";
        $data['videojuegos'] = Videojuego::paginate(6);
        return view('admin.index')->with("data", $data);
    }
    public function store(Request $request)
    {
        Videojuego::validate($request);
        $nuevoVideojuego = new Videojuego();
        $nuevoVideojuego->setName($request->input('nombre'));
        $nuevoVideojuego->setDescription($request->input('descripcion'));
        $nuevoVideojuego->setPrice($request->input('precio'));
        $nuevoVideojuego->setImage("safe.png");
        $nuevoVideojuego->setGenero($request->input('genero'));
        $nuevoVideojuego->save();
        if ($request->hasFile('imagen')) {
            $imagenNueva = $nuevoVideojuego->getId() . "." . $request->file('imagen')->extension();
            Storage::disk('public')->put(
                $imagenNueva,
                file_get_contents($request->file('imagen')->getRealPath())
            );
            $nuevoVideojuego->setImage($imagenNueva);
            $nuevoVideojuego->save();
        }
        return back();
    }
    public function delete($id){
        Videojuego::destroy($id);
        return back();
    }
    public function edit($id)
    {
        $data = [];
        $data["title"] = "Editar Videojuego";
        $data["videojuego"] = Videojuego::findOrFail($id);
        return view('admin.edit')->with("data", $data);
    }
    public function update(Request $request, $id)
    {
        Videojuego::validate($request);
        $videojuegoActualizado = Videojuego::findOrFail($id);
        $videojuegoActualizado->setName($request->input('nombre'));
        $videojuegoActualizado->setDescription($request->input('descripcion'));
        $videojuegoActualizado->setPrice($request->input('precio'));
        if ($request->hasFile('imagen')) {
            $imageName = $videojuegoActualizado->getId() . "." . $request->file('imagen')->extension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('imagen')->getRealPath())
            );
            $videojuegoActualizado->setImage($imageName);
        }
        $videojuegoActualizado->save();
        return redirect()->route('admin.videojuego.index');
    }
    public function compras(){
        $data = [];
        $data["title"] = "Compras - Usuarios";
        $data['compras'] = Compra::all();
        return view('admin.compras')->with("data", $data);
    }
    public function usuarios(){
        $data = [];
        $data["title"] = "Usuarios - Listado";
        $data['usuarios'] = User::all();
        return view('admin.usuarios')->with("data", $data);
    }



}
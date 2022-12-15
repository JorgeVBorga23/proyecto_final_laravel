<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Item;

class CarritoController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $videojuegosCarrito = [];
        $videojuegosSesion = $request->session()->get("videojuegos");
        if ($videojuegosSesion) {
            $videojuegosCarrito = Videojuego::findMany(array_keys($videojuegosSesion));
            $total = Videojuego::sumPreciosCantidad($videojuegosCarrito, $videojuegosSesion);
        }
        $data = [];
        $data["title"] = "Carrito";
        $data["total"] = $total;
        $data["videojuegos"] = $videojuegosCarrito;
        return view('carrito.index')->with("data", $data);
    }
    public function agregarAlCarrito(Request $request, $id)
    {
        $videojuegos = $request->session()->get("videojuegos");
        $videojuegos[$id] = $request->input('cantidad');
        $request->session()->put('videojuegos', $videojuegos);
        return redirect()->route('carrito.index');
    }
    public function eliminarCarrito(Request $request)
    {
        $request->session()->forget('videojuegos');
        return back();
    }
    public function comprar(Request $request)
    {
        $vjSesion = $request->session()->get("videojuegos");
        if ($vjSesion) {
            $idUsuario = Auth::user()->getId();
            $compra = new Compra();
            $compra->setUserId($idUsuario);
            $compra->setTotal(0);
            $compra->save();
            $total = 0;
            $vjCarrito = Videojuego::findMany(array_keys($vjSesion));
            foreach ($vjCarrito as $product) {
                $quantity = $vjSesion[$product->getId()];
                $item = new Item();
                $item->setQuantity($quantity);
                $item->setPrice($product->getPrice());
                $item->setVideojuegoId($product->getId());
                $item->setCompraId($compra->getId());
                $item->save();
                $total = $total + ($product->getPrice() * $quantity);
            }
            $compra->setTotal($total);
            $compra->save();
            $nuevoBalance = Auth::user()->getBalance() - $total;
            Auth::user()->setBalance($nuevoBalance);
            Auth::user()->save();
            $request->session()->forget('videojuegos');
            $data = [];
            $data["title"] = "Purchase - Online Store";
            $data["compra"] = $compra;
            return view('carrito.compra')->with("data", $data);
        } else {
            return redirect()->route('carrito.compra');
        }
    }
}

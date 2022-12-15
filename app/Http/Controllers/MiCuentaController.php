<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MiCuentaController extends Controller
{
    public function compras()
    {
        $data = [];
        $data["title"] = "My Orders - Online Store";
        $data["compras"] = Compra::where('user_id', Auth::user()->getId())->get();
        return view('micuenta.compras')->with("data", $data);
    }
}

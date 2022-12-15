<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $data = [];
        $data['title'] = "Inicio - Videojuegos";
        return view('home.index')->with('data', $data);
    }
}

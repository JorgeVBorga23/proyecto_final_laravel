<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Videojuego;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function registro(Request $req)
    {
        $validado = $req->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|string|unique:users',
            'password' => 'required|string|min:5'
        ]);

        $usuario = User::create([
            'nombre' => $validado['nombre'],
            'email' => $validado['email'],
            'password' => Hash::make($validado['password']),
            'balance' => 5000,
        ]);
        $token = $usuario->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
    public function ingresar(Request $req)
    {
        if (!Auth::attempt($req->only('email', 'password'))) {
            return response()->json([
                'mensaje' => 'Tus credenciales no coinciden con un usuario existente'
            ], 401);
        }

        $user = User::where('email', $req['email'])->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
    public function salir(Request $req)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => "correcto",
            'msg' => 'Cierre de Sesion'
        ]);
    }

    public function obtenerVideojuegos()
    {
        $data = Videojuego::all();
        return response()->json($data);
    }

    public function obtenerUnVideojuego($id)
    {
        $data = Videojuego::where('id', '=', $id)->first();
        if ($data) {
            return response()->json($data);
        } else {
            return response()->json([
                'msg' => 'No hay videojuegos con este id'
            ]);
        }
    }
    public function borrarVideojuego($id)
    {
        $data = Videojuego::where('id', '=', $id)->first();
        if ($data) {
            Videojuego::destroy($id);
            return response()->json([
                'msg' => 'Videojuego con id:' . $id . ' eliminado  correctamente'
            ]);
        } else {
            return response()->json([
                'msg' => 'No hay videojuegos con este id'
            ]);
        }
    }
    public function crearVideojuego(Request $req)
    {
        $validado = $req->validate([
            "nombre" => "required|max:255",
            "descripcion" => "required",
            "precio" => "required|numeric|gt:0",
            "genero" => "required|max:255"
        ]);
        $nuevoVideojuego = new Videojuego();
        $nuevoVideojuego->setName($validado['nombre']);
        $nuevoVideojuego->setDescription($validado['descripcion']);
        $nuevoVideojuego->setPrice($validado['precio']);
        $nuevoVideojuego->setImage("safe.png");
        $nuevoVideojuego->setGenero($validado['genero']);
        $nuevoVideojuego->save();
        return response()->json([
            'msg' => 'videojuego creado correctamente',
            'videojuego' => $nuevoVideojuego
        ]);
    }
    public function actualizarVideojuego(Request $req, $id)
    {
        $validado = $req->validate([
            "nombre" => "required|max:255",
            "descripcion" => "required",
            "precio" => "required|numeric|gt:0",
            "genero" => "required|max:255"
        ]);
        $videojuegoActualizado = Videojuego::find($id);

        if ($videojuegoActualizado) {
            $videojuegoActualizado->setName($validado['nombre']);
            $videojuegoActualizado->setDescription($validado['descripcion']);
            $videojuegoActualizado->setPrice($validado['precio']);
            $videojuegoActualizado->setGenero($validado['genero']);
            $videojuegoActualizado->save();
            return response()->json([
                'msg' => 'videojuego actualizado correctamente',
                'videojuego' => $videojuegoActualizado
            ]);
        }else{
            return response()->json([
                'msg' => 'No se encontro un videojuego con ese id',
            ]);
        }
    }
}

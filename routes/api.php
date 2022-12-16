<?php

use App\Http\Controllers\API\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get("/hola", function (Request $req) {
    return response()->json(['xd']);
});
Route::post("/registro", [ApiController::class, 'registro']);
Route::post("/ingresar", [ApiController::class, 'ingresar']);

//rutas de videojuego sin necesidad de autenticarse
Route::get("/videojuegos", [ApiController::class, 'obtenerVideojuegos']);
Route::get("/videojuegos/{id}", [ApiController::class, 'obtenerUnVideojuego']);

Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::get("/logout", [ApiController::class, 'salir']);
    //rutas de videojuego con necesidad de autenticarse
    Route::delete("/videojuegos/borrar/{id}", [ApiController::class, 'borrarVideojuego']);
    Route::post("/videojuegos/crear", [ApiController::class, 'crearVideojuego']);
    Route::put("/videojuegos/actualizar/{id}", [ApiController::class, 'actualizarVideojuego']);
});

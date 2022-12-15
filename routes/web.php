<?php

use App\Http\Controllers\admin\AdminInicioController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VideojuegoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\MiCuentaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [VideojuegoController::class, 'index'])->name('videojuego.index');
Route::get('/videojuego/{id}', [VideojuegoController::class, 'show'])->name('videojuego.show');
Route::get('/videojuego/categoria/{categoria}', [VideojuegoController::class, 'filtroCategorias'])->name('videojuego.categorias');
Route::get('/videojuego/precio/min={min}&max={max}', [VideojuegoController::class, 'filtroPrecios'])->name('videojuego.precio');
Route::post('/videojuego/buscarVideojuego', [VideojuegoController::class, 'buscarVideojuego'])->name('videojuego.buscar');


//carrito
Route::get('/cart', [CarritoController::class, 'index'])->name("carrito.index");
Route::get('/cart/delete', [CarritoController::class, 'eliminarCarrito'])->name("carrito.delete");
Route::post('/cart/add/{id}', [CarritoController::class, 'agregarAlCarrito'])->name("carrito.add");

//Middleware auth 
Route::middleware('auth')->group(function () {
    Route::get('/carito/comprar', [CarritoController::class,'comprar'])->name("carrito.comprar");
    Route::get('/micuenta/compras', [MiCuentaController::class, 'compras'])->name("micuenta.compras");
    });

//admin
Route::middleware('admin')->group(function(){
Route::get('/admin', [AdminInicioController::class, 'index'] )->name('admin.videojuego.index');
Route::post('/admin/videojuego/store', [AdminInicioController::class,'store'])->name('admin.videojuego.store');
Route::delete('admin/videojuego/{id}', [AdminInicioController::class, 'delete'])->name('admin.videojuego.delete');
Route::get('/admin/videojuego/{id}/edit', [AdminInicioController::class, 'edit'])->name('admin.videojuego.edit');
Route::put('/admin/videojuego/{id}/update', [AdminInicioController::class, 'update'])->name('admin.videojuego.update');
Route::get('/admin/compras', [AdminInicioController::class, 'compras'])->name('admin.compras');
Route::get('/admin/usuarios', [AdminInicioController::class, 'usuarios'])->name('admin.usuarios');
});
Auth::routes();




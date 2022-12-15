<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public static function validate($request)
    {
        $request->validate([
            "precio" => "required|numeric|gt:0",
            "cantidad" => "required|numeric|gt:0",
            "videojuego_id" => "required|exists:videojuego,id",
            "compra_id" => "required|exists:compra,id",
        ]);
    }
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getQuantity()
    {
        return $this->attributes['cantidad'];
    }
    public function setQuantity($quantity)
    {
        $this->attributes['cantidad'] = $quantity;
    }
    public function getPrice()
    {
        return $this->attributes['precio'];
    }
    public function setPrice($price)
    {
        $this->attributes['precio'] = $price;
    }
    public function getCompraID()
    {
        return $this->attributes['compra_id'];
    }
    public function setCompraId($compraID)
    {
        $this->attributes['compra_id'] = $compraID;
    }
    public function getVideojuegoId()
    {
        return $this->attributes['videojuego_id'];
    }
    public function setVideojuegoId($videojuegoID)
    {
        $this->attributes['videojuego_id'] = $videojuegoID;
    }
    public function getCreatedAt()
    {
        return $this->attributes['created_at'];
    }
    public function setCreatedAt($createdAt)
    {
        $this->attributes['created_at'] = $createdAt;
    }
    public function getUpdatedAt()
    {
        return $this->attributes['updated_at'];
    }
    public function setUpdatedAt($updatedAt)
    {
        $this->attributes['updated_at'] = $updatedAt;
    }
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
    public function getCompra()
    {
        return $this->compra;
    }
    public function setCompra($compra)
    {
        $this->compra = $compra;
    }
    public function videojuego()
    {
        return $this->belongsTo(Videojuego::class);
    }
    public function getVideojuego()
    {
        return $this->videojuego;
    }
    public function setVideojuego($videojuego)
    {
        $this->videojuego = $videojuego;
    }
}

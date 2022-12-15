<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

   

    public static function validate($request)
    {
        $request->validate([
            "nombre" => "required|max:255",
            "descripcion" => "required",
            "precio" => "required|numeric|gt:0",
            "imagen" => "image",
            "genero" => "required|max:255"
        ]);
    }

    public static function sumPreciosCantidad($videojuegos, $videojuegosEnSesion)
    {
        $total = 0;
        foreach ($videojuegos as $videojuego) {
            $total = $total + ($videojuego->getPrice() * $videojuegosEnSesion[$videojuego->getId()]);
        }
        return $total;
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function getItems()
    {
        return $this->items;
    }
    public function setItems($items)
    {
        $this->items = $items;
    }
    public function getId()
    {
        return $this->attributes['id'];
    }
    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }
    public function getName()
    {
        return $this->attributes['nombre'];
    }
    public function setName($name)
    {
        $this->attributes['nombre'] = $name;
    }
    public function getDescription()
    {
        return $this->attributes['descripcion'];
    }
    public function setDescription($description)
    {
        $this->attributes['descripcion'] = $description;
    }
    public function getImage()
    {
        return $this->attributes['imagen'];
    }
    public function setImage($image)
    {
        $this->attributes['imagen'] = $image;
    }
    public function getPrice()
    {
        return $this->attributes['precio'];
    }
    public function setPrice($price)
    {
        $this->attributes['precio'] = $price;
    }
    public function setGenero($genero){
        $this->attributes['genero'] = $genero;
    }   
    public function getGenero(){
        return $this->attributes['genero'];
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
}

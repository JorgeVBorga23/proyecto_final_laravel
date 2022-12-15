<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Videojuego>
 */
class VideojuegoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->word(),
            'descripcion'=>$this->faker->text(),
            'genero'=>$this->faker->randomElement(['Accion', 'Simulador', 'Deportes', 'Belico', 'Carreras', 'Mundo Abierto', 'FPS', 'RPG', 'Estrategia', 'Aventura', 'Arcade']),
            'imagen'=>  $this->faker->numberBetween(1,5) .'.webp',
            'precio'=>$this->faker->numberBetween(1,2000),
        ];
    }
}

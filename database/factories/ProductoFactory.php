<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

                'nombre' => fake()->word(),
                'precio' => fake()->randomDigit(),
                'descripcion' => fake()-> paragraph(),
                'categoria' => $this->faker->randomElement(['gaseosas','lacteos','accesorios']),
                'categoria_id'=>Categoria::inRandomOrder()->first()

        ];
    }
}

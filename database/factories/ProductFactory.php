<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = ['Football', 'Basketball', 'Running shoes', 'Tennis racket'];
        return [
            'name' => $this->faker->randomElement($productNames),
            'description' =>  $this->faker->realText($this->faker->numberBetween(10, 20)),
            'price' => $this->faker->numberBetween(1, 100),
            'stock' => $this->faker->numberBetween(1, 10),
            'category_id' => Category::factory()
        ];
    }
}

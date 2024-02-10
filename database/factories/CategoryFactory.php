<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryNames = ['Sports'];
        return [
            'name' => $this->faker->randomElement($categoryNames),
            'description' => $this->faker->realText($this->faker->numberBetween(10, 20))
        ];
    }
}

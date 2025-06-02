<?php

namespace Database\Factories;

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
        return [
            'name' => fake()->randomElement([
                'Mouse', 'Notebook', 'PC Station', 'Keyboard'
            ]),
            'description' => $this->faker->words(3, true),
            'price' => fake()->numberBetween(800, 100000),
            'category' => fake()->randomElement([
                'Laptop', 'Desktop', 'periphery'
            ]),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6, true),
            'description' => $this->faker->sentences(4, true),
            'surface' => $this->faker->numberBetween(20, 350),
            'rooms' => $this->faker->numberBetween(2, 10),
            'bedrooms' => $this->faker->numberBetween(2, 10),
            'floor' => $this->faker->numberBetween(0, 15),
            'price' => $this->faker->numberBetween(100000, 10000000),
            'city' => $this->faker->city,
            'adress' => $this->faker->address,
            'postal_code' => $this->faker->postcode,
            'sold' => false
        ];
    }

    public function sold(): static
    {
        return $this->state(fn (array $attributes) => [
            'sold' => true,
        ]);
    }
}

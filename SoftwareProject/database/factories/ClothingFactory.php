<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'description' => $this->faker->text(200),
            'clothing_image' => "2023-03-24-105403_White Unisex Hoodie.jpg",
            'price' => $this->faker->randomFloat('2',0,2)
        ];
    }
}
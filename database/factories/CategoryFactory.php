<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = fake()->words(mt_rand(2, 6), true);

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => fake()->words(mt_rand(5, 20), true),
            'image' => fake()->imageUrl(randomize: false, word: $name),
            'nesting_level' => 1,
        ];
    }
}

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
            'banner' => fake()->imageUrl(randomize: false, word: $name),
            'preview_image' => 'https://avatars.mds.yandex.net/get-marketcms/1779479/img-65977b45-43d4-4e91-8e72-55d32079b7eb.png/optimize',
            'icon' => 'https://avatars.mds.yandex.net/get-marketcms/475644/img-dca0991e-e9f8-4d1b-89e4-db2cec0d1d3c.svg/svg',
            'nesting_level' => 1,
            'navigation_only' => false,
        ];
    }
}

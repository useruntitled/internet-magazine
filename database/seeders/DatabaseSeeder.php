<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $brands = Brand::factory()
            ->count(10)
            ->create();

        $categories = Category::factory()
            ->count(10)
            ->create();

        foreach ($categories as $category) {
            $this->makeSubCategories($category, 5);
        }

        Product::factory()
            ->count(50)
            ->state(new Sequence([
                'category_id' => Category::inRandomOrder()->first()->id,
                'brand_id' => array_rand(array_flip($brands->pluck('id')->toArray())),
            ]))
            ->create();
    }

    protected function makeSubCategories($category, $maxLevel): void
    {
        $categories = Category::factory()
            ->count(mt_rand(0, 2))
            ->state([
                'parent_id' => $category->id,
                'nesting_level' => $category->nesting_level + 1,
            ])
            ->create();

        if ($category->nesting_level <= $maxLevel) {
            foreach ($categories as $c) {
                $this->makeSubCategories($c, $maxLevel);
            }
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ProductAttributeType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProductAttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ProductAttributeType::factory()
            ->count(3)
            ->state(new Sequence(
                [
                    'name' => 'color code',
                    'description' => 'HEX color code',
                ],
                [
                    'name' => 'string',
                ],
                [
                    'name' => 'integer',
                ],
            ))
            ->create();
    }
}

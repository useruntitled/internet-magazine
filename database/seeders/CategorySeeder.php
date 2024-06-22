<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $clothesAndShoes = Category::factory()
            ->has(
                Category::factory()
                    ->has(
                        Category::factory()
                            ->count(4)
                            ->state(new Sequence(
                                [
                                    'name' => 'Аксессуары',
                                ],
                                [
                                    'name' => 'Блузы и рубашки',
                                ],
                                [
                                    'name' => 'Боди',
                                ],
                                [
                                    'name' => 'Брюки',
                                ]
                            )),
                        'childrens'
                    )
                ->state([
                    'name' => 'Женщинам',
                    'navigation_only' => true,
                ]),
                    'childrens'
            )
            ->state([
                'name' => 'Одежда и обувь',
                'icon' => '//avatars.mds.yandex.net/get-marketcms/1357599/img-b02c68fb-e35d-487a-a11a-c6e0d0f9e632.svg/svg',
            ])
            ->create();

        Category::factory()
            ->has(
                Category::factory()
                    ->count(2)
                    ->state(new Sequence(
                        [
                            'name' => 'Аксессуары',
                        ],
                        [
                            'name' => 'Брюки'
                        ]
                    )),
                'childrens'
            )
            ->state([
                'name' => 'Мужчинам',
                'parent_id' => $clothesAndShoes->id,
            ])
            ->create();

        Category::factory()
            ->has(
                Category::factory()
                ->count(2)
                ->state(new Sequence(
                    [
                        'name' => 'Мужская обувь',
                    ],
                    [
                        'name' => 'Женская обувь',
                    ]
                )),
                'childrens'
            )
            ->state([
                'name' => 'Обувь',
                'parent_id' => $clothesAndShoes->id,
            ])
            ->create();
    }
}

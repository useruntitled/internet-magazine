@props([
    "categories",
])

<div class="hidenn flex flex-wrap"></div>

<div
    class="flex"
    x-data="{ show: null, categories: {{ json_encode($categories) }} }"
>
    <ul class="border-e-2">
        <template x-for="category in categories" :key="category.id">
            <li
                @mouseenter="show = category.id"
                class="flex items-center justify-between hover:bg-zinc-100 rounded-lg p-2"
                :class="category.id == show ? 'bg-zinc-100' : ''"
            >
                <div class="flex space-x-2 items-center">
                    <span>
                        <img
                            x-bind:src="`${category.icon}`"
                            alt=""
                            class="p-2"
                        />
                    </span>
                    <span x-text="category.name" class="text-md"></span>
                </div>
                <span>
                    <x-heroicon-o-chevron-right class="w-6 h-6" />
                </span>
            </li>
        </template>
    </ul>

    <div x-show="show != null" class="mx-10">
        <div class="fixed">
            <h1
                x-text="categories.find((obj) => obj.id == show)?.name"
                class="text-2xl mb-4 font-bold"
            ></h1>
            <section
                x-show="show != null && categories.find((obj) => obj.id == show)?.childrens.length"
            >
                <ul
                    class="flex flex-row flex-wrap text-md space-x-12 space-y-1"
                >
                    <template
                        x-for="category in categories.find((obj) => obj.id == show)?.childrens"
                    >
                        <li class="mb-6">
                            <a
                                x-bind:href="`/categories/${category.slug}`"
                                x-text="category.name"
                                class="font-bold whitespace-nowrap mb-2"
                            ></a>
                            <ul>
                                <template
                                    x-for="children in category.childrens"
                                >
                                    <li>
                                        <a
                                            x-bind:href="`/categories/${children.slug}`"
                                            x-text="children.name"
                                        ></a>
                                    </li>
                                </template>
                            </ul>
                        </li>
                    </template>
                </ul>
            </section>
        </div>
    </div>
</div>

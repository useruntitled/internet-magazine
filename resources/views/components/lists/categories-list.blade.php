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
                <span x-text="category.name" class="text-md"></span>
                <span>
                    <x-heroicon-o-chevron-right class="w-6 h-6" />
                </span>
            </li>
        </template>
    </ul>

    <div x-show="show != null" class="mx-20">
        <div class="fixed">
            <h1
                x-text="categories.find((obj) => obj.id == show)?.name"
                class="text-2xl mb-4 font-bold"
            ></h1>
            <section
                x-show="show != null && categories.find((obj) => obj.id == show)?.childrens.length"
            >
                <ul
                    class="flex flex-row flew-wrap text-md"
                    style="flex-wrap: wrap"
                >
                    <template
                        x-for="category in categories.find((obj) => obj.id == show)?.childrens"
                    >
                        <li class="mb-6">
                            <p
                                x-text="category.name"
                                class="font-bold me-6 whitespace-nowrap"
                            ></p>
                            <ul>
                                <template
                                    x-for="children in category.childrens"
                                >
                                    <li>
                                        <p x-text="children.name"></p>
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

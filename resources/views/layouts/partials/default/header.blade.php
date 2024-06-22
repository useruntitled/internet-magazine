<header class="w-full bg-white sticky top-0 z-[100]">
    <div
        class="max-w-[90rem] mx-auto flex flex-wrap justify-between space-x-4 items-center py-4"
    >
        <div class="text-3xl">
            <a href="/">Magazine</a>
        </div>
        <div>
            <x-dropdowns.primary width="full">
                <x-slot:trigger>
                    <div class="flex items-center space-x-4">
                        <span>
                            <x-zondicon-menu class="w-6 h-6" />
                        </span>
                        <span>Catalog</span>
                    </div>
                </x-slot>
                <x-slot:content>
                    <div class="max-w-[90rem] mx-auto">
                        <x-lists.categories-list
                            :categories="$menuCategories"
                        />
                    </div>
                </x-slot>
            </x-dropdowns.primary>
        </div>
        <div class="w-[60%]">
            <input
                type="text"
                placeholder="Search products"
                class="w-full border border-2 border-gray-500 hover:border-gray-800 rounded-xl p-2 px-4"
            />
        </div>
        <div>
            <a href="#" class="flex flex-col items-center">
                <span>
                    <x-feathericon-box class="w-8 h-8 stroke-1" />
                </span>
                <span>Orders</span>
            </a>
        </div>
        <div>
            <a href="#" class="flex flex-col items-center">
                <span>
                    <x-hugeicons-favourite class="w-8 h-8 stroke-1" />
                </span>
                <span>Favorite</span>
            </a>
        </div>
        <div>
            <a href="#" class="flex flex-col items-center">
                <x-ik-basket class="w-8 h-8 stroke-1" />
                <span>Basket</span>
            </a>
        </div>
    </div>
</header>

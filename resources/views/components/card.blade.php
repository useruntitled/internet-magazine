@props([
    "product",
])

<div
    class="max-w-sm h-[220px] overflow-hidden rounded-lg dark:bg-gray-800 dark:border-gray-700"
>
    <a href="#">
        <div class="w-full bg-gray-100">
            <img
                class="rounded-lg object-cover mx-auto h-[150px]"
                src="{{ $product["image"] }}"
                alt=""
            />
        </div>
    </a>
    <div class="p-5 py-2">
        <a href="#">
            <h5
                class="mb-1 text-lg font-medium tracking-tight text-gray-900 dark:text-white"
            >
                {{ $product["name"] }}
            </h5>
        </a>
    </div>
    <footer class="px-5 py-[0.5px] bottom-0 sticky bg-white">
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{ $product["price"] }}₽
        </p>
    </footer>
</div>

@props([
    "category",
])

<a href="{{ route("categories.get-by-slug", $category->slug) }}">
    <div
        class="w-[200px] h-[200px] overflow-hidden pt-4 ps-4 rounded-xl bg-stone-100"
    >
        <header>{{ $category->name }}</header>
        <main class="mt-6 flex justify-end">
            @if ($category->preview_image)
                <img
                    src="{{ $category->preview_image }}"
                    alt="preview_item_image"
                    class="object-contain w-[110px] me-[-10px]"
                />
            @endif
        </main>
    </div>
</a>

@extends("layouts.default")
@section("content")
    @if (isset($category->parent))
        <a
            href="{{ route("categories.get-by-slug", $category->parent->slug) }}"
            class="text-sm text-zinc-800 hover:text-red-800"
        >
            {{ $category->parent->name }}
        </a>
    @endif

    <h1 class="text-5xl mt-4">{{ $category->name }}</h1>

    <main class="mt-6 flex flex-row space-x-4">
        @foreach ($category->childrens as $children)
            <x-cards.category-preview-card :category="$children" />
        @endforeach
    </main>
    <footer class="mt-6">
        @foreach ($childrensCategories as $children)
            {{ $children->name }}
        @endforeach
    </footer>
@endsection

@extends("layouts.default")

@section("content")
    <div class="mx-auto mt-6" id="infinite-scroll-container">
        <ul
            class="flex flex-wrap space-y-4 items-center justify-start"
            id="products-list"
        >
            @foreach ($products as $product)
                <li class="mx-2 w-[18%]">
                    <x-card :product="$product" />
                </li>
            @endforeach
        </ul>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
@endsection

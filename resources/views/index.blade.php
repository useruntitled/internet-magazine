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

    <script>
        let isLoading = false;
        let currentPage = 1;

        const productsList = document.querySelector('#products-list');

        document.addEventListener('scroll', async (e) => {
            const container = document.querySelector(
                '#infinite-scroll-container',
            );
            const height = container.scrollHeight;

            const scrollY = window.pageYOffset;

            if (scrollY + height / 2 >= height && !isLoading) {
                console.log('load');
                isLoading = true;
                await loadProducts();
                isLoading.value = false;
            }
        });

        const loadProducts = async () => {
            axios
                .get(`/api/products?page=${currentPage}`)
                .catch((res) => {
                    console.log(res);
                })
                .then((res) => {
                    console.log(res);
                    productsList.appendChild();
                });
        };
    </script>
@endsection

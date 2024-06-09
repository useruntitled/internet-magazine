<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Traits\UseFilters;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    use UseFilters;

    public function get()
    {
        $query = Product::with(['category', 'brand'])
            ->orderBy(...$this->getSorting());

        $this->paginate($query);

        $products = $query->get();

        return response()->json($products);
    }
}

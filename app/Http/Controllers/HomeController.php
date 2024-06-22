<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::with([
            'brand',
            'category',
        ])
            ->latest()
            ->paginate(20);

        return view('index', [
            'products' => $products,
        ]);
    }
}

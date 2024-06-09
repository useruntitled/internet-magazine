<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::with('childrens')
            ->whereHas('childrens')
            ->get();

        foreach ($categories as $category) {
            foreach ($category->childrens as $children) {
                $children->load('childrens');
            }
        }

        $products = Product::with([
            'brand',
            'category',
        ])
            ->latest()
            ->paginate(20);

        return view('index', [
            'categories' => $categories,
            'products' => $products,
        ]);
    }
}

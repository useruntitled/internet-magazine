<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category = Cache::remember("category:slug:$slug", now()->addHours(24), function () use ($slug) {
            return Category::where('slug', $slug)
                ->with(['childrens', 'parent'])
                ->firstOrFail();
        });

        $childrensCategories = [];

        foreach($category->childrens as $children) {
            foreach ($children->childrens as $c) {
                if(! $c->navigation_only) {
                    $childrensCategories[] = $c;
                }
            }
        }

        if(! $category->navigation_only) {
            return view('category.index', [
                'category' => $category,
            ]);
        }

        return view('category.navigation', [
            'category' => $category,
            'childrensCategories' => $childrensCategories,
        ]);
    }
}

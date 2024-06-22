<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        try {
            View::share('menuCategories', Cache::remember('menu-categories', now()->addHours(24), function () {
                $categories = Category::with('childrens')
                    ->whereHas('childrens')
                    ->where('nesting_level', 1)
                    ->get();

                foreach ($categories as $category) {
                    foreach ($category->childrens as $children) {
                        $children->load('childrens');
                    }
                }

                return $categories;
            }));
        }
        catch (\Exception $e) {
        }
    }
}

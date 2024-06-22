<?php

use Illuminate\Support\Facades\Route;


Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

Route::controller(\App\Http\Controllers\CategoryController::class)->group(function () {
    Route::get('/categories/{slug}', 'index')->name('categories.get-by-slug');
});

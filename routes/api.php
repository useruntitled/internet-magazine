<?php
use \Illuminate\Support\Facades\Route;

Route::controller(\App\Http\Controllers\ProductController::class)->group(function () {
   Route::get('products', 'get')->name('products');
});

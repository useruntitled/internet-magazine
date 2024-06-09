<?php

use Illuminate\Support\Facades\Route;

//Route::get('/', function () {
//    return view('index');
//})->name('home');

Route::controller(\App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
});

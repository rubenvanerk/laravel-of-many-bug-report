<?php

use App\Models\Brand;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $cheapestProduct = Brand::query()->first()->cheapestProduct;
    $actuallyCheapestProduct = \App\Models\Product::query()->whereHas('category', function ($query) {
        $query->where('published', 1);
    })->orderBy('price')->first();

    return view('home', compact('cheapestProduct', 'actuallyCheapestProduct'));
});


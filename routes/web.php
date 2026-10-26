<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

// Resource Route untuk CRUD otomatis
Route::resource('products', ProductController::class);
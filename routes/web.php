<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

// Rute utama mengarah ke Dashboard
Route::get('/', [ProductController::class, 'dashboard'])->name('dashboard');

// Resource Route untuk CRUD Produk
Route::resource('products', ProductController::class);

// Resource Route untuk CRUD Kategori
Route::resource('categories', CategoryController::class);
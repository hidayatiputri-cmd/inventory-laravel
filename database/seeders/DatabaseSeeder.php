<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat 5 kategori dan 20 produk dummy
        Category::factory(5)->create();
        Product::factory(20)->create();
    }
}
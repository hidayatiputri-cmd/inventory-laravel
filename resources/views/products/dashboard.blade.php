@extends('layouts.app')

@section('content')
    <h1>Dashboard Inventaris</h1>
    <p style="color: #666; margin-bottom: 20px;">Selamat datang di sistem manajemen inventaris.</p>

    <!-- Navigasi Cepat -->
    <div style="margin-bottom: 25px;">
        <a href="{{ route('products.index') }}" class="btn">→ Kelola Data Produk</a>
    </div>

    <!-- Kotak Statistik Ringkasan -->
    <div style="display: flex; gap: 20px; margin-bottom: 30px;">
        <div style="flex: 1; background: #e9ecef; padding: 20px; border-radius: 6px; border-left: 5px solid #007bff;">
            <h3 style="margin: 0 0 10px 0; color: #333;">Total Produk</h3>
            <p style="font-size: 24px; font-weight: bold; margin: 0; color: #007bff;">{{ $totalProducts }}</p>
        </div>
        <div style="flex: 1; background: #e9ecef; padding: 20px; border-radius: 6px; border-left: 5px solid #28a745;">
            <h3 style="margin: 0 0 10px 0; color: #333;">Total Kategori</h3>
            <p style="font-size: 24px; font-weight: bold; margin: 0; color: #28a745;">{{ $totalCategories }}</p>
        </div>
    </div>

    <!-- Peringatan Stok Menipis -->
    <h2 style="color: #dc3545; font-size: 20px; margin-bottom: 10px;">Peringatan: Stok Produk Menipis</h2>
    
    <table>
        <thead>
            <tr>
                <th>SKU</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Stok Saat Ini</th>
                <th>Stok Minimum</th>
            </tr>
        </thead>
        <tbody>
            @forelse($lowStockProducts as $product)
                <tr style="background: #fff3f3;">
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td><strong style="color: #dc3545;">{{ $product->stock }}</strong></td>
                    <td>{{ $product->minimum_stock }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: #28a745; font-weight: bold;">Aman! Tidak ada produk yang stoknya di bawah batas minimum.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
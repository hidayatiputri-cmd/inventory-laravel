@extends('layouts.app')

@section('content')
    <h1>Tambah Produk Baru</h1>
    <a href="{{ route('products.index') }}" class="btn" style="background: #6c757d; margin-bottom: 20px;">← Kembali</a>

    @if ($errors->any())
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
            <ul style="margin: 0; padding-left: 15px;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        <div style="margin-bottom: 15px;">
            <label for="category_id">Kategori:</label><br>
            <select name="category_id" id="category_id" style="width: 100%; padding: 8px; margin-top: 5px;" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="sku">SKU:</label><br>
            <input type="text" name="sku" id="sku" value="{{ old('sku') }}" style="width: 100%; padding: 8px; margin-top: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="name">Nama Produk:</label><br>
            <input type="text" name="name" id="name" value="{{ old('name') }}" style="width: 100%; padding: 8px; margin-top: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="price">Harga:</label><br>
            <input type="number" name="price" id="price" value="{{ old('price') }}" style="width: 100%; padding: 8px; margin-top: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stock">Stok:</label><br>
            <input type="number" name="stock" id="stock" value="{{ old('stock') }}" style="width: 100%; padding: 8px; margin-top: 5px;" required>
        </div>

        <div style="margin-bottom: 15px;">
            <label for="minimum_stock">Stok Minimum:</label><br>
            <input type="number" name="minimum_stock" id="minimum_stock" value="{{ old('minimum_stock', 5) }}" style="width: 100%; padding: 8px; margin-top: 5px;" required>
        </div>

        <button type="submit" class="btn">Simpan Produk</button>
    </form>
@endsection
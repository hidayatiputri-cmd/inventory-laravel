@extends('layouts.app')

@section('content')
    <h1>Daftar Produk Inventaris</h1>

    <!-- Baris Tombol Tambah dan Form Pencarian -->
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
        <a href="{{ route('products.create') }}" class="btn" style="margin-bottom: 0;">+ Tambah Produk</a>

        <form action="{{ route('products.index') }}" method="GET" style="display: flex; gap: 5px; margin-bottom: 0;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau SKU..." style="padding: 7px; border: 1px solid #ccc; border-radius: 4px;">
            <button type="submit" class="btn" style="padding: 7px 12px; margin-bottom: 0;">Cari</button>
            @if(request('search'))
                <a href="{{ route('products.index') }}" style="padding: 7px 10px; background: #6c757d; color: white; border-radius: 4px; text-decoration: none; display: inline-block;">Reset</a>
            @endif
        </form>
    </div>

    <table>
        <thead>
            <tr>
                <th>SKU</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
                <tr>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product->id) }}" style="color: #ffc107; margin-right: 10px; text-decoration: none; font-weight: bold;">Edit</a>

                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold; padding: 0;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Tidak ada produk yang ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $products->links() }}
    </div>
@endsection
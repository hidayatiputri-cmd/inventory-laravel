@extends('layouts.app')

@section('content')
    <h1>Daftar Produk Inventaris</h1>
    <a href="{{ route('products.create') }}" class="btn">+ Tambah Produk</a>

    <table>
        <thead>
            <tr>
                <th>SKU</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th> <!-- Kolom Aksi -->
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
                        <!-- Tombol Edit -->
                        <a href="{{ route('products.edit', $product->id) }}" style="color: #ffc107; margin-right: 10px; text-decoration: none; font-weight: bold;">Edit</a>

                        <!-- Tombol Hapus -->
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold; padding: 0;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">Belum ada produk.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $products->links() }}
    </div>
@endsection
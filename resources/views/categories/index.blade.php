@extends('layouts.app')

@section('content')
    <h1>Daftar Kategori</h1>
    <div style="margin-bottom: 20px;">
        <a href="{{ route('dashboard') }}" class="btn" style="background: #6c757d;">← Dashboard</a>
        <a href="{{ route('categories.create') }}" class="btn">+ Tambah Kategori</a>
    </div>

    @if(session('error'))
        <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px;">{{ session('error') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nama Kategori</th>
                <th>Jumlah Produk</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->products_count }} Produk</td>
                    <td>
                        <a href="{{ route('categories.edit', $category->id) }}" style="color: #ffc107; margin-right: 10px; text-decoration: none; font-weight: bold;">Edit</a>
                        <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin ingin menghapus kategori ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #dc3545; cursor: pointer; font-weight: bold; padding: 0;">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" style="text-align: center;">Belum ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <div style="margin-top: 20px;">
        {{ $categories->links() }}
    </div>
@endsection
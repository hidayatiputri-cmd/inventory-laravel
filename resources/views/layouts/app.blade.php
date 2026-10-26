<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Laravel</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #fdf2f8; margin: 0; padding: 0; }
        .navbar { background: #1e1b4b; color: white; padding: 15px 25px; display: flex; gap: 20px; align-items: center; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        .navbar .brand { font-size: 18px; font-weight: bold; margin-right: 20px; color: #f472b6; }
        .navbar a { color: #e2e8f0; text-decoration: none; font-weight: 600; transition: color 0.2s; }
        .navbar a:hover { color: #f472b6; }
        .container { max-width: 900px; margin: 30px auto; background: white; padding: 25px; border-radius: 12px; box-shadow: 0 4px 12px rgba(236, 72, 153, 0.1); border-top: 4px solid #3b82f6; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #f1f5f9; padding: 12px; text-align: left; }
        th { background: #eff6ff; color: #1e3a8a; }
        .btn { display: inline-block; padding: 8px 16px; background: linear-gradient(135deg, #3b82f6 0%, #ec4899 100%); color: white; border-radius: 6px; text-decoration: none; font-weight: 600; border: none; cursor: pointer; margin-bottom: 15px; box-shadow: 0 2px 4px rgba(236, 72, 153,.3); transition: opacity 0.2s; }
        .btn:hover { opacity: 0.9; }
        .alert-success { background: #fdf2f8; color: #be185d; padding: 12px; border-radius: 6px; margin-bottom: 15px; border-left: 4px solid #ec4899; }
        h1 { color: #1e1b4b; }
    </style>
</head>
<body>
    <!-- Navbar Atas -->
    <div class="navbar">
        <span class="brand">📦 Inventory App</span>
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <a href="{{ route('products.index') }}">Kelola Produk</a>
        <a href="{{ route('categories.index') }}">Kelola Kategori</a>
    </div>

    <!-- Konten Utama -->
    <div class="container">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @yield('content')
    </div>
</body>
</html>
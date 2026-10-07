<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Katalog Produk')</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f6f8; }
        nav { background: #1f2d3d; padding: 12px 24px; }
        nav a { color: #fff; margin-right: 18px; text-decoration: none; }
        .container { max-width: 960px; margin: 24px auto; background: #fff; padding: 24px; border-radius: 8px; }
        table { width: 100%; border-collapse: collapse; margin: 12px 0; }
        th, td { border: 1px solid #ddd; padding: 8px; font-size: 14px; text-align: left; }
        th { background: #f0f0f0; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn { display: inline-block; padding: 6px 12px; background: #2563eb; color: #fff; border: 0; border-radius: 4px; text-decoration: none; cursor: pointer; font-size: 14px; }
        .btn-red { background: #dc2626; }
        .btn-gray { background: #6b7280; }
        .alert { padding: 10px; border-radius: 4px; margin-bottom: 12px; }
        .alert-ok { background: #d1fae5; }
        .alert-err { background: #fee2e2; }
        .row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 10px; }
    </style>
</head>
<body>
    <nav>
        <a href="{{ route('products.index') }}">Produk</a>
        <a href="{{ route('brands.index') }}">Merek</a>
    </nav>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-ok">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-err">
                <ul>@foreach ($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
            </div>
        @endif
        @yield('content')
    </div>
</body>
</html>
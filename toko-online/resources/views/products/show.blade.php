@extends('layouts.app')
@section('title', $product->nama)
@section('content')
    <h2>{{ $product->nama }}</h2>
    <p>
        <b>Merek:</b> {{ $product->brand->nama }}<br>
        <b>Harga:</b> Rp {{ number_format($product->harga, 0, ',', '.') }}<br>
        <b>Berat:</b> {{ $product->berat }} g<br>
        <b>Dimensi (P x L x T):</b> {{ $product->panjang ?? '-' }} x {{ $product->lebar ?? '-' }} x {{ $product->tinggi ?? '-' }} cm<br>
        <b>Deskripsi:</b> {{ $product->deskripsi ?? '-' }}
    </p>
    <a href="{{ route('products.edit', $product) }}" class="btn btn-gray">Edit Produk</a>
    <a href="{{ route('products.index') }}" class="btn btn-gray">Kembali</a>

    <h3>Varian</h3>
    <table>
        <tr><th>Warna</th><th>Ukuran</th><th>Stok</th><th>Harga</th><th>Aksi</th></tr>
        @forelse ($product->variants as $v)
            <tr>
                <td>{{ $v->warna ?? '-' }}</td>
                <td>{{ $v->ukuran ?? '-' }}</td>
                <td>{{ $v->stok }}</td>
                <td>{{ $v->harga ? 'Rp ' . number_format($v->harga, 0, ',', '.') : 'Ikut harga produk' }}</td>
                <td>
                    <form action="{{ route('variants.destroy', $v) }}" method="POST" onsubmit="return confirm('Hapus varian ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-red">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Belum ada varian.</td></tr>
        @endforelse
    </table>

    <h4>Tambah Varian</h4>
    <form action="{{ route('variants.store', $product) }}" method="POST">
        @csrf
        <div class="row">
            <div><label>Warna</label><input type="text" name="warna"></div>
            <div><label>Ukuran</label><input type="text" name="ukuran"></div>
            <div><label>Stok</label><input type="number" name="stok" value="0" required></div>
            <div><label>Harga (opsional)</label><input type="number" step="0.01" name="harga"></div>
        </div>
        <br><button class="btn">Tambah Varian</button>
    </form>
@endsection
@extends('layouts.app')
@section('title', 'Daftar Produk')
@section('content')
    <h2>Katalog Produk</h2>
    <a href="{{ route('products.create') }}" class="btn">+ Tambah Produk</a>
    <table>
        <tr><th>No</th><th>Nama</th><th>Merek</th><th>Harga</th><th>Berat</th><th>Varian</th><th>Aksi</th></tr>
        @forelse ($products as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->brand->nama }}</td>
                <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                <td>{{ $p->berat }} g</td>
                <td>{{ $p->variants_count }}</td>
                <td>
                    <a href="{{ route('products.show', $p) }}" class="btn">Detail</a>
                    <a href="{{ route('products.edit', $p) }}" class="btn btn-gray">Edit</a>
                    <form action="{{ route('products.destroy', $p) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus produk ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-red">Hapus</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="7">Belum ada produk.</td></tr>
        @endforelse
    </table>
@endsection
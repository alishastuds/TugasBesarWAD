@extends('layouts.app')
@section('title', 'Tambah Produk')
@section('content')
    <h2>Tambah Produk</h2>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        @include('products._form')
    </form>
@endsection
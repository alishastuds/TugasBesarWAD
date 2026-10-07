@extends('layouts.app')
@section('title', 'Edit Produk')
@section('content')
    <h2>Edit Produk</h2>
    <form action="{{ route('products.update', $product) }}" method="POST">
        @csrf @method('PUT')
        @include('products._form')
    </form>
@endsection
<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class ProductVariantController extends Controller
{
    public function store(Request $request, Product $product)
    {
        $data = $request->validate([
            'warna'  => 'nullable|string|max:100',
            'ukuran' => 'nullable|string|max:100',
            'stok'   => 'required|integer|min:0',
            'harga'  => 'nullable|numeric|min:0',
        ]);
        $product->variants()->create($data);
        return back()->with('success', 'Varian ditambahkan.');
    }

    public function destroy(ProductVariant $variant)
    {
        $variant->delete();
        return back()->with('success', 'Varian dihapus.');
    }
}
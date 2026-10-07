<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private function rules(): array
    {
        return [
            'brand_id'  => 'required|exists:brands,id',
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'harga'     => 'required|numeric|min:0',
            'berat'     => 'required|integer|min:1',
            'panjang'   => 'nullable|numeric|min:0',
            'lebar'     => 'nullable|numeric|min:0',
            'tinggi'    => 'nullable|numeric|min:0',
        ];
    }

    public function index()
    {
        $products = Product::with('brand')->withCount('variants')->latest()->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $brands = Brand::orderBy('nama')->get();
        return view('products.create', compact('brands'));
    }

    public function store(Request $request)
    {
        $product = Product::create($request->validate($this->rules()));
        return redirect()->route('products.show', $product)
            ->with('success', 'Produk ditambahkan. Silakan tambah varian.');
    }

    public function show(Product $product)
    {
        $product->load('brand', 'variants');
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $brands = Brand::orderBy('nama')->get();
        return view('products.edit', compact('product', 'brands'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->validate($this->rules()));
        return redirect()->route('products.show', $product)->with('success', 'Produk berhasil diperbarui.');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::withCount('products')->latest()->get();
        return view('brands.index', compact('brands'));
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        Brand::create($request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]));
        return redirect()->route('brands.index')->with('success', 'Merek berhasil ditambahkan.');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $brand->update($request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]));
        return redirect()->route('brands.index')->with('success', 'Merek berhasil diperbarui.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();
        return redirect()->route('brands.index')->with('success', 'Merek berhasil dihapus.');
    }
}
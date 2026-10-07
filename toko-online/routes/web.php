<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('products.index'));

Route::resource('brands', BrandController::class)->except('show');
Route::resource('products', ProductController::class);

Route::post('products/{product}/variants', [ProductVariantController::class, 'store'])->name('variants.store');
Route::delete('variants/{variant}', [ProductVariantController::class, 'destroy'])->name('variants.destroy');
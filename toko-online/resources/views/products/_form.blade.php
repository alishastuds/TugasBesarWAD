<label>Merek</label>
<select name="brand_id" required>
    <option value="">-- Pilih merek --</option>
    @foreach ($brands as $b)
        <option value="{{ $b->id }}" @selected(old('brand_id', $product->brand_id ?? '') == $b->id)>{{ $b->nama }}</option>
    @endforeach
</select>

<label>Nama Produk</label>
<input type="text" name="nama" value="{{ old('nama', $product->nama ?? '') }}" required>

<label>Deskripsi</label>
<textarea name="deskripsi" rows="3">{{ old('deskripsi', $product->deskripsi ?? '') }}</textarea>

<div class="row">
    <div><label>Harga (Rp)</label><input type="number" step="0.01" name="harga" value="{{ old('harga', $product->harga ?? '') }}" required></div>
    <div><label>Berat (gram)</label><input type="number" name="berat" value="{{ old('berat', $product->berat ?? '') }}" required></div>
</div>
<div class="row">
    <div><label>Panjang (cm)</label><input type="number" step="0.01" name="panjang" value="{{ old('panjang', $product->panjang ?? '') }}"></div>
    <div><label>Lebar (cm)</label><input type="number" step="0.01" name="lebar" value="{{ old('lebar', $product->lebar ?? '') }}"></div>
    <div><label>Tinggi (cm)</label><input type="number" step="0.01" name="tinggi" value="{{ old('tinggi', $product->tinggi ?? '') }}"></div>
</div>

<br>
<button class="btn">Simpan</button>
<a href="{{ route('products.index') }}" class="btn btn-gray">Batal</a>
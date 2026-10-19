@extends('layouts.admin.app')

@section('title', 'Edit Produk')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 p-4" style="border-radius: 12px;">
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <h4 class="fw-bold text-dark mb-0">Edit Produk</h4>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Kembali</a>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Nama Produk</label>
                    <input type="text" class="form-control" name="nama_produk" required value="{{ old('nama_produk', $product->nama_produk) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Kategori</label>
                    <input type="text" class="form-control" name="kategori" required value="{{ old('kategori', $product->kategori) }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Harga (Opsional)</label>
                    <input type="number" class="form-control" name="harga" value="{{ old('harga', $product->harga) }}">
                </div>

                <!-- Input Upload File Gambar Baru -->
                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Pilih Gambar Baru (Opsional)</label>
                    <input type="file" class="form-control" name="gambar" accept="image/*">
                    <small class="text-muted mt-1 d-block">
                        Gambar saat ini: <strong>{{ $product->gambar }}</strong> <br>
                        <em>(Kosongkan jika tidak ingin mengganti gambar produk)</em>
                    </small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold small text-secondary">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Aktif" {{ old('status', $product->status) == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="Nonaktif" {{ old('status', $product->status) == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold small text-secondary">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="4" required>{{ old('deskripsi', $product->deskripsi) }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary fw-bold px-4 py-2" style="background-color: #0d233a; border-color: #0d233a; border-radius: 8px;">
                        Perbarui Produk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@extends('layouts.admin.app')

@section('title', $gallery->exists ? 'Edit Foto Galeri' : 'Tambah Foto Galeri')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="fw-bold mb-4">{{ $gallery->exists ? 'Edit Foto Galeri' : 'Tambah Foto Galeri' }}</h3>

            <div class="card shadow-sm border-0 p-4">
                <form action="{{ $gallery->exists ? route('admin.galleries.update', $gallery) : route('admin.galleries.store') }}"
                      method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($gallery->exists) @method('PUT') @endif

                    <div class="mb-3">
                        <label class="form-label fw-bold">Judul</label>
                        <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror"
                               value="{{ old('judul', $gallery->judul) }}" required>
                        @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Kategori</label>
                        <input type="text" name="kategori" class="form-control @error('kategori') is-invalid @enderror"
                               value="{{ old('kategori', $gallery->kategori) }}" required>
                        @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Gambar {{ $gallery->exists ? '(kosongkan jika tidak diganti)' : '' }}</label>
                        <input type="file" name="gambar" class="form-control @error('gambar') is-invalid @enderror"
                               accept="image/*" {{ $gallery->exists ? '' : 'required' }}>
                        @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror

                        @if($gallery->exists && $gallery->gambar)
                            <img src="{{ asset('images/' . $gallery->gambar) }}" class="mt-2" style="height:100px;border-radius:8px;">
                        @endif
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Keterangan</label>
                        <textarea name="keterangan" rows="4" class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $gallery->keterangan) }}</textarea>
                        @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('admin.galleries.index') }}" class="btn btn-secondary">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.user.app')

@section('title', 'Galeri Kegiatan - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10 text-center">
            <h2 class="fw-bold text-dark">Galeri Kegiatan Perusahaan</h2>
            <p class="text-muted">Dokumentasi kegiatan, program, dan pencapaian PT Solusi Koneksi Anda.</p>
        </div>
    </div>

    <div class="row g-4">
        @forelse($galleries as $gallery)
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100" style="border-radius: 12px; overflow: hidden;">
                <img src="{{ asset('storage/' . $gallery->gambar) }}" class="card-img-top" alt="{{ $gallery->judul }}" style="height: 220px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <span class="badge bg-primary align-self-start mb-2">{{ $gallery->kategori ?? 'Umum' }}</span>
                    <h5 class="fw-bold text-dark mb-0">{{ $gallery->judul }}</h5>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <i class="bi bi-images fs-1 text-muted d-block mb-3"></i>
            <h5 class="text-muted">Belum ada foto galeri yang diunggah.</h5>
        </div>
        @endforelse
    </div>
</div>
@endsection
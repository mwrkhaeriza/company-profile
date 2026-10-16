@extends('layouts.user.app')

@section('title', 'Galeri Kegiatan - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-5">
    <!-- Header Halaman -->
    <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold text-dark">Galeri Dokumentasi</h2>
            <p class="text-muted lead">Dokumentasi kegiatan, proyek instalasi jaringan, dan portofolio layanan PT Solusi Koneksi Anda.</p>
        </div>
    </div>

    <!-- Grid Galeri Foto -->
    <div class="row g-4">
        @forelse($galeri as $item)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 overflow-hidden">
                @if($item->image)
                    <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 250px; object-fit: cover;">
                @else
                    <div class="bg-light text-center d-flex align-items-center justify-content-center text-muted" style="height: 250px;">
                        <i class="bi bi-image fs-1"></i>
                        <span class="ms-2 small">PT Solusi Koneksi Anda</span>
                    </div>
                @endif
                <div class="card-body text-center">
                    <h6 class="card-title fw-bold text-dark mb-0">{{ $item->title }}</h6>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-4 bg-light rounded-3 border">
                <p class="text-muted mb-0">Belum ada dokumentasi galeri yang diunggah saat ini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
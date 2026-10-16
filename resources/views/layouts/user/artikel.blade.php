@extends('layouts.user.app')

@section('title', 'Artikel & Berita - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-5">
    <!-- Header Halaman -->
    <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold text-dark">Artikel & Berita Terbaru</h2>
            <p class="text-muted lead">Informasi seputar perkembangan teknologi, tips jaringan, dan kegiatan terbaru dari PT Solusi Koneksi Anda.</p>
        </div>
    </div>

    <!-- Daftar Artikel -->
    <div class="row g-4">
        @forelse($articles as $article)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0 overflow-hidden">
                @if($article->image)
                    <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 200px; object-fit: cover;">
                @else
                    <div class="bg-light text-center d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                        <i class="bi bi-newspaper fs-1"></i>
                        <span class="ms-2 small">PT Solusi Koneksi Anda</span>
                    </div>
                @endif

                <div class="card-body d-flex flex-column">
                    <small class="text-muted mb-2"><i class="bi bi-calendar-event"></i> {{ $article->created_at->format('d M Y') }}</small>
                    <h5 class="card-title fw-bold text-dark">{{ $article->title }}</h5>
                    <p class="card-text text-muted flex-grow-1">{{ Str::limit($article->content, 100) }}</p>
                    <a href="#" class="btn btn-outline-dark btn-sm mt-3 align-self-start">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-4 bg-light rounded-3 border">
                <p class="text-muted mb-0">Belum ada artikel atau berita yang dipublikasikan saat ini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
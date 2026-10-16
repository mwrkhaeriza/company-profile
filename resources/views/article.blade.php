@extends('layouts.user.app')

@section('title', 'Artikel & Berita - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Artikel & Berita Terbaru</h2>
        <p class="text-muted">Informasi seputar teknologi, tips jaringan, dan perkembangan terbaru PT Solusi Koneksi Anda</p>
    </div>

    <div class="row g-4">
        @forelse($articles as $article)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
                @if(isset($article->gambar) && $article->gambar)
                    <div style="height: 200px; overflow: hidden; background-color: #f8f9fa;">
                        <img src="{{ asset('storage/' . $article->gambar) }}" alt="{{ $article->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                        <i class="bi bi-newspaper fs-1"></i>
                    </div>
                @endif

                <div class="card-body p-4 d-flex flex-column">
                    <h5 class="card-title fw-bold text-dark mb-2">{{ $article->judul }}</h5>
                    <p class="card-text text-muted small mb-3">{{ Str::limit($article->isi ?? $article->konten, 100) }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-white rounded-3 shadow-sm">
                <i class="bi bi-journal-x fs-1 text-muted d-block mb-2"></i>
                <p class="text-muted mb-0">Belum ada artikel yang dipublikasikan saat ini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
@extends('layouts.user.app')

@section('title', 'Produk & Layanan - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Produk & Layanan Unggulan</h2>
        <p class="text-muted">Solusi jaringan fiber optic dan infrastruktur koneksi handal untuk kebutuhan Anda</p>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
                @if(isset($product->gambar) && $product->gambar)
                    <div style="height: 220px; overflow: hidden;">
                        <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama_produk ?? $product->judul }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 220px;">
                        <i class="bi bi-box-seam fs-1"></i>
                    </div>
                @endif

                <div class="card-body p-4">
                    <h5 class="card-title fw-bold text-dark mb-2">{{ $product->nama_produk ?? $product->judul }}</h5>
                    <p class="card-text text-muted small mb-0">{{ $product->deskripsi ?? $product->keterangan }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <p class="text-muted">Belum ada produk atau layanan yang tersedia saat ini.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
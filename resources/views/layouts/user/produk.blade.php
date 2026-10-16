@extends('layouts.user.app')

@section('title', 'Produk & Layanan - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-4">
    <h2 class="fw-bold mb-3">Produk & Layanan Kami</h2>
    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
                <!-- Menampilkan Gambar Produk -->
                @if($product->gambar)
                    <div style="height: 200px; overflow: hidden;">
                        <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                        <i class="bi bi-image fs-1"></i>
                    </div>
                @endif

                <div class="card-body">
                    <h5 class="card-title fw-bold text-dark">{{ $product->nama_produk }}</h5>
                    <!-- Deskripsi ditampilkan penuh tanpa disingkat -->
                    <p class="card-text text-muted small">{{ $product->deskripsi }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <p class="text-muted">Belum ada produk atau layanan yang tersedia saat ini.</p>
        </div>
        @endforelse
    </div>
</div>
@endsection
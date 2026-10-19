@extends('layouts.user.app')

@section('title', 'Produk & Layanan - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-5">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Layanan & Produk Kami</h2>
        <p class="text-muted">Solusi konektivitas jaringan terbaik untuk kebutuhan bisnis Anda</p>
    </div>

    <div class="row g-4">
        @forelse($products as $product)
        <div class="col-md-4">
            <div class="card h-100 shadow-sm border-0" style="border-radius: 12px; overflow: hidden;">
                @if($product->gambar)
                    <div style="height: 200px; overflow: hidden; background-color: #f8f9fa;">
                        @php
                            $pathImages = 'images/' . $product->gambar;
                            $pathStorage = 'storage/' . $product->gambar;
                        @endphp

                        @if(file_exists(public_path($pathImages)))
                            <img src="{{ asset($pathImages) }}" alt="{{ $product->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @elseif(\Illuminate\Support\Str::startsWith($product->gambar, 'products/') || file_exists(public_path($pathStorage)))
                            <img src="{{ asset($pathStorage) }}" alt="{{ $product->nama_produk }}" class="w-100 h-100" style="object-fit: cover;">
                        @else
                            {{-- Fallback default ke folder public/images/ --}}
                            <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover;" onerror="this.onerror=null; this.src='https://via.placeholder.com/400x200?text=Gambar+Tidak+Ada';">
                        @endif
                    </div>
                @else
                    <div class="bg-light d-flex align-items-center justify-content-center text-muted" style="height: 200px;">
                        <i class="bi bi-box-seam fs-1"></i>
                    </div>
                @endif

                <div class="card-body p-4 d-flex flex-column">
                    @if($product->kategori)
                        <span class="badge bg-primary-subtle text-primary mb-2 align-self-start px-3 py-2" style="border-radius: 20px;">{{ $product->kategori }}</span>
                    @endif
                    <h5 class="card-title fw-bold text-dark mb-2">{{ $product->nama_produk }}</h5>
                    <p class="card-text text-muted small flex-grow-1">{{ Str::limit($product->deskripsi, 120, '...') }}</p>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12 text-center py-5">
            <div class="p-5 bg-white rounded-3 shadow-sm">
                <i class="bi bi-box-seam fs-1 text-muted d-block mb-2"></i>
                <p class="text-muted mb-0">Belum ada produk atau layanan yang ditampilkan saat ini.</p>
            </div>
        </div>
        @endforelse
    </div>
</div>
@endsection
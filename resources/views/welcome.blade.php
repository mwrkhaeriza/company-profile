@extends('layouts.user.app')

@section('title', 'Beranda - PT Solusi Koneksi Anda')

@section('content')
<!-- Hero Section -->
<div class="bg-dark text-white py-5 mb-5" style="background: linear-gradient(rgba(13,35,58,0.9), rgba(13,35,58,0.9));">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold mb-3">PT Solusi Koneksi Anda</h1>
        <p class="lead mb-4">Penyedia Solusi Infrastruktur Jaringan & Teknologi Terpercaya</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('products.public') }}" class="btn btn-warning btn-lg fw-bold px-4">Lihat Produk & Layanan</a>
            <a href="{{ route('contacts.public') }}" class="btn btn-outline-light btn-lg px-4">Hubungi Kami</a>
        </div>
    </div>
</div>

<!-- Brief Services -->
<div class="container py-4">
    <div class="text-center mb-5">
        <h2 class="fw-bold text-dark">Layanan Unggulan Kami</h2>
        <p class="text-muted">Kami menghadirkan konektivitas cepat, stabil, dan aman untuk bisnis Anda.</p>
    </div>
    <div class="row g-4 text-center">
        <div class="col-md-4">
            <div class="p-4 bg-white shadow-sm rounded-3 h-100">
                <i class="bi bi-wifi fs-1 text-primary mb-3 d-block"></i>
                <h5 class="fw-bold">Jaringan Fiber Optik</h5>
                <p class="text-muted small">Infrastruktur kabel serat optik dengan kecepatan tinggi tanpa hambatan.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white shadow-sm rounded-3 h-100">
                <i class="bi bi-shield-check fs-1 text-primary mb-3 d-block"></i>
                <h5 class="fw-bold">Keamanan Jaringan</h5>
                <p class="text-muted small">Perlindungan data dan sistem jaringan bisnis dari ancaman siber.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-4 bg-white shadow-sm rounded-3 h-100">
                <i class="bi bi-headset fs-1 text-primary mb-3 d-block"></i>
                <h5 class="fw-bold">Dukungan 24/7</h5>
                <p class="text-muted small">Tim teknisi profesional siap membantu pemeliharaan jaringan kapan saja.</p>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.user.app')

@section('title', 'Profil Perusahaan - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-5">
    <!-- Bagian Judul -->
    <div class="row mb-5">
        <div class="col-lg-8 mx-auto text-center">
            <h2 class="fw-bold text-dark">Tentang PT Solusi Koneksi Anda</h2>
            <p class="text-muted lead">Mitra terpercaya dalam penyediaan infrastruktur jaringan dan solusi teknologi informasi korporat.</p>
        </div>
    </div>

    <!-- Bagian Sejarah / Tentang Kami -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <h4 class="fw-bold text-dark mb-3">Siapa Kami?</h4>
            <p class="text-muted">
                PT Solusi Koneksi Anda adalah perusahaan yang bergerak di bidang penyedia layanan internet korporat (ISP), pengelolaan infrastruktur jaringan (*Managed Service*), serta solusi serat optik (*Fiber Optic*). Kami berkomitmen untuk menghadirkan koneksi yang stabil, cepat, dan handal demi mendukung transformasi digital berbagai instansi dan bisnis di Indonesia.
            </p>
        </div>
        <div class="col-md-6">
            <div class="p-4 bg-light rounded-3 border shadow-sm">
                <h5 class="fw-bold text-dark mb-3">Kenapa Memilih Kami?</h5>
                <ul class="list-unstyled text-muted mb-0">
                    <li class="mb-2">✔️ Dukungan Teknis Profesional 24/7</li>
                    <li class="mb-2">✔️ Jaringan Stabil Berkecepatan Tinggi (Rasio 1:1)</li>
                    <li class="mb-2">✔️ Solusi yang Disesuaikan dengan Kebutuhan Korporat</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Bagian Visi & Misi -->
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 p-4">
                <h4 class="fw-bold text-dark mb-3">Visi Kami</h4>
                <p class="text-muted mb-0">
                    Menjadi penyedia solusi koneksi dan teknologi informasi terdepan dan paling diandalkan di Indonesia yang berorientasi pada kepuasan pelanggan.
                </p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 shadow-sm border-0 p-4">
                <h4 class="fw-bold text-dark mb-3">Misi Kami</h4>
                <ul class="text-muted ps-3 mb-0">
                    <li class="mb-2">Menyediakan infrastruktur jaringan berkualitas tinggi yang aman dan stabil.</li>
                    <li class="mb-2">Memberikan pelayanan prima melalui respons cepat dari tim ahli IT.</li>
                    <li class="mb-2">Mendorong efisiensi operasional klien melalui adopsi teknologi modern.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
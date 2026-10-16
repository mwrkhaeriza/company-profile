@extends('layouts.user.app')

@section('title', 'Profil Perusahaan - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-10 text-center mb-5">
            <h2 class="fw-bold text-dark">Profil Perusahaan</h2>
            <p class="lead text-muted">PT Solusi Koneksi Anda adalah penyedia layanan infrastruktur jaringan dan solusi teknologi terdepan.</p>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm p-4" style="border-radius: 12px;">
                <h4 class="fw-bold text-primary mb-3"><i class="bi bi-eye me-2"></i>Visi Kami</h4>
                <p class="text-muted">Menjadi mitra konektivitas utama yang terpercaya dalam menghadirkan solusi teknologi jaringan berkualitas tinggi, andal, dan berkelanjutan untuk seluruh sektor industri.</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card h-100 border-0 shadow-sm p-4" style="border-radius: 12px;">
                <h4 class="fw-bold text-primary mb-3"><i class="bi bi-bullseye me-2"></i>Misi Kami</h4>
                <ul class="text-muted ps-3 mb-0">
                    <li class="mb-2">Menyediakan infrastruktur jaringan yang stabil dan berskala tinggi.</li>
                    <li class="mb-2">Memberikan pelayanan profesional serta dukungan teknis yang cepat dan responsif.</li>
                    <li>Terus berinovasi mengikuti perkembangan teknologi global.</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
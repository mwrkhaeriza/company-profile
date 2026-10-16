
@extends('layouts.user.app')

@section('title', 'Beranda - PT Solusi Koneksi Anda')

@section('content')
<div class="container">
    <div class="p-5 mb-4 bg-white rounded-3 shadow-sm border">
        <div class="container-fluid py-5">
            <h1 class="display-5 fw-bold text-dark">Selamat Datang di PT Solusi Koneksi Anda</h1>
            <p class="col-md-8 fs-4 text-muted">Penyedia solusi jaringan dan telekomunikasi terpercaya untuk mendukung kemajuan bisnis Anda.</p>
            <a href="/produk" class="btn btn-dark btn-lg mt-2" type="button">Lihat Layanan Kami</a>
        </div>
    </div>
</div>
@endsection
@extends('layouts.user.app')

@section('title', 'Kontak Kami - PT Solusi Koneksi Anda')

@section('content')
<div class="container py-5">
    <!-- Header Halaman -->
    <div class="row mb-5 text-center">
        <div class="col-lg-8 mx-auto">
            <h2 class="fw-bold text-dark">Hubungi Kami</h2>
            <p class="text-muted lead">Punya pertanyaan seputar layanan jaringan atau ingin berkonsultasi mengenai kebutuhan IT perusahaan Anda? Silakan hubungi kami.</p>
        </div>
    </div>

    <div class="row g-5">
        <!-- Informasi Kontak (Kiri) -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm p-4 h-100 bg-light">
                <h4 class="fw-bold text-dark mb-4">Informasi Kontak</h4>
                
                <div class="d-flex mb-4">
                    <div class="me-3 text-primary fs-4">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Alamat Kantor</h6>
                        <p class="text-muted mb-0">Jl. Telekomunikasi No. 1, Gedung Cyber Lt. 3, Jakarta Selatan, Indonesia</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="me-3 text-primary fs-4">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Telepon / WhatsApp</h6>
                        <p class="text-muted mb-0">+62 21 555-0199 / +62 812-3456-7890</p>
                    </div>
                </div>

                <div class="d-flex mb-4">
                    <div class="me-3 text-primary fs-4">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Email Resmi</h6>
                        <p class="text-muted mb-0">info@solusikoneksianda.co.id</p>
                    </div>
                </div>

                <div class="d-flex">
                    <div class="me-3 text-primary fs-4">
                        <i class="bi bi-clock-fill"></i>
                    </div>
                    <div>
                        <h6 class="fw-bold mb-1">Jam Operasional</h6>
                        <p class="text-muted mb-0">Senin - Jumat: 08.00 - 17.00 WIB</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulir Pesan (Kanan) -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm p-4 h-100">
                <h4 class="fw-bold text-dark mb-4">Kirim Pesan kepada Kami</h4>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label fw-bold">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama Anda" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nama@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold">Pesan / Konsultasi</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Tuliskan pesan atau kebutuhan jaringan Anda di sini..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-dark w-100 py-2 fw-bold">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
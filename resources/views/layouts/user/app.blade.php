<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PT Solusi Koneksi Anda')</title>
    <!-- Bootstrap 5 CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column min-vh-100 bg-light">

    <!-- Navbar / Menu Navigasi Utama -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}">PT Solusi Koneksi Anda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('profile.public') }}">Profil Perusahaan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('products.public') }}">Produk / Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('articles.public') }}">Artikel</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('galleries.public') }}">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('contacts.public') }}">Kontak Kami</a></li>
                    <li class="nav-item ms-lg-3"><a class="btn btn-outline-warning btn-sm mt-1" href="/admin/dashboard">Admin Panel</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Konten Dinamis Halaman User -->
    <main class="flex-fill py-4">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-4 mt-auto">
        <div class="container">
            <p class="mb-1 fw-bold">PT Solusi Koneksi Anda</p>
            <p class="mb-0 text-muted small">&copy; 2026 All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
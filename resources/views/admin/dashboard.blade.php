<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Panel PT Solusi Koneksi Anda</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Samping Kiri -->
            <div class="col-md-3 col-lg-2 d-md-block bg-dark text-white min-vh-100 p-3 shadow-sm">
                <h4 class="fw-bold py-3 text-center border-bottom border-secondary text-light">Admin Panel</h4>
                <ul class="nav flex-column gap-2 mt-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white active bg-primary rounded">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.profile.edit') }}" class="nav-link text-white">
                            <i class="bi bi-building me-2"></i> Kelola Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="nav-link text-white">
                            <i class="bi bi-box-seam me-2"></i> Kelola Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.index') }}" class="nav-link text-white">
                            <i class="bi bi-newspaper me-2"></i> Kelola Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.galleries.index') }}" class="nav-link text-white">
                            <i class="bi bi-images me-2"></i> Kelola Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.contacts.index') }}" class="nav-link text-white">
                            <i class="bi bi-chat-dots me-2"></i> Pesan Masuk
                        </a>
                    </li>
                    <li class="nav-item mt-4 pt-3 border-top border-secondary">
                        <a href="{{ url('/') }}" target="_blank" class="nav-link text-info mb-2">
                            <i class="bi bi-globe me-2"></i> Lihat Website
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100 btn-sm"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Area Konten Dashboard Utama -->
            <div class="col-md-9 col-lg-10 px-md-4 py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark">Dashboard Administrator</h2>
                        <p class="text-muted small mb-0">Selamat datang kembali di panel kontrol PT Solusi Koneksi Anda.</p>
                    </div>
                </div>

                <div class="row g-4">
                    <!-- Kotak Info Galeri -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-3" style="border-radius: 12px;">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Total Foto Galeri</h6>
                                <h2 class="fw-bold text-dark mb-3">{{ \App\Models\Gallery::count() }}</h2>
                                <a href="{{ route('admin.galleries.index') }}" class="btn btn-primary btn-sm fw-bold px-3" style="border-radius: 6px;">Kelola Galeri</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kotak Info Produk -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-3" style="border-radius: 12px;">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Total Produk</h6>
                                <h2 class="fw-bold text-dark mb-3">{{ \App\Models\Product::count() }}</h2>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-primary btn-sm fw-bold px-3" style="border-radius: 6px;">Kelola Produk</a>
                            </div>
                        </div>
                    </div>

                    <!-- Kotak Info Artikel -->
                    <div class="col-md-4">
                        <div class="card border-0 shadow-sm p-3" style="border-radius: 12px;">
                            <div class="card-body">
                                <h6 class="text-muted mb-2">Total Artikel</h6>
                                <h2 class="fw-bold text-dark mb-3">{{ \App\Models\Article::count() }}</h2>
                                <a href="{{ route('admin.articles.index') }}" class="btn btn-primary btn-sm fw-bold px-3" style="border-radius: 6px;">Kelola Artikel</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
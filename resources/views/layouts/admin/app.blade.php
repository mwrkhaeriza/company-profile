<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - PT Solusi Koneksi Anda')</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Admin Lengkap -->
            <div class="col-md-3 col-lg-2 d-md-block bg-dark text-white min-vh-100 p-3 shadow-sm">
                <h4 class="fw-bold py-3 text-center border-bottom border-secondary text-light">Admin Panel</h4>
                <ul class="nav flex-column gap-2 mt-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white {{ request()->routeIs('admin.dashboard') ? 'active bg-primary rounded' : '' }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.profile.edit') }}" class="nav-link text-white {{ request()->routeIs('admin.profile.*') ? 'active bg-primary rounded' : '' }}">
                            <i class="bi bi-building me-2"></i> Kelola Profil
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="nav-link text-white {{ request()->routeIs('admin.products.*') ? 'active bg-primary rounded' : '' }}">
                            <i class="bi bi-box-seam me-2"></i> Kelola Produk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.index') }}" class="nav-link text-white {{ request()->routeIs('admin.articles.*') ? 'active bg-primary rounded' : '' }}">
                            <i class="bi bi-newspaper me-2"></i> Kelola Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.galleries.index') }}" class="nav-link text-white {{ request()->routeIs('admin.galleries.*') ? 'active bg-primary rounded' : '' }}">
                            <i class="bi bi-images me-2"></i> Kelola Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.contacts.index') }}" class="nav-link text-white {{ request()->routeIs('admin.contacts.*') ? 'active bg-primary rounded' : '' }}">
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

            <!-- Konten Utama Admin -->
            <div class="col-md-9 col-lg-10 px-md-4 py-4">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
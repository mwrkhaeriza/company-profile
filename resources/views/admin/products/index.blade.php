<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="bg-light">

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar Admin -->
            <div class="col-md-3 col-lg-2 d-md-block bg-dark text-white min-vh-100 p-3">
                <h4 class="fw-bold py-3 text-center border-bottom border-secondary">Admin Panel</h4>
                <ul class="nav flex-column gap-2 mt-3">
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.profile.edit') }}" class="nav-link text-white"><i class="bi bi-building me-2"></i> Kelola Profil</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.products.index') }}" class="nav-link active bg-primary text-white rounded"><i class="bi bi-box-seam me-2"></i> Kelola Produk</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.articles.index') }}" class="nav-link text-white"><i class="bi bi-newspaper me-2"></i> Kelola Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.galleries.index') }}" class="nav-link text-white"><i class="bi bi-images me-2"></i> Kelola Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('admin.contacts.index') }}" class="nav-link text-white"><i class="bi bi-chat-dots me-2"></i> Pesan Masuk</a>
                    </li>
                    <li class="nav-item mt-4">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger w-100 btn-sm"><i class="bi bi-box-arrow-right me-1"></i> Logout</button>
                        </form>
                    </li>
                </ul>
            </div>

            <!-- Konten Utama Produk -->
            <div class="col-md-9 col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark">Kelola Produk PT Solusi Koneksi Anda</h2>
                        <p class="text-muted small mb-0">Tambah, ubah, atau hapus produk layanan perusahaan.</p>
                    </div>
                    <a href="{{ route('admin.products.create') }}" class="btn btn-primary fw-bold px-3 py-2" style="background-color: #0d233a; border: none; border-radius: 8px;">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Produk
                    </a>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card border-0 shadow-sm" style="border-radius: 12px; overflow: hidden;">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <thead class="table-dark" style="background-color: #0d233a;">
                                    <tr>
                                        <th class="py-3 ps-4" style="width: 5%;">No</th>
                                        <th class="py-3" style="width: 20%;">Foto Produk</th>
                                        <th class="py-3" style="width: 30%;">Nama Produk</th>
                                        <th class="py-3" style="width: 20%;">Kategori</th>
                                        <th class="py-3 text-center" style="width: 25%;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($products as $index => $product)
                                    <tr>
                                        <td class="ps-4 fw-bold text-secondary">{{ $index + 1 }}</td>
                                        <td>
                                            @if($product->gambar)
                                                <img src="{{ asset('storage/' . $product->gambar) }}" alt="" class="img-thumbnail shadow-sm" style="width: 90px; height: 60px; object-fit: cover; border-radius: 8px;">
                                            @else
                                                <span class="badge bg-secondary">Tidak ada foto</span>
                                            @endif
                                        </td>
                                        <td>
                                            <span class="fw-bold text-dark">{{ $product->nama_produk }}</span>
                                        </td>
                                        <td>
                                            <span class="badge bg-info text-dark px-2 py-1">{{ $product->kategori ?? 'Umum' }}</span>
                                        </td>
                                        <td class="text-center">
                                            <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning text-white fw-bold px-3 me-1" style="border-radius: 6px;">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger fw-bold px-3" style="border-radius: 6px;">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="bi bi-box-seam fs-1 d-block mb-2 text-secondary"></i>
                                            <p class="mb-0">Belum ada produk yang ditambahkan.</p>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
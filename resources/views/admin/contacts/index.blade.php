<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk - Admin Panel</title>
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
                        <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
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
                        <a href="{{ route('admin.contacts.index') }}" class="nav-link text-white active bg-primary rounded">
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

            <!-- Konten Utama Pesan Masuk -->
            <div class="col-md-9 col-lg-10 px-md-4 py-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="fw-bold text-dark">Pesan Masuk dari Pengunjung</h2>
                        <p class="text-muted small mb-0">Daftar pesan dan pertanyaan yang dikirimkan melalui form kontak website.</p>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
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
                                        <th class="py-3" style="width: 20%;">Pengirim</th>
                                        <th class="py-3" style="width: 20%;">Subjek</th>
                                        <th class="py-3" style="width: 35%;">Pesan</th>
                                        <th class="py-3 text-center" style="width: 20%;">Aksi / Balas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($contacts as $index => $contact)
                                    <tr>
                                        <td class="ps-4 fw-bold text-secondary">{{ $index + 1 }}</td>
                                        <td>
                                            <span class="fw-bold text-dark d-block">{{ $contact->nama }}</span>
                                            <small class="text-muted">{{ $contact->email }}</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-secondary">{{ $contact->subjek }}</span>
                                        </td>
                                        <td>
                                            <p class="mb-0 text-muted small">{{ $contact->pesan }}</p>
                                        </td>
                                        <td class="text-center">
                                            <!-- Tombol untuk membalas langsung lewat email pengirim -->
                                            <a href="mailto:{{ $contact->email }}?subject=Balasan: {{ $contact->subjek }}" class="btn btn-sm btn-success text-white fw-bold px-2 me-1 mb-1" style="border-radius: 6px;">
                                                <i class="bi bi-envelope-fill"></i> Balas
                                            </a>
                                            <!-- Tombol Hapus Pesan -->
                                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus pesan ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger fw-bold px-2 mb-1" style="border-radius: 6px;">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-5 text-muted">
                                            <i class="bi bi-chat-dots fs-1 d-block mb-2 text-secondary"></i>
                                            <p class="mb-0">Belum ada pesan masuk dari pengunjung.</p>
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
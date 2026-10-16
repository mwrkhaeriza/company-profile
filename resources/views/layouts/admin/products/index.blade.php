@extends('layouts.admin.app')

@section('title', 'Kelola Produk')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold text-dark mb-1">Kelola Produk</h3>
        <p class="text-muted small mb-0">Tambahkan, ubah, atau hapus produk PT Solusi Koneksi Anda</p>
    </div>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary fw-bold px-3 py-2" style="background-color: #0d233a; border-color: #0d233a; border-radius: 8px;">
        <i class="bi bi-plus-lg me-1"></i> Tambah Produk
    </a>
</div>

<div class="card shadow-sm border-0 p-4" style="border-radius: 12px;">
    <div class="table-responsive">
        <table class="table table-borderless align-middle">
            <thead>
                <tr class="text-secondary small border-bottom">
                    <th scope="col" width="15%" class="pb-3">Foto</th>
                    <th scope="col" width="35%" class="pb-3">Nama Produk</th>
                    <th scope="col" width="20%" class="pb-3">Kategori</th>
                    <th scope="col" width="15%" class="pb-3">Status</th>
                    <th scope="col" width="15%" class="pb-3 text-end">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                <tr class="border-bottom">
                    <td class="py-3">
                        @if($product->gambar)
                            <div style="width: 70px; height: 70px; overflow: hidden; border-radius: 8px;" class="shadow-sm">
                                <img src="{{ asset('images/' . $product->gambar) }}" alt="{{ $product->nama_produk }}" style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                        @else
                            <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted" style="width: 70px; height: 70px;">
                                <i class="bi bi-image fs-4"></i>
                            </div>
                        @endif
                    </td>
                    <td class="py-3">
                        <div class="fw-bold text-dark mb-1">{{ $product->nama_produk }}</div>
                        <small class="text-muted">{{ Str::limit($product->deskripsi, 60) }}</small>
                    </td>
                    <td class="py-3 text-secondary">{{ $product->kategori }}</td>
                    <td class="py-3">
                        @if($product->status == 'Aktif')
                            <span class="fw-bold text-success">Aktif</span>
                        @else
                            <span class="fw-bold text-danger">Nonaktif</span>
                        @endif
                    </td>
                    <td class="py-3 text-end">
                        <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-link text-warning p-1 me-2" title="Edit">
                            <i class="bi bi-pencil fs-5"></i>
                        </a>
                        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger p-1 border-0 bg-transparent" title="Hapus">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center py-5 text-muted">Belum ada produk yang ditambahkan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
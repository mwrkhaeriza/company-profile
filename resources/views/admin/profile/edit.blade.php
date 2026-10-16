@extends('layouts.admin.app')

@section('title', 'Kelola Profil Perusahaan')

@section('content')
<div class="row">
    <div class="col-md-10">
        <div class="card shadow-sm border-0 p-4">
            <div class="mb-4">
                <h3 class="fw-bold text-dark">Kelola Profil</h3>
                <p class="text-muted small">Ubah informasi perusahaan yang tampil di halaman publik</p>
            </div>

            <form action="{{ route('admin.profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary small">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" value="{{ $profile->nama_perusahaan ?? '' }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary small">Slogan / Deskripsi Singkat</label>
                    <input type="text" class="form-control" name="slogan" value="{{ $profile->slogan ?? '' }}">
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary small">Tentang Kami</label>
                    <textarea class="form-control" name="tentang_kami" rows="4">{{ $profile->tentang_kami ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary small">Visi</label>
                    <textarea class="form-control" name="visi" rows="2">{{ $profile->visi ?? '' }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold text-secondary small">Misi</label>
                    <textarea class="form-control" name="misi" rows="3">{{ $profile->misi ?? '' }}</textarea>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-secondary small">No. Telepon</label>
                        <input type="text" class="form-control" name="telepon" value="{{ $profile->telepon ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold text-secondary small">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $profile->email ?? '' }}">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-bold text-secondary small">Alamat Kantor</label>
                    <textarea class="form-control" name="alamat" rows="2">{{ $profile->alamat ?? '' }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary px-4 fw-bold" style="background-color: #0d233a; border-color: #0d233a;">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
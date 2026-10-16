<?php
@extends('layouts.admin.app')

@section('title', 'Tambah Produk')

@section('content')
<div class="container py-2">
    <h2 class="mb-4">Tambah Produk Baru</h2>
    <div class="card border-0 shadow-sm p-4 bg-white">
        <form action="{{ route('admin.products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Produk / Layanan</label>
                <input type="text" name="name" class="form-control" required placeholder="Contoh: Internet Dedicated">
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="4" required placeholder="Tuliskan deskripsi layanan..."></textarea>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-save me-1"></i> Simpan</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
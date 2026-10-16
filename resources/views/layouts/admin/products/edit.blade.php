<?php
@extends('layouts.admin.app')

@section('title', 'Edit Produk')

@section('content')
<div class="container py-2">
    <h2 class="mb-4">Edit Produk / Layanan</h2>
    <div class="card border-0 shadow-sm p-4 bg-white">
        <form action="{{ route('admin.products.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label fw-bold">Nama Produk / Layanan</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea name="description" class="form-control" rows="4" required>{{ $product->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle me-1"></i> Perbarui</button>
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
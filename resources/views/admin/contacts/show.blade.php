@extends('layouts.admin.app')

@section('title', 'Detail Pesan')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-9">
        <div class="card shadow-sm border-0 p-4" style="border-radius: 12px;">
            <div class="d-flex justify-content-between align-items-center mb-4 border-bottom pb-3">
                <div>
                    <h4 class="fw-bold text-dark mb-1">{{ $contact->subjek }}</h4>
                    <p class="text-muted small mb-0">Dikirim pada {{ $contact->created_at->format('d F Y, H:i') }} WIB</p>
                </div>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary btn-sm">&larr; Kembali</a>
            </div>

            <div class="mb-4">
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold text-secondary">Pengirim:</div>
                    <div class="col-sm-9 text-dark fw-semibold">{{ $contact->nama }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-3 fw-bold text-secondary">Email:</div>
                    <div class="col-sm-9 text-dark"><a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a></div>
                </div>
            </div>

            <div class="p-3 bg-light rounded-3 mb-4 border">
                <h6 class="fw-bold text-secondary mb-2 small text-uppercase">Isi Pesan:</h6>
                <p class="text-dark mb-0" style="white-space: pre-line;">{{ $contact->pesan }}</p>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <a href="mailto:{{ $contact->email }}?subject=Re: {{ $contact->subjek }}" class="btn btn-primary fw-bold px-3 py-2" style="background-color: #0d233a; border-color: #0d233a;">
                    <i class="bi bi-reply-fill me-1"></i> Balas via Email
                </a>

                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pesan ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-outline-danger">Hapus Pesan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
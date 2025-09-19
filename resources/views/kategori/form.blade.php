@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 text-dark">
        <i class="bi bi-folder-fill text-success"></i> Kategori Surat 
        <span class="text-muted">>> {{ isset($kategori) ? 'Edit' : 'Tambah' }}</span>
    </h2>
    <p class="mb-4 text-secondary">
        Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol 
        <b>"Simpan"</b>.
    </p>

    {{-- Pesan error --}}
    @if ($errors->any())
        <div class="alert alert-danger border-2" style="border-color: var(--color-border);">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm p-4 border-2" style="border-color: var(--color-border); border-radius: 12px;">
        <form action="{{ isset($kategori) ? route('kategori.update', $kategori->id) : route('kategori.store') }}" method="POST">
            @csrf
            @if(isset($kategori))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-hash text-muted"></i> ID (Auto Increment)
                </label>
                <input type="text" class="form-control" 
                       value="{{ $kategori->id ?? 'Auto' }}" disabled>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-tag-fill text-muted"></i> Nama Kategori
                </label>
                <input type="text" name="nama_kategori" class="form-control"
                    value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">
                    <i class="bi bi-card-text text-muted"></i> Keterangan
                </label>
                <textarea name="judul" class="form-control" rows="3">{{ old('judul', $kategori->judul ?? '') }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('kategori.index') }}" class="btn btn-outline-dark kembali-btn">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save2-fill"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Custom CSS untuk efek hover --}}
<style>
    .kembali-btn:hover {
        background-color: #000;
        color: #fff;
    }
</style>
@endsection

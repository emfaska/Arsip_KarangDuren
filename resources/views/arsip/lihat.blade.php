@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 text-dark">
        <i class="bi bi-eye-fill text-success"></i> Arsip Surat 
        <span class="text-muted">>> Lihat</span>
    </h2>

    <!-- Detail Arsip -->
    <div class="card p-4 mb-3 shadow-sm border-2" style="border-color: var(--color-border); border-radius: 12px;">
        <p class="mb-2">
            <i class="bi bi-hash"></i> <b>Nomor</b>: {{ $arsip->nomor_surat }}
        </p>
        <p class="mb-2">
            <i class="bi bi-folder-fill text-success"></i> <b>Kategori</b>: {{ $arsip->kategori->nama_kategori ?? '-' }}
        </p>
        <p class="mb-2">
            <i class="bi bi-card-text"></i> <b>Judul</b>: {{ $arsip->judul }}
        </p>
        <p class="mb-0">
            <i class="bi bi-clock-history"></i> <b>Waktu Unggah</b>: {{ $arsip->waktu_pengarsipan }}
        </p>
    </div>

    <!-- Preview Arsip -->
    <div class="card shadow-sm border-2 mb-3" style="border-color: var(--color-border); border-radius: 12px;">
        <iframe src="{{ asset('storage/'.$arsip->file_surat) }}" width="100%" height="500px" style="border: none; border-radius: 12px;"></iframe>
    </div>

    <!-- Tombol Aksi -->
    <div class="d-flex justify-content-between">
        <a href="{{ route('arsip.index') }}" class="btn btn-outline-dark">
            <i class="bi bi-arrow-left-circle"></i> Kembali
        </a>
        <div>
            <a href="{{ route('arsip.download',$arsip->id) }}" class="btn btn-warning">
                <i class="bi bi-download"></i> Unduh
            </a>
            <a href="{{ route('arsip.edit',$arsip->id) }}" class="btn btn-success text-white">
                <i class="bi bi-pencil-square"></i> Edit / Ganti File
            </a>
        </div>
    </div>
</div>
@endsection

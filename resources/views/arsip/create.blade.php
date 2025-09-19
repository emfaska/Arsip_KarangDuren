@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 text-dark">
        <i class="bi bi-upload text-success"></i> Arsip Surat 
        <span class="text-muted">>> Unggah</span>
    </h2>

    <p class="mb-3">
        Unggah surat yang telah terbit pada form ini untuk diarsipkan. <br>
        <b class="text-danger">Catatan:</b> Gunakan file berformat <span class="badge bg-danger">PDF</span>.
    </p>

    {{-- Pesan Error --}}
    @if ($errors->any())
        <div class="alert alert-danger shadow-sm">
            <i class="bi bi-exclamation-triangle-fill"></i> Terjadi kesalahan:
            <ul class="mt-2 mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card p-4 shadow-sm border-2 mb-4" style="border-color: var(--color-border); border-radius: 12px;">
        <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nomor_surat" class="form-label">
                    <i class="bi bi-hash"></i> Nomor Surat
                </label>
                <input type="text" name="nomor_surat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">
                    <i class="bi bi-folder-fill text-success"></i> Kategori Surat
                </label>
                <select name="kategori_id" id="kategori_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">
                    <i class="bi bi-card-text"></i> Judul
                </label>
                <input type="text" name="judul" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="file_surat" class="form-label">
                    <i class="bi bi-file-earmark-pdf-fill text-danger"></i> File Surat (PDF)
                </label>
                <input type="file" name="file_surat" class="form-control" accept="application/pdf" required>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('arsip.index') }}" class="btn btn-outline-dark">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save-fill"></i> Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

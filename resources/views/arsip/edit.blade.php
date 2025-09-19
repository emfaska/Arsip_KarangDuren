@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 text-dark">
        <i class="bi bi-pencil-square text-success"></i> Arsip Surat 
        <span class="text-muted">>> Edit / Ganti File</span>
    </h2>

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
        <form action="{{ route('arsip.update', $arsip->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nomor_surat" class="form-label">
                    <i class="bi bi-hash"></i> Nomor Surat
                </label>
                <input type="text" name="nomor_surat" class="form-control" 
                       value="{{ old('nomor_surat', $arsip->nomor_surat) }}" required>
            </div>

            <div class="mb-3">
                <label for="kategori_id" class="form-label">
                    <i class="bi bi-folder-fill text-success"></i> Kategori Surat
                </label>
                <select name="kategori_id" id="kategori_id" class="form-select" required>
                    @foreach($kategori as $item)
                        <option value="{{ $item->id }}" {{ $arsip->kategori_id == $item->id ? 'selected' : '' }}>
                            {{ $item->nama_kategori }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="judul" class="form-label">
                    <i class="bi bi-card-text"></i> Judul
                </label>
                <input type="text" name="judul" class="form-control" 
                       value="{{ old('judul', $arsip->judul) }}" required>
            </div>

            <div class="mb-3">
                <label for="file_surat" class="form-label">
                    <i class="bi bi-file-earmark-pdf-fill text-danger"></i> File Surat (PDF)
                </label>
                @if($arsip->file_surat)
                    <p class="mt-1">
                        <span class="text-muted">File lama:</span> 
                        <a href="{{ asset('storage/'.$arsip->file_surat) }}" target="_blank" class="link-primary">
                            <i class="bi bi-eye-fill"></i> Lihat PDF
                        </a>
                    </p>
                @endif
                <input type="file" name="file_surat" class="form-control" accept="application/pdf">
                <small class="text-muted">Kosongkan jika tidak ingin mengganti file</small>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('arsip.index') }}" class="btn btn-outline-dark">
                    <i class="bi bi-arrow-left-circle"></i> Kembali
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-save-fill"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

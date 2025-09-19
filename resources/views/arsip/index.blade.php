@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-3 text-dark">
        <i class="bi bi-archive-fill text-success"></i> Arsip Surat
    </h2>
    <p class="mb-4 text-secondary">
        Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
        Klik <b>"Lihat"</b> pada kolom aksi untuk menampilkan surat.
    </p>

    <!-- Form Pencarian -->
    <form method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" 
               placeholder="Cari surat..." value="{{ $search }}">
        <button type="submit" class="btn btn-secondary">
            <i class="bi bi-search"></i> Cari
        </button>
    </form>

    <!-- Notifikasi sukses -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Tabel Arsip -->
    <table class="table table-bordered table-hover shadow-sm">
        <thead class="table-success">
            <tr>
                <th><i class="bi bi-hash"></i> Nomor Surat</th>
                <th><i class="bi bi-folder-fill"></i> Kategori</th>
                <th><i class="bi bi-card-text"></i> Judul</th>
                <th><i class="bi bi-clock-history"></i> Waktu Pengarsipan</th>
                <th><i class="bi bi-gear-fill"></i> Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($arsipSurats as $arsip)
            <tr>
                <td>{{ $arsip->nomor_surat }}</td>
                <td>{{ optional($arsip->kategori)->nama_kategori ?? '-' }}</td>
                <td>{{ $arsip->judul }}</td>
               <td>{{ \Carbon\Carbon::parse($arsip->waktu_pengarsipan)->translatedFormat('l, d F Y H:i:s') }}</td>
                <td>
                    <form action="{{ route('arsip.destroy',$arsip->id) }}" method="POST" class="d-inline"
                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus surat ini?')">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm">
                            <i class="bi bi-trash-fill"></i> Hapus
                        </button>
                    </form>
                    <a href="{{ route('arsip.download',$arsip->id) }}" class="btn btn-warning btn-sm">
                        <i class="bi bi-download"></i> Unduh
                    </a>
                    <a href="{{ route('arsip.lihat',$arsip->id) }}" class="btn btn-info btn-sm">
                        <i class="bi bi-eye-fill"></i> Lihat
                    </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center text-muted">Belum ada arsip surat</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tombol tambah arsip -->
    <div class="mt-3">
        <a href="{{ route('arsip.create') }}" class="btn btn-success">
            <i class="bi bi-plus-circle-fill"></i> Arsipkan Surat
        </a>
    </div>
</div>
@endsection

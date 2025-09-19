@extends('layouts.app')

@section('content')
<div class="container">
    <h2><i class="bi bi-folder-fill text-success"></i> Kategori Surat</h2>
    <div class="mb-3">
        <span class="text-muted">Berikut adalah daftar kategori bisa digunakan.</span> <br>
        <span class="text-muted">Klik "Tambah" pada button dibawah tabel untuk menambahkan kategori baru.</span>
    </div>

    <!-- Form search -->
    <form action="{{ route('kategori.index') }}" method="GET" class="d-flex mb-3">
        <input type="text" name="search" class="form-control me-2" 
               placeholder="Cari kategori..." value="{{ request('search') }}">
        <button type="submit" class="btn btn-secondary">
            <i class="bi bi-search"></i> Cari
        </button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover shadow-sm">
        <thead class="table-success">
            <tr>
                <th><i class="bi bi-hash"></i> ID</th>
                <th><i class="bi bi-tag-fill"></i> Nama Kategori</th>
                <th><i class="bi bi-card-text"></i> Keterangan</th>
                <th><i class="bi bi-gear-fill"></i> Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategori as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->nama_kategori }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>
                        <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin hapus?')" 
                                    class="btn btn-danger btn-sm">
                                <i class="bi bi-trash-fill"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">Belum ada kategori</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Tombol tambah kategori di bawah tabel -->
    <div class="mt-3">
        <a href="{{ route('kategori.create') }}" 
           class="btn btn-success d-inline-flex align-items-center px-3 shadow-sm"
           style="border-radius: 8px; font-weight: 500;">
            <i class="bi bi-plus-circle-fill me-2"></i> Tambah Kategori
        </a>
    </div>
</div>

<style>
    /* Hover state tombol hijau */
    .btn-success:hover {
        background-color: #198754 !important; /* hijau lebih gelap */
        border-color: #146c43 !important;
        color: #fff !important;
    }
</style>
@endsection

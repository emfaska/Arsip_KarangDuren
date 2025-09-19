@extends('layouts.app')
@section('title', 'About')

@section('content')
<div class="container">
    <h2 class="mb-4 text-dark">
        <i class="bi bi-info-circle-fill text-success me-2"></i> About
    </h2>

    <div class="card p-4 border-2"
         style="max-width: 650px; border-color: var(--color-border); border-radius: 16px;">

        <div class="d-flex align-items-center flex-wrap">
            <!-- Foto Profil -->
            <img src="{{ asset('images/faska.jpg') }}" 
                 alt="Foto Profil" 
                 class="me-4 mb-3"
                 style="width: 130px; height: 130px; object-fit: cover; border-radius: 16px; border:3px solid var(--color-border);">

            <!-- Data Profil -->
            <div style="flex:1; min-width: 280px;">
                <p class="mb-3 text-secondary">Aplikasi ini dibuat oleh:</p>

                <div class="info-grid">
                    <div class="label">Nama</div>
                    <div class="separator">:</div>
                    <div class="value">M. Faisyal Akbar</div>

                    <div class="label">Prodi</div>
                    <div class="separator">:</div>
                    <div class="value">D3 - Manajemen Informatika (PSDKU Kediri)</div>

                    <div class="label">NIM</div>
                    <div class="separator">:</div>
                    <div class="value">2331730015</div>

                    <div class="label">Tanggal</div>
                    <div class="separator">:</div>
                    <div class="value">19 September 2025</div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Grid untuk data profil dengan titik dua */
    .info-grid {
        display: grid;
        grid-template-columns: 120px 15px auto;
        row-gap: 8px;
        font-size: 15px;
        color: var(--color-text);
        align-items: center;
    }

    .info-grid .label {
        font-weight: 600;
        color: #333;
    }

    .info-grid .separator {
        text-align: center;
        font-weight: 600;
        color: #333;
    }

    .info-grid .value {
        color: #555;
    }

    .card {
        background: #fff;
        box-shadow: 0 6px 20px rgba(0,0,0,0.08);
    }
</style>
@endsection

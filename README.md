<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

<h2 align="center">Sistem Kearsipan Desa</h2>

<p align="center">
    <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
    <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

# Tujuan Proyek
Sistem kearsipan ini dikembangkan untuk menyederhanakan proses pengelolaan dan penyimpanan dokumen serta surat-menyurat di lingkungan desa, mencakup fitur pencarian, penyimpanan, dan pengunduhan file dalam format digital.

---

# Fungsionalitas
### Manajemen Dokumen
- **Pencarian Dokumen**: Temukan dokumen dengan cepat melalui kata kunci pada judulnya.
- **Input Dokumen**: Tambahkan data dokumen baru dengan mengunggah file PDF dan memilih kategori yang tersedia.
- **Modifikasi Dokumen**: Perbarui data, kategori, dan file PDF dari dokumen yang sudah ada.
- **Penghapusan Dokumen**: Hapus data dokumen dengan konfirmasi keamanan.
- **Pengunduhan Dokumen**: Unduh file dokumen dalam format PDF.
- **Tampilan Detail Dokumen**: Lihat informasi lengkap dari sebuah dokumen beserta pratinjau file PDF-nya.

---

### Kategori Dokumen
- **Manajemen Kategori**: Buat, edit, dan hapus kategori dokumen dengan ID yang dibuat secara otomatis.

---

### Informasi Pengembang
- **Halaman Pengantar**: Menampilkan informasi tentang pengembang aplikasi serta tanggal penyelesaiannya.

---

# Petunjuk Penggunaan
- **Kloning Repositori**: `git clone https://github.com/emfaska/Arsip_KarangDuren.git`
- **Akses Direktori Proyek**: `cd karangduren-arsip`
- **Instalasi Dependensi**: `composer install`
- **Konfigurasi Lingkungan**: `cp .env.example .env`
- **Pembuatan Kunci Aplikasi**: `php artisan key:generate`
- **Pengaturan Tautan Penyimpanan**: `php artisan storage:link`
- **Migrasi Database**: `php artisan migrate`
- **Menjalankan Aplikasi**: `php artisan serve`

---

# Tampilan Aplikasi
### 1. Halaman Utama Arsip
![Dashboard](public/images/dashboard.png)

### 2. Halaman Tambah Arsip
![Tambah Arsip](public/images/tambah_arsip.png)

### 3. Halaman Edit Arsip
![Edit Arsip](public/images/edit_arsip.png)

### 4. Halaman Hapus Arsip
![Hapus Arsip](public/images/hapus_arsip.png)

### 5. Halaman Lihat Arsip
![Lihat Arsip](public/images/lihat_arsip.png)

### 6. Halaman Utama Kategori Arsip
![Dashboard Kategori](public/images/dashboard_kategori.png)

### 7. Halaman Tambah Kategori
![Tambah Kategori](public/images/tambah_kategori.png)

### 8. Halaman Edit Kategori
![Edit Kategori](public/images/edit_kategori.png)

### 9. Halaman Hapus Kategori
![Hapus Kategori](public/images/hapus_kategori.png)

### 10. Halaman Tentang Aplikasi
![About](public/images/about.png)
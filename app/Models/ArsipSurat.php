<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArsipSurat extends Model
{
    use HasFactory;
    protected $table = 'arsip_surat'; // pastikan sama dengan nama tabel di DB

    protected $fillable = [
        'nomor_surat',
        'kategori_id',
        'judul',
        'waktu_pengarsipan', // hapus kalau kolom ini tidak ada di tabel
        'file_surat',        // samakan dengan nama kolom di tabel
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSurat::class, 'kategori_id');
    }
}

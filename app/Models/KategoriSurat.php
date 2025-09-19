<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KategoriSurat extends Model
{
    use HasFactory;

    protected $table = 'kategori_surats';

    protected $fillable = [
        'nama_kategori',
        'judul',
    ];
}

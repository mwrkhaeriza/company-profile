<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    // Nama tabel di database (opsional, otomatis mendeteksi 'articles')
    protected $table = 'articles';

    // Kolom-kolom yang diizinkan untuk diisi secara massal (Mass Assignment)
    protected $fillable = [
        'judul',
        'slug',
        'isi',
        'konten',
        'gambar',
    ];
}
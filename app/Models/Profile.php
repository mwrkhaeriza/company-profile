<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_perusahaan',
        'slogan',
        'tentang_kami',
        'visi',
        'misi',
        'telepon',
        'email',
        'alamat'
    ];
}
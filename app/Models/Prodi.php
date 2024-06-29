<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan struktur database
    protected $table = 'prodi';

    protected $fillable = [
        'prodi',
        'foto',
        'email',
        'kapro',
        'fakultas',
        'akreditasi',
        'prodik',
        'jumlah_mahasiswa',
        'tgl_pendirian',
        'deskripsi',
        'jumlah_dosen',
        'sk_prodi',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Taslab extends Model
{
    use HasFactory;

    protected $table = 'taslab';
    protected $fillable = [
        'nama',
        'unit_kerja',
        'pendidikan',
        'tmt',
        'status_pegawai',
        'jabatan',
        'bagian_tugas',
        'nitk',
        'tgl_lahir',
        'no_hp',
        'email',
    ];
}

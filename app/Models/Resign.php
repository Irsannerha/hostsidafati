<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resign extends Model
{
    use HasFactory;

    protected $table = 'resign';
    protected $fillable = [
        'prodi_id',
        'nama',
        'nrk',
        'nidn',
        'jenis_kelamin',
        'tmt_masuk',
        'tmt_keluar',
        'alasan',
        'surat_keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

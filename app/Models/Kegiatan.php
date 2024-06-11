<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'prodi_id',
        'email',
        'nama_kegiatan',
        'tgl_kegiatan',
        'mulai_kegiatan',
        'akhir_kegiatan',
        'tempat_pelaksanaan',
        'jumlah_peserta',
        'penanggung_jawab',
        'nama_pemohon',
        'no_hp',
        'status',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

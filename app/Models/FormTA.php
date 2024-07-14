<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormTA extends Model
{
    use HasFactory;

    protected $table = 'formta';

    protected $fillable = [
        'prodi_id',
        'jenis_pengajuan_id',
        'nama',
        'nim',
        'keperluan',
        'instansi',
        'alamat_instansi',
        'tjp',
        'pelaksanaan',
        'waktu_mulai_pelaksanaan',
        'waktu_akhir_pelaksanaan',
        'no_hp',
        'email',
        'nama_pembimbing_satu',
        'nama_pembimbing_dua',
        'judul',
        'status',
        'keterangan',

    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
    public function jenisPengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class, 'jeni_pengajuan', 'id');
    }
}

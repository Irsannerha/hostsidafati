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
        'no_hp_mahasiswa',
        'email',
        'keperluan',
        'nama_pembimbing_satu',
        'nama_pembimbing_dua',
        'alamat_mahasiswa',
        'judul_ta',
        'khs',
        'krs',
        'transkrip',
        'nama_instansi_satu',
        'nama_pimpinan_instansi_satu',
        'no_hp_instansi_satu',
        'alamat_instansi_satu',
        'keperluan_satu',
        'nama_instansi_dua',
        'nama_pimpinan_instansi_dua',
        'no_hp_instansi_dua',
        'alamat_instansi_dua',
        'keperluan_dua',
        'status',
        'dosen_wali',
        'koor_prodi',
        'tekndik_checking',
        'dekan',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
    public function jenisPengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class, 'jenis_pengajuan_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = [
        'nama',
        'nip_nrk',
        'prodi_id',
        'tgl_lahir',
        'pendidikan',
        'status_nidn_nidk',
        'status_pegawai',
        'jabfung',
        'tmt_jabfung_terakhir',
        'target_kenaikan_jabfung',
        'tmt_masuk_itera',
        'tmt',
        'pekerti',
        'serdos',
        'status_dosen',
        'sk_pns',
        'sk_cpns',
        'sk_tubel',
        'sk_perpanjangan_tubel',
        'sk_jabfung',
        'sk_pengaktifan',
        'sk_pengaktifan_kembali',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKP extends Model
{
    use HasFactory;

    protected $table = 'formkp';

    protected $fillable = [
        'prodi_id',
        'nama',
        'nim',
        'instansi',
        'alamat_instansi',
        'tjp',
        'waktu_mulai_pelaksanaan',
        'waktu_akhir_pelaksanaan',
        'no_hp_mhs',
        'email',
        'status',
        'keterangan'
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

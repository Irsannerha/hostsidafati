<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosbel extends Model
{
    use HasFactory;
    
    protected $table = 'dosbel';
    protected $fillable = [
        'prodi_id',
        'nama',
        'nip_nrk',
        'status',
        'tempat_studi',
        'jenis_beasiswa',
        'mulai_tubel',
        'selesai_tubel',
        'sk_tubel',
        'perpanjangan_tubel',
        'mulai_perpanjangan',
        'selesai_perpanjangan',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

}

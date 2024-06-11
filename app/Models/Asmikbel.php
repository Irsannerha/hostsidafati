<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asmikbel extends Model
{
    use HasFactory;

    protected $table = 'asmikbel';

    protected $fillable = [
        'prodi_id',
        'nama',
        'nip_nrk',
        'status',
        'studi_lanjut',
        'beasiswa',
        'mulai_tubel',
        'selesai_tubel',
        'sk_tubel',
        'status_asmik',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

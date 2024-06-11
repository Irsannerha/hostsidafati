<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class FormRekom extends Model
{
    use HasFactory;

    protected $table = 'formrekom';

    protected $fillable = [
        'prodi_id',
        'nama',
        'nim',
        'no_hp_mhs',
        'instansi',
        'alamat_instansi',
        'jerekom',
        'deskripsi',
        'status',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

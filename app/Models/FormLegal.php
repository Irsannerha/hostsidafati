<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormLegal extends Model
{
    use HasFactory;

    protected $table = 'formlegal';

    protected $fillable = [
        'prodi_id',
        'nama',
        'nim',
        'no_hp_mhs',
        'email',
        'keperluan',
        'jumlah_legal',
        'status',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

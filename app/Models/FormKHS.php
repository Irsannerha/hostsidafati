<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormKHS extends Model
{
    use HasFactory;

    protected $table = 'formkhs';

    protected $fillable = [
        'prodi_id',
        'nama',
        'nim',
        'no_hp_mhs',
        'email',
        'keperluan',
        'jumlah',
        'status',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doslubi extends Model
{
    use HasFactory;

    protected $table = 'doslubi';

    protected $fillable = [
        'prodi_id',
        'nama',
        'nup_nidk',
        'jurusan',
        'status',
        'tgl_lahir',
        'jabatan_terakhir',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

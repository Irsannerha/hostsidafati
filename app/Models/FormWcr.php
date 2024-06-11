<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormWcr extends Model
{
    use HasFactory;

    protected $table = 'formwcr';

    protected $fillable = [
        'prodi_id',
        'nama',
        'nim',
        'instansi',
        'alamat_instansi',
        'status',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

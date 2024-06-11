<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormBukrim extends Model
{
    use HasFactory;

    protected $table = 'formbukrim';

    protected $fillable = [
        'prodi_id',
        'nama_dok',
        'nama',
        'nim',
        'jenis_berkas',
        'jumlah_dok',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

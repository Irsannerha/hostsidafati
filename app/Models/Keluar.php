<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;

    protected $table = 'keluar';

    protected $fillable = [
        'prodi_id',
        'ts_id',
        'mhs_keluar_genap',
        'mhs_keluar_ganjil',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function Tahun()
    {
        return $this->belongsTo(Tahun::class, 'ts_id', 'id');
    }
    
}

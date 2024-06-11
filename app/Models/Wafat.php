<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wafat extends Model
{
    use HasFactory;

    protected $table = 'wafat';

    protected $fillable = [
        'prodi_id',
        'tahun_semester_id',
        'tahun_id',
        'mhs_wafat_genap',
        'mhs_wafat_ganjil',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function Tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }
    
}

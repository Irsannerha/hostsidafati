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
        'ts_id',
        'mhs_wafat_genap',
        'mhs_wafat_ganjil',
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

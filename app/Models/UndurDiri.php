<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UndurDiri extends Model
{
    use HasFactory;

    protected $table = 'undur-diri';

    protected $fillable = [
        'prodi_id',
        'tahun_id',
        'mhs_undur_diri_genap',
        'mhs_undur_diri_ganjil',
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

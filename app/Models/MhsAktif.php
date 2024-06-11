<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MhsAktif extends Model
{
    use HasFactory;

    protected $table = 'mhs_aktif';

    protected $fillable = [
        'prodi_id',
        'ts_id',
        'jumlah_mhs_aktif_ts',
        'jumlah_mhs_aktif_th',
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

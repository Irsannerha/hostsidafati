<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lulus extends Model
{
    use HasFactory;

    protected $table = 'lulus';

    protected $fillable = [
        'prodi_id',
        'ts_id',
        'januari',
        'februari',
        'maret',
        'april',
        'mei',
        'juni',
        'juli',
        'agustus',
        'september',
        'oktober',
        'november',
        'desember',
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

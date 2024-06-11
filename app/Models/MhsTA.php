<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MhsTA extends Model
{
    use HasFactory;

    protected $table = 'mhs_ta';

    protected $fillable = [
        'prodi_id',
        'tahun_id',
        'mhs_ta',
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

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
        'tahun_id',
        'september',
        'november',
        'maret',
        'mei',
        'juli',
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

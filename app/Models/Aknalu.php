<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aknalu extends Model
{
    use HasFactory;

    protected $table = 'aknalu';

    protected $fillable = [
        'prodi_id',
        'tahun',
        'jumlah',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}


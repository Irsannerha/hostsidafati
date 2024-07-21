<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TtdQr extends Model
{
    use HasFactory;

    protected $table = 'ttdqr';

    protected $fillable = [
        'jenis_pengajuan_id',
        'id_pengajuan',
        'informasi',
        'nama',
        'peran',
        'token',
    ];

    public function jenisPengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class, 'jenis_pengajuan_id', 'id');
    }
}

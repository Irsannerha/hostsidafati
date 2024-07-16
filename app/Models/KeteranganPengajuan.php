<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeteranganPengajuan extends Model
{
    use HasFactory;
    protected $table = 'keterangan_pengajuan';

    protected $fillable = [
        'jenis_pengajuan_id',
        'id_pengajuan',
        'status_keterangan',
        'keterangan',
    ];

    public function jenisPengajuan()
    {
        return $this->belongsTo(JenisPengajuan::class, 'jenis_pengajuan', 'id');
    }
}

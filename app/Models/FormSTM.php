<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormSTM extends Model
{
    use HasFactory;

    protected $table = 'formstm';
    
    protected $fillable = [
        'prodi_id',
        'nama',
        'nim',
        'instansi',
        'tgl_bls',
        'tgl_mulai_pelaksanaan',
        'tgl_akhir_pelaksanaan',
        'jenis_surat_tugas',
        'status',
        'keterangan',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

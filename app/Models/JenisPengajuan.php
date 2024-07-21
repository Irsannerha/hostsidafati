<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengajuan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pengajuan';

    protected $fillable = [
        'nama',
    ];

    public function formTa(){
        return $this->hasMany(FormTa::class);
    }
    public function ttdQr(){
        return $this->hasMany(TtdQr::class);
    }
    public function keterangaPengajuan(){
        return $this->hasMany(KeteranganPengajuan::class);
    }
}

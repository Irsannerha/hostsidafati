<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Prestasi extends Model
{
    use HasFactory;

    protected $table = 'prestasi';

    protected $fillable = [
        'prodi_id',
        'nama_tim',
        'nama_mahasiswa',
        'nim',
        'kontak',
        'jenis_prestasi',
        'jumlah_peserta',
        'kategori_olahraga',
        'tahun_kegiatan',
        'url_penyelenggara',
        'nama_penyelenggara',
        'tgl_kegiatan',
        'tingkat_kejuaraan',
        'judul_karya',
        'anggota_karya',
        'foto',
    ];
    public static $rules = [
        'prodi_id' => 'required',
        'nama_tim' => 'required',
        'nama_mahasiswa' => 'required',
        'nim' => 'required',
        'kontak' => 'required',
        'jenis_prestasi' => 'required',
        'jumlah_peserta' => 'required|numeric',
        'kategori_olahraga' => 'required',
        'tahun_kegiatan' => 'required',
        'url_penyelenggara' => 'required|url',
        'nama_penyelenggara' => 'required',
        'tgl_kegiatan' => 'required|date',
        'tingkat_kejuaraan' => 'required',
        'judul_karya' => 'required',
        'anggota_karya' => 'required',
        'foto.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ];

    public static function boot()
    {
    parent::boot();

    static::saving(function ($model) {
        // Periksa apakah properti foto tidak null dan merupakan array
        if (!is_null($model->foto) && is_array($model->foto) && count($model->foto) < 3) {
            return false; // Pembatalan penyimpanan jika tidak ada minimal 3 foto
        }
    });
}

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }
}

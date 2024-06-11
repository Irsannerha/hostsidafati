<?php

namespace App\Models;

use Database\Seeders\TahunSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AllRekap extends Model
{
    use HasFactory;

    protected $table = 'allrekap';

    protected $fillable = [
        'prodi_id',
        'tahun_semester_id',
        'tahun_id',
        'jumlah_mhs_aktif_ts',
        'jumlah_mhs_aktif_th',
        'mhs_undur_diri_genap',
        'mhs_undur_diri_ganjil',
        'mhs_keluar_genap',
        'mhs_keluar_ganjil',
        'mhs_wafat_genap',
        'mhs_wafat_ganjil',
        'mhs_lulus_januari',
        'mhs_lulus_februari',
        'mhs_lulus_maret',
        'mhs_lulus_april',
        'mhs_lulus_mei',
        'mhs_lulus_juni',
        'mhs_lulus_juli',
        'mhs_lulus_agustus',
        'mhs_lulus_september',
        'mhs_lulus_oktober',
        'mhs_lulus_november',
        'mhs_lulus_desember',
        'mhs_lulus_ta',
    ];

    public function Prodi()
    {
        return $this->belongsTo(Prodi::class, 'prodi_id', 'id');
    }

    public function TahunSemester()
    {
        return $this->belongsTo(Tahun::class, 'tahun_semester_id', 'id');
    }

    public function Tahun()
    {
        return $this->belongsTo(Tahun::class, 'tahun_id', 'id');
    }
}
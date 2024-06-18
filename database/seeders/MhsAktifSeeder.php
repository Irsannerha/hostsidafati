<?php

namespace Database\Seeders;


use App\Models\MhsAktif;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MhsAktifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mhsaktif = [];

// Loop untuk setiap tahun dari 1 hingga 12
for ($ts_id = 1; $ts_id <= 1; $ts_id++) {
    // Loop untuk setiap prodi (21 prodi)
    for ($prodi_id = 1; $prodi_id <= 1; $prodi_id++) {
        $jumlah_mhs_aktif_ts = rand(50, 200); 
        $jumlah_mhs_aktif_th = rand(50, 200);
        
        $data = [
            'prodi_id' => $prodi_id,
            'ts_id' => $ts_id,
            'jumlah_mhs_aktif_ts' => $jumlah_mhs_aktif_ts,
            'jumlah_mhs_aktif_th' => $jumlah_mhs_aktif_th,
        ];

        $mhsaktif[] = $data;
    }
}

foreach ($mhsaktif as $p) {
    MhsAktif::query()->insert($p);
}

    }        
}

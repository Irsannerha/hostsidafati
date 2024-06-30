<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosen;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dostap = [
            [
                'prodi_id' => 1,
                'nama' => 'Bilal Al Farishi, B.Sc(Hons)., M.Sc.',
                'nip_nrk' => '199208212019031023',
                'tgl_lahir' => '1992-08-21',
                'pendidikan' => 'S2',
                'tmt_masuk_itera' => '2016-01-08',
                'tmt' => '2016-01-01',
                'status_nidn_nidk' => 'NIDN',
                'status_pegawai' => 'PNS',
                'jabfung' => 'Asisten Ahli 150',
                'tmt_jabfung_terakhir' => '2021-03-01',
                'target_kenaikan_jabfung' => '2023-03-01',
                'pekerti' => 'Sudah',
                'serdos' => 'Ada',
                'status_dosen' => 'Dosen Tetap',
                'sk_pns' => '',
                'sk_cpns' => '',
                'sk_tubel' => '',
                'sk_perpanjangan_tubel' => '',
                'sk_jabfung' => '',
                'sk_pengaktifan' => '',
                'sk_pengaktifan_kembali' => '',

            ],
            
        ];

        foreach ($dostap as $dostap) {
            Dosen::create($dostap);
        }
    }
}

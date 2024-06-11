<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resign;

class ResignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $resignsTemplate = [
            [
                'prodi_id' => 1,
                'nama' => 'Super Admin',
                'nrk' => '1234567890',
                'nidn' => '1234567890',
                'jenis_kelamin' => 'Laki-laki',
                'tmt_masuk' => '2022-04-20',
                'tmt_keluar' => '2024-04-20',
                'alasan' => 'Pindah',
                'surat_keterangan' => 'ada'
            ],
            [
                'prodi_id' => 2,
                'nama' => 'Pegawai',
                'nrk' => '1234567890',
                'nidn' => '1234567890',
                'jenis_kelamin' => 'Laki-laki',
                'tmt_masuk' => '2022-04-20',
                'tmt_keluar' => '2024-04-20',
                'alasan' => 'Pindah',
                'surat_keterangan' => 'ada'
            ],
            [
                'prodi_id' => 3,
                'nama' => 'Akademik',
                'nrk' => '1234567890',
                'nidn' => '1234567890',
                'jenis_kelamin' => 'Laki-laki',
                'tmt_masuk' => '2022-04-20',
                'tmt_keluar' => '2024-04-20',
                'alasan' => 'Pindah',
                'surat_keterangan' => 'ada'
            ],
            [
                'prodi_id' => 4,
                'nama' => 'Kemahasiswaan',
                'nrk' => '1234567890',
                'nidn' => '1234567890',
                'jenis_kelamin' => 'Laki-laki',
                'tmt_masuk' => '2022-04-20',
                'tmt_keluar' => '2024-04-20',
                'alasan' => 'Pindah',
                'surat_keterangan' => 'ada'
            ],
            [
                'prodi_id' => 5,
                'nama' => 'Keuangan',
                'nrk' => '1234567890',
                'nidn' => '1234567890',
                'jenis_kelamin' => 'Laki-laki',
                'tmt_masuk' => '2022-04-20',
                'tmt_keluar' => '2024-04-20',
                'alasan' => 'Pindah',
                'surat_keterangan' => 'ada'
            ],
            [
                'prodi_id' => 6,
                'nama' => 'Prodi',
                'nrk' => '1234567890',
                'nidn ' => '1234567890',
                'jenis_kelamin' => 'Laki-laki',
                'tmt_masuk' => '2022-04-20',
                'tmt_keluar' => '2024-04-20',
                'alasan' => 'Pindah',
                'surat_keterangan' => 'ada'
            ],
        ];

        Resign::query()->insert($resignsTemplate);

    }
   
}

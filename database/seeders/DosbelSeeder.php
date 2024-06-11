<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dosbel;


class DosbelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dosbel = [
            [
                'prodi_id' => 1,
                'nama' => 'Dr. Eng. M. Fauzi M.Z., S.T., M.T.',
                'nip_nrk' => '198509102019031011',
                'status' => 'Non PNS',
                'tempat_studi' => 'Institut Teknologi Bandung',
                'jenis_beasiswa' => 'Beasiswa Pendidikan',
                'mulai_tubel' => '2021-04-01',
                'selesai_tubel' => '2023-04-01',
                'sk_tubel' => 'Ada',
                'perpanjangan_tubel' => 'Ada',
                'mulai_perpanjangan' => '2023-04-01',
                'selesai_perpanjangan' => '2025-04-01',
                'keterangan' => 'Dosen Belum Tetap',
            ],
            [
                'prodi_id' => 2,
                'nama' => 'Dr. Eng. M. Fauzi M.Z., S.T., M.T.',
                'nip_nrk' => '198509102019031011',
                'status' => 'Non PNS',
                'tempat_studi' => 'Universitas Gadjah Mada',
                'jenis_beasiswa' => 'Beasiswa Pendidikan',
                'mulai_tubel' => '2021-04-01',
                'selesai_tubel' => '2023-04-01',
                'sk_tubel' => 'Ada',
                'perpanjangan_tubel' => 'Ada',
                'mulai_perpanjangan' => '2023-04-01',
                'selesai_perpanjangan' => '2025-04-01',
                'keterangan' => 'Dosen Belum Tetap',
            ],
            [
                'prodi_id' => 3,
                'nama' => 'Dr. Eng. M. Fauzi M.Z., S.T., M.T.',
                'nip_nrk' => '198509102019031011',
                'status' => 'Non PNS',
                'tempat_studi' => 'Universitas Gadjah Mada',
                'jenis_beasiswa' => 'Beasiswa Pendidikan',
                'mulai_tubel' => '2021-04-01',
                'selesai_tubel' => '2023-04-01',
                'sk_tubel' => 'Ada',
                'perpanjangan_tubel' => 'Ada',
                'mulai_perpanjangan' => '2023-04-01',
                'selesai_perpanjangan' => '2025-04-01',
                'keterangan' => 'Dosen Belum Tetap',
            ],
        ];

        foreach ($dosbel as $d) {
            Dosbel::query()->insert($d);
        }
    }
}

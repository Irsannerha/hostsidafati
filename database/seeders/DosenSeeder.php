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
                'umur' => 31,
                'pendidikan' => 'S2',
                'tmt_masuk_itera' => null,
                'tmt' => null,
                'masa_kerja' => null,
                'status_nidn_nidk' => 'NIDN',
                'status_pegawai' => 'PNS',
                'jabfung' => 'Asisten Ahli 150',
                'tmt_jabfung_terakhir' => '2021-03-01',
                'target_kenaikan_jabfung' => '2023-03-01',
                'pekerti' => 'Sudah',
                'serdos' => 'Ada',
                'status_dosen' => 'Dosen Tetap',
                'sk_pns' => 'https://www.contoh.com/sk_pns',
                'sk_cpns' => 'https://www.contoh.com/sk_cpns',
                'sk_tubel' => 'https://www.contoh.com/sk_tubel',
                'sk_perpanjangan_tubel' => 'https://www.contoh.com/sk_perpanjangan_tubel',
                'sk_jabfung' => 'https://www.contoh.com/sk_jabfung',
                'sk_pengaktifan' => 'https://www.contoh.com/sk_pengaktifan',
                'sk_pengaktifan_kembali' => 'https://www.contoh.com/sk_pengaktifan_kembali',

            ],
            [
                'prodi_id' => 2,
                'nama' => 'Achmad Darul Rochman, S.Pd., M.T',
                'nip_nrk' => '198512252019031007',
                'tgl_lahir' => '1985-12-25',
                'umur' => 38,
                'pendidikan' => 'S2/Sedang S3 DN',
                'tmt_masuk_itera' => null,
                'tmt' => null,
                'masa_kerja' => null,
                'status_nidn_nidk' => 'NIDN',
                'status_pegawai' => 'PNS',
                'jabfung' => 'Asisten Ahli 150',
                'tmt_jabfung_terakhir' => '2021-03-01',
                'target_kenaikan_jabfung' => '2023-03-01',
                'pekerti' => 'Sudah',
                'serdos' => 'Ada',
                'status_dosen' => 'Dosen Aktif',
                'sk_pns' => 'https://www.contoh.com/sk_pns',
                'sk_cpns' => 'https://www.contoh.com/sk_cpns',
                'sk_tubel' => 'https://www.contoh.com/sk_tubel',
                'sk_perpanjangan_tubel' => 'https://www.contoh.com/sk_perpanjangan_tubel',
                'sk_jabfung' => 'https://www.contoh.com/sk_jabfung',
                'sk_pengaktifan' => 'https://www.contoh.com/sk_pengaktifan',
                'sk_pengaktifan_kembali' => 'https://www.contoh.com/sk_pengaktifan_kembali',

            ],

            [
                'prodi_id' => 3,
                'nama' => 'Mochamad Iqbal, S.T., M.T.',
                'nip_nrk' => '199208192019031013',
                'tgl_lahir' => '1992-08-19',
                'umur' => 31,
                'pendidikan' => 'S2/Sedang S3 DN',
                'tmt_masuk_itera' => null,
                'tmt' => null,
                'masa_kerja' => null,
                'status_nidn_nidk' => 'NIDN',
                'status_pegawai' => 'PNS',
                'jabfung' => 'Lektor 200',
                'tmt_jabfung_terakhir' => '2023-04-01',
                'target_kenaikan_jabfung' => '2025-04-01',
                'pekerti' => 'Sudah',
                'serdos' => 'Ada',
                'status_dosen' => 'Dosen Aktif',
                'sk_pns' => 'https://www.contoh.com/sk_pns',
                'sk_cpns' => 'https://www.contoh.com/sk_cpns',
                'sk_tubel' => 'https://www.contoh.com/sk_tubel',
                'sk_perpanjangan_tubel' => 'https://www.contoh.com/sk_perpanjangan_tubel',
                'sk_jabfung' => 'https://www.contoh.com/sk_jabfung',
                'sk_pengaktifan' => 'https://www.contoh.com/sk_pengaktifan',
                'sk_pengaktifan_kembali' => 'https://www.contoh.com/sk_pengaktifan_kembali',

            ],
            [
                'prodi_id' => 4,
                'nama' => 'Meya, S.T., M.T.',
                'nip_nrk' => '199208192019031021',
                'tgl_lahir' => '1992-08-19',
                'umur' => 31,
                'pendidikan' => 'S2/Sedang S3 DN',
                'tmt_masuk_itera' => null,
                'tmt' => null,
                'masa_kerja' => null,
                'status_nidn_nidk' => 'NIDN',
                'status_pegawai' => 'PNS',
                'jabfung' => 'Lektor 200',
                'tmt_jabfung_terakhir' => '2023-04-01',
                'target_kenaikan_jabfung' => '2025-04-01',
                'pekerti' => 'Sudah',
                'serdos' => 'Ada',
                'status_dosen' => 'Dosen Aktif',
                'sk_pns' => 'https://www.contoh.com/sk_pns',
                'sk_cpns' => 'https://www.contoh.com/sk_cpns',
                'sk_tubel' => 'https://www.contoh.com/sk_tubel',
                'sk_perpanjangan_tubel' => 'https://www.contoh.com/sk_perpanjangan_tubel',
                'sk_jabfung' => 'https://www.contoh.com/sk_jabfung',
                'sk_pengaktifan' => 'https://www.contoh.com/sk_pengaktifan',
                'sk_pengaktifan_kembali' => 'https://www.contoh.com/sk_pengaktifan_kembali',

            ],

            [
                'prodi_id' => 5,
                'nama' => 'Moch Iaz, S.T., M.T.',
                'nip_nrk' => '199208192019031022',
                'tgl_lahir' => '1992-08-19',
                'umur' => 31,
                'pendidikan' => 'S2/Sedang S3 DN',
                'tmt_masuk_itera' => null,
                'tmt' => null,
                'masa_kerja' => null,
                'status_nidn_nidk' => 'NIDN',
                'status_pegawai' => 'PNS',
                'jabfung' => 'Lektor 200',
                'tmt_jabfung_terakhir' => '2023-04-01',
                'target_kenaikan_jabfung' => '2025-04-01',
                'pekerti' => 'Sudah',
                'serdos' => 'Ada',
                'status_dosen' => 'Dosen Aktif',
                'sk_pns' => 'https://www.contoh.com/sk_pns',
                'sk_cpns' => 'https://www.contoh.com/sk_cpns',
                'sk_tubel' => 'https://www.contoh.com/sk_tubel',
                'sk_perpanjangan_tubel' => 'https://www.contoh.com/sk_perpanjangan_tubel',
                'sk_jabfung' => 'https://www.contoh.com/sk_jabfung',
                'sk_pengaktifan' => 'https://www.contoh.com/sk_pengaktifan',
                'sk_pengaktifan_kembali' => 'https://www.contoh.com/sk_pengaktifan_kembali',

            ],
        ];

        foreach ($dostap as $dostap) {
            Dosen::create($dostap);
        }
    }
}

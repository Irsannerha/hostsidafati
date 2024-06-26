<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doslubi;

class DoslubiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $doslubi = [
            [
                'prodi_id' => 1,
                'nama' => 'Ir. Hira Laksmiwati Soemitro, M.Sc.',
                'nup_nidk' => '9990093939',
                'jurusan' => 'Fakultas Teknologi dan Industri',
                'status' => 'Purnabakti NUP',
                'tgl_lahir' => '1952-01-09',
                'jabatan_terakhir' => 'Bandung',
            ],
            [
                'prodi_id' => 2,
                'nama' => 'Rifzieh S.Kom., M.Cs. Ph.D',
                'nup_nidk' => '999 1011 2019 31011',
                'jurusan' => 'Fakultas Teknologo Industri',
                'status' => 'Purna Tugas atau Pensiunan',
                'tgl_lahir' => '1965-10-11',
                'jabatan_terakhir' => 'Kepala Departemen Teknik Informatika ITERA',
            ],
            [
                'prodi_id' => 3,
                'nama' => 'Dr. Eng. Ir. H. M. Syaifullah, M.T.',
                'nup_nidk' => '1965 1011 2019 31011',
                'jurusan' => 'Fakultas Teknologo Industri',
                'status' => 'Purna Tugas atau Pensiunan',
                'tgl_lahir' => '1965-10-11',
                'jabatan_terakhir' => 'Kepala Departemen Teknik Perairan ITERA',
            ],
        ];

        foreach ($doslubi as $doslubi) {
            Doslubi::create($doslubi);
        }
    }
}

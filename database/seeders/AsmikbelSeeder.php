<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Asmikbel;

class AsmikbelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asmikbel = [
            [
                'prodi_id' => 1,
                'nama' => 'Khansa Salsabila Suhaimi, S.T.',
                'nip_nrk' => '1997 1011 2020 4133',
                'status' => 'Non PNS',
                'studi_lanjut' => 'Teknik Elektro Bidang Studi Teknik Kendali dan Sistem Cerdas di Institut Teknologi Bandung.',
                'beasiswa' => 'Beasiswa ITERA',
                'mulai_tubel' => '2021-04-01',
                'selesai_tubel' => '2023-04-01',
                'sk_tubel' => 'Ada',
                'status_asmik' => 'Lulus',
                'keterangan' => 'Dummy',
            ],
            [
                'prodi_id' => 2,
                'nama' => 'Leslie Anggraini, S.Kom.',
                'nip_nrk' => '1997 0817 2020 4189',
                'status' => 'Non PNS',
                'studi_lanjut' => 'Fakultas MIPA, Program Studi Magister Ilmu Komputer pada Universitas Gadjah Mada',
                'beasiswa' => 'Beasiswa Pendidikan',
                'mulai_tubel' => '2021-04-01',
                'selesai_tubel' => '2023-04-01',
                'sk_tubel' => 'Ada',
                'status_asmik' => 'Lulus',
                'keterangan' => 'Dummy',
            ],
            [
                'prodi_id' => 3,
                'nama' => 'Rifzieh S.Kom., M.Cs. Ph.D',
                'nip_nrk' => '1985 0910 2019 31011',
                'status' => 'PNS',
                'studi_lanjut' => 'Faculty of Computer Science, Universitas Indonesia',
                'beasiswa' => 'Beasiswa LPDP',
                'mulai_tubel' => '2021-04-01',
                'selesai_tubel' => '2023-04-01',
                'sk_tubel' => 'Ada',
                'status_asmik' => 'Lulus',
                'keterangan' => 'Dummy',
            ],
        ];

        foreach ($asmikbel as $asmikbel) {
            Asmikbel::create($asmikbel);
        }
    }
}

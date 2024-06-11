<?php

namespace Database\Seeders;

use App\Models\Pejabat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class PejabatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pejabat = [
            [
                'nama' => 'Hadi Teguh Yudistira, S.T., Ph.D.',
                'nip' => '198709122019031012',
                'pangkat_golongan' => 'Penata, III/c',
                'jabatan' => 'Ketua Fakultas Teknologi dan Industri',
            ],
            [
                'nama' => 'Amrina Mustaqim, S.Si., M.T.',
                'nip' => '199208152019031011',
                'pangkat_golongan' => 'Penata Muda Tk. I, III/b',
                'jabatan' => 'Sekretaris Bidang 1 (Satu) Fakultas Teknologi dan Industri',
            ],
            [
                'nama' => 'Rifziehh, S.Kom., M.Cs.',
                'nip' => '199001012017071012',
                'pangkat_golongan' => 'Penata Muda Tk. I, III/a',
                'jabatan' => 'Sekretaris Bidang 3 (Satu) Fakultas Teknologi dan Industri',
            ],
        ];

        foreach ($pejabat as $p) {
            Pejabat::query()->insert($p);
        }
    }
}

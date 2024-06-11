<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AknaluSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aknalu = [
            [
                'prodi_id' => 1,
                'tahun' => '2022',
                'jumlah' => 10,
            ],
            [
                'prodi_id' => 1,
                'tahun' => '2023',
                'jumlah' => 20,
            ],
            [
                'prodi_id' => 1,
                'tahun' => '2024',
                'jumlah' => 30,
            ],
            [
                'prodi_id' => 2,
                'tahun' => '2022',
                'jumlah' => 40,
            ],
            [
                'prodi_id' => 2,
                'tahun' => '2023',
                'jumlah' => 50,
            ],
            [
                'prodi_id' => 2,
                'tahun' => '2024',
                'jumlah' => 60,
            ],
            [
                'prodi_id' => 3,
                'tahun' => '2022',
                'jumlah' => 70,
            ],
            [
                'prodi_id' => 3,
                'tahun' => '2023',
                'jumlah' => 80,
            ],
            [
                'prodi_id' => 3,
                'tahun' => '2024',
                'jumlah' => 90,
            ],
            [
                'prodi_id' => 4,
                'tahun' => '2022',
                'jumlah' => 40,
            ],
            [
                'prodi_id' => 4,
                'tahun' => '2023',
                'jumlah' => 20,
            ],
            [
                'prodi_id' => 4,
                'tahun' => '2024',
                'jumlah' => 30,
            ],
            [
                'prodi_id' => 5,
                'tahun' => '2022',
                'jumlah' => 10,
            ],
            [
                'prodi_id' => 5,
                'tahun' => '2023',
                'jumlah' => 20,
            ],
            [
                'prodi_id' => 5,
                'tahun' => '2024',
                'jumlah' => 30,
            ]
           
        ];

            \App\Models\Aknalu::query()->insert($aknalu);
    }
}

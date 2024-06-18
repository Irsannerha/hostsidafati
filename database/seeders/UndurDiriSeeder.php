<?php

namespace Database\Seeders;

use App\Models\UndurDiri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UndurDiriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $undurdiri = [
            [
                'prodi_id' => 1,
                'ts_id' => 1,
                'mhs_undur_diri_genap' => 10,
                'mhs_undur_diri_ganjil' => 20,
            ],
        ];

        foreach ($undurdiri as $p) {
            UndurDiri::query()->insert($p);
        }
    }
}

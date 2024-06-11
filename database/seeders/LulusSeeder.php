<?php

namespace Database\Seeders;

use App\Models\Lulus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LulusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lulus = [
            [
                'prodi_id' => 1,
                'tahun_id' => 1,
                'september' => '10',
                'november' => '20',
                'maret' => '30',
                'mei' => '40',
                'juli' => '50',
            ],
        ];

        foreach ($lulus as $l) {
            Lulus::create($l);
        }
    }
}

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
                'ts_id' => 1,
                'januari' => 0,
                'februari' => 0,
                'maret' => rand(50, 100),   // Random value for maret
                'april' => 0,
                'mei' => rand(50, 100),     // Random value for mei
                'juni' => 0,
                'juli' => rand(50, 100),    // Random value for juli
                'agustus' => 0,
                'september' => rand(80, 120), // Random value for september
                'oktober' => 0,
                'november' => rand(80, 120),  // Random value for november
                'desember' => 0,
            ],
        ];

        foreach ($lulus as $l) {
            Lulus::create($l);
        }
    }
}


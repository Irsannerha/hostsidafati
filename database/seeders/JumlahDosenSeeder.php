<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;


class JumlahDosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat 15 data dummy
        for ($i = 1; $i <= 21; $i++) {
            Prodi::create([
                'prodi_id' => $i,
                'jumlah_dosen' => rand(10, 50),
            ]);
        }
    }
}

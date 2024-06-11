<?php

namespace Database\Seeders;

use App\Models\AllRekap;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AllRekapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $allrekap = [];

    // Generate dummy data for 3 programs (prodi)
    for ($i = 1; $i <= 2; $i++) {
        $allrekap[] = [
            'prodi_id' => $i,
            'tahun_semester_id' => 1,
            'tahun_id' => 1,
            'jumlah_mhs_aktif_ts' => rand(80, 120), // Random number between 80 and 120 for active students
            'jumlah_mhs_aktif_th' => rand(80, 120), // Random number between 80 and 120 for active students
            'mhs_undur_diri_genap' => rand(0, 10), // Random number between 0 and 10 for students withdrawing in even semester
            'mhs_undur_diri_ganjil' => rand(0, 10), // Random number between 0 and 10 for students withdrawing in odd semester
            'mhs_keluar_genap' => rand(0, 5), // Random number between 0 and 5 for students leaving in even semester
            'mhs_keluar_ganjil' => rand(0, 5), // Random number between 0 and 5 for students leaving in odd semester
            'mhs_wafat_genap' => rand(0, 2), // Random number between 0 and 2 for students who passed away in even semester
            'mhs_wafat_ganjil' => rand(0, 2), // Random number between 0 and 2 for students who passed away in odd semester
            'mhs_lulus_januari' => rand(0, 20), // Random number between 0 and 20 for students graduating in January
            'mhs_lulus_februari' => rand(0, 20), // Random number between 0 and 20 for students graduating in February
            'mhs_lulus_maret' => rand(0, 20), // Random number between 0 and 20 for students graduating in March
            'mhs_lulus_april' => rand(0, 20), // Random number between 0 and 20 for students graduating in April
            'mhs_lulus_mei' => rand(0, 20), // Random number between 0 and 20 for students graduating in May
            'mhs_lulus_juni' => rand(0, 20), // Random number between 0 and 20 for students graduating in June
            'mhs_lulus_juli' => rand(0, 20), // Random number between 0 and 20 for students graduating in July
            'mhs_lulus_agustus' => rand(0, 20), // Random number between 0 and 20 for students graduating in August
            'mhs_lulus_september' => rand(0, 20), // Random number between 0 and 20 for students graduating in September
            'mhs_lulus_oktober' => rand(0, 20), // Random number between 0 and 20 for students graduating in October
            'mhs_lulus_november' => rand(0, 20), // Random number between 0 and 20 for students graduating in November
            'mhs_lulus_desember' => rand(0, 20), // Random number between 0 and 20 for students graduating in December
            'mhs_lulus_ta' => rand(0, 20), // Random number between 0 and 20 for students graduating throughout the academic year
        ];
    }

    foreach ($allrekap as $p) {
        AllRekap::query()->insert($p);
    }
}
}
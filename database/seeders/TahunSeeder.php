<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Tahun;


class TahunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Menghapus semua data lama di tabel tahun
        DB::table('tahun')->truncate();

        // Menyiapkan array untuk data tahun
        $tahunArray = [];

        // Mengisi array dengan data tahun dari 2012/2013 hingga 2023/2024
        for ($tahun = 2012; $tahun <= 2023; $tahun++) {
            $tahunArray[] = ['ts' => $tahun . '/' . ($tahun + 1)];
        }

        // Memasukkan data tahun ke dalam tabel tahun
        DB::table('tahun')->insert($tahunArray);
    }
    

}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormBukrim;

class FormBukrimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            $prodi_id = rand(1, 21);
    
            FormBukrim::create([
                'prodi_id' => $prodi_id,
                'nama_dok' => 'Pembayaran UKT',
                'nama' => 'Sukrocky',
                'nim' => '120140001', 
                'jenis_berkas' => 'Bukti Pembayaran UKT',
                'jumlah_dok' => rand(1, 10),
            ]);
        }
    }
}
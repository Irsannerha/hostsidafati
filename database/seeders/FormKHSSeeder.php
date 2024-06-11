<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormKHS;

class FormKHSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            $prodi_id = rand(1, 21);

            FormKHS::create([
                'prodi_id' => $prodi_id,
                'nama' => 'Sukrocky',
                'nim' => '120140001',
                'no_hp_mhs' => '08123456789',
                'email' => 'mahasiswa' . $i . '@student.itera.ac.id',
                'keperluan' => 'KHS',
                'jumlah' => rand(1, 10),
                'status' => 'Selesai',
                'keterangan' => 'Permohonan Izin KHS Diterima',
            ]);
        }
    }
}

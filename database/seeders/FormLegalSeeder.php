<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormLegal;

class FormLegalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            $prodi_id = rand(1, 21);

            $keperluan_options = ['Ijazah', 'Akreditasi Prodi', 'Transkrip', 'Ijazah dan Transkrip', 'Ijazah, Transkrip dan Akreditasi', 'Dokumen Lainnya'];
            $random_keperluan = $keperluan_options[array_rand($keperluan_options)];

            FormLegal::create([
                'prodi_id' => $prodi_id,
                'nama' => 'Sukrocky',
                'nim' => '120140001',
                'no_hp_mhs' => '08123456789',
                'email' => 'mahasiswa' . $i . '@student.itera.ac.id',
                'keperluan' => $random_keperluan,
                'status' => 'Diproses',
                'keterangan' => 'Permohonan Izin Diterima',
                'jumlah_legal' => rand(1, 10),
            ]);

        }
    }
}

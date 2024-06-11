<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormRekom;

class FormRekomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            $prodi_id = rand(1, 21);

            FormRekom::create([
                'prodi_id' => $prodi_id,
                'nama' => 'Sukrocky',
                'nim' => '120140001',
                'no_hp_mhs' => '08123456789',
                'instansi' => 'Telkomsel Telecommunication Center Lampung',
                'alamat_instansi' => 'Jalan. Soekarno Hatta No. 10, Bandar Lampung',
                'jerekom' => 'MBKM',
                'deskripsi' => 'Rekomendasi',
                'status' => 'Diproses',
                'keterangan' => 'Permohonan Izin Diterima',
                
            ]);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormWcr;

class FormWcrSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            // Untuk memastikan bahwa prodi_id hanya dari 1 sampai 50
            $prodi_id = rand(1, 21);

            FormWcr::create([
                'prodi_id' => $prodi_id,
                'nama' => 'Mahasiswa ' . $i,
                'nim' => '1234567890',
                'instansi' => 'Telkomsel Telecommunication Center Lampung',
                'alamat_instansi' => 'Jalan. Soekarno Hatta No. 10, Bandar Lampung',
                'status' => 'Diproses',
                'keterangan' => 'Permohonan Izin Diterima',
            ]);
        }
    }
}

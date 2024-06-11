<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormKP;

class FormKPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 2; $i++) {
            // Untuk memastikan bahwa prodi_id hanya dari 1 sampai 50
            $prodi_id = rand(1, 21);

            FormKP::create([
                'prodi_id' => $prodi_id,
                'nama' => 'Mahasiswa ' . $i,
                'nim' => '1234567890',
                'instansi' => 'Telkomsel Telecommunication Center Lampung',
                'alamat_instansi' => 'Jalan. Soekarno Hatta No. 10, Bandar Lampung',
                'tjp' => 'Teman nya Mahasiswa ' . $i,
                'waktu_mulai_pelaksanaan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'waktu_akhir_pelaksanaan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'no_hp_mhs' => '08123456789',
                'email' => 'mahasiswa' . $i . '@student.itera.ac.id',
                'status' => 'Diproses',
                'keterangan' => 'Permohonan Izin KP Diterima',
            ]);
        }
    }
}

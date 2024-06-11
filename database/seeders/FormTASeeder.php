<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormTA;

class FormTASeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 1; $i++) {
            // Untuk memastikan bahwa prodi_id hanya dari 1 sampai 50
            $prodi_id = rand(1, 22);
            
            FormTA::create([
                'prodi_id' => $prodi_id,
                'nama' => 'Mahasiswa ' . $i,
                'nim' => '120140000' . $i,
                'keperluan' => 'Permohonan Izin Penelitian Tugas Akhir',
                'instansi' => 'Telkomsel Telecommunication Center Lampung',
                'alamat_instansi' => 'Jalan. Soekarno Hatta No. 10, Bandar Lampung',
                'tjp' => 'Teman nya Mahasiswa ' . $i,
                'pelaksanaan' => 'Offline',
                'waktu_mulai_pelaksanaan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'waktu_akhir_pelaksanaan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'no_hp' => '08123456789',
                'email' => 'mahasiswa' . $i . '@student.itera.ac.id',
                'nama_pembimbing_satu' => 'Nama Pembimbing 1',
                'nama_pembimbing_dua' => 'Nama Pembimbing 2',
                'judul' => 'Judul Tugas Akhir Mahasiswa ' . $i,
                'status' => 'Diproses',
                'keterangan' => 'Permohonan Izin Penelitian Tugas Akhir Diterima',
            ]);
        }
    }
}

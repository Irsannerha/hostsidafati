<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Models\Kegiatan;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    for ($i = 1; $i <= 21; $i++) {
        // Untuk memastikan bahwa prodi_id hanya dari 1 sampai 50
        $prodi_id = rand(1, 22);
        
        Kegiatan::create([
            'prodi_id' => $prodi_id,
            'email' => 'mahasiswa' . $i . '@student.itera.ac.id',
            'nama_kegiatan' => 'TTC (Telkomsel Telecommunication Center Lampung) ' . $i,
            'tgl_kegiatan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
            'mulai_kegiatan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
            'akhir_kegiatan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
            'tempat_pelaksanaan' => 'TTC (Telkomsel Telecommunication Center Lampung) ' . $i,
            'jumlah_peserta' => rand(50, 500),
            'penanggung_jawab' => 'Temen nya Mahasiswa ' . $i,
            'nama_pemohon' => 'Si Mahasiswa Syahlan, Bin Cokcok' . $i,
            'no_hp' => '08123456789',
            'status' => Arr::random(['Diproses', 'Disetujui', 'Ditolak']),
            'keterangan' => 'Berkas Lengkap, Tidak ada masalah.',
        ]);
    }
}
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestasi;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            // Persiapkan data untuk Prestasi
            $prestasiData = [
                'prodi_id' => $i,
                'nama_tim' => 'Timnas ITERA ' . $i,
                'nama_mahasiswa' => 'Mahasiswa Fulan bin Fulan ' . $i,
                'nim' => '120990010' . $i,
                'kontak' => '08123456789',
                'jenis_prestasi' => 'Juara ' . $i,
                'jumlah_peserta' => rand(50, 500),
                'kategori_olahraga' => 'Olahraga ' . $i,
                'tahun_kegiatan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'url_penyelenggara' => 'https://www.itera.ac.id',
                'nama_penyelenggara' => 'ITERA',
                'tgl_kegiatan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'tingkat_kejuaraan' => 'Nasional',
                'judul_karya' => 'Judul Karya Ini panjang tak terkira yaa. ' . $i,
                'anggota_karya' => 'Anggota Karya,  Anggota Karya, Anggota Karya, Anggota Karya,' . $i,
                'foto' => json_encode([
                    'foto1.jpg',
                    'foto2.jpg',
                    'foto3.jpg',
                ]),
            ];


            // Buat entitas Prestasi
            Prestasi::create($prestasiData);
        }
    }
}

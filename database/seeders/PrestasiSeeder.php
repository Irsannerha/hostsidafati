<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prestasi;
use Carbon\Carbon;

class PrestasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 95; $i++) {
            // Generate random prodi_id between 1 and 21
            $prodi_id = rand(1, 21);

            // Generate random year, month, and day for date fields
            $randomYear = rand(1, 10);
            $randomMonth = rand(0, 11);
            $randomDay = rand(0, 30);
            $randomDate = now()->subYears($randomYear)->subMonths($randomMonth)->subDays($randomDay);

            // Persiapkan data untuk Prestasi
            $prestasiData = [
                'prodi_id' => $prodi_id,
                'nama_tim' => 'Timnas ITERA ' . $i,
                'nama_mahasiswa' => 'Mahasiswa Fulan bin Fulan ' . $i,
                'nim' => '120990010' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'kontak' => '08123456789',
                'jenis_prestasi' => 'Juara ' . $i,
                'jumlah_peserta' => rand(50, 500),
                'kategori_olahraga' => 'Olahraga ' . $i,
                'tahun_kegiatan' => $randomDate,
                'url_penyelenggara' => 'https://www.itera.ac.id',
                'nama_penyelenggara' => 'ITERA',
                'tgl_kegiatan' => Carbon::createFromFormat('Y-m-d', '2024-01-01')->addDays(rand(0, 364)),
                'tingkat_kejuaraan' => 'Nasional',
                'judul_karya' => 'Judul Karya Ini panjang tak terkira yaa. ' . $i,
                'anggota_karya' => 'Anggota Karya, Anggota Karya, Anggota Karya, Anggota Karya,' . $i,
                'foto' => json_encode([
                    '["1718969014_Foto_1_1210101.png","1718969014_Foto_2_1210101.png","1718969014_Foto_3_1210101.png"]',
                    '["1718969014_Foto_1_1210101.png","1718969014_Foto_2_1210101.png","1718969014_Foto_3_1210101.png"]',
                    '["1718969014_Foto_1_1210101.png","1718969014_Foto_2_1210101.png","1718969014_Foto_3_1210101.png"]',
                ]),
            ];

            // Buat entitas Prestasi
            Prestasi::create($prestasiData);
        }
    }
}

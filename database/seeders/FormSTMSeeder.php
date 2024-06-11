<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FormSTM;

class FormSTMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instansi_list = [
            'Telkomsel Telecommunication Center Lampung',
            'PT. Indofood Sukses Makmur Tbk',
            'PT. Bank Central Asia (BCA) Tbk',
            'PT. Garuda Indonesia (Persero) Tbk',
            'PT. Telekomunikasi Indonesia (Telkom) Tbk',
            // Tambahkan instansi lainnya di sini sesuai kebutuhan
        ];
        
        for ($i = 1; $i <= 4; $i++) {
            $prodi_id = rand(1, 21);
        
            $jenis_surat_tugas = [
                'Surat Tugas Kerja Praktik (KP)',
                'Surat Tugas Akhir (TA)',
                'Surat Tugas Lomba',
                'Surat Tugas Lainnya'
            ];
            $random_jenis_surat_tugas = $jenis_surat_tugas[array_rand($jenis_surat_tugas)];
        
            $random_instansi = $instansi_list[array_rand($instansi_list)];
        
            FormSTM::create([
                'prodi_id' => $prodi_id,
                'nama' => 'Sukrocky',
                'nim' => '120140001',
                'instansi' => $random_instansi, // Menggunakan instansi yang dipilih secara acak
                'tgl_bls' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'tgl_mulai_pelaksanaan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'tgl_akhir_pelaksanaan' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'jenis_surat_tugas' => $random_jenis_surat_tugas,
                'status' => 'Diproses',
                'keterangan' => 'Permohonan Izin Diterima',
            ]);
        }
        
    }
}

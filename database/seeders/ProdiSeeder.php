<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodiNames = [
            'TEKNIK BIOMEDIS',
            'TEKNIK BIOSISTEM',
            'TEKNIK ELEKTRO',
            'TEKNIK FISIKA',
            'TEKNIK GEOFISIKA',
            'TEKNIK GEOLOGI',
            'TEKNIK INFORMATIKA',
            'TEKNIK INDUSTRI',
            'TEKNIK KIMIA',
            'TEKNIK MATERIAL',
            'TEKNIK MESIN',
            'TEKNIK PERTAMBANGAN',
            'TEKNIK SISTEM ENERGI',
            'TEKNIK TELEKOMUNIKASI',
            'TEKNOLOGI INDUSTRI PERTANIAN',
            'TEKNOLOGI PANGAN',
            'REKAYASA INSTRUMENTASI DAN AUTOMASI',
            'REKAYASA KEHUTANAN',
            'REKAYASA KEOLAHRAGAAN',
            'REKAYASA KOSMETIK',
            'REKAYASA MINYAK DAN GAS',
        ];
    
        for ($i = 0; $i < count($prodiNames); $i++) {
            Prodi::create([
                'prodi' => $prodiNames[$i],
                'foto' => '/vendors/images/user-profile.png',
                'email' => 'prodi' . ($i + 1) . '@fti.itera.ac.id',
                'kapro' => 'Fulan Bin Fulansyah ' . ($i + 1),
                'fakultas' => 'Fakultas Teknologi Industri ' . (($i % 3) + 1),
                'prodik' => 'Strata (S1)',
                'akreditasi' => 'A',
                'jumlah_mahasiswa' => rand(50, 500),
                'tgl_pendirian' => now()->subYears(rand(1, 10))->subMonths(rand(0, 11))->subDays(rand(0, 30)),
                'deskripsi' => 'Ini Deskripsi Prodi ' . ($i + 1),
            ]);
        }
    }
    
}

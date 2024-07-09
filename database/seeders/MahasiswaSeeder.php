<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Carbon\Carbon;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mahasiswa =  [
            [
                'nim'=>121140142,
                'id_dosen_wali'=>'199208212019031023',
                'foto_profile'=>'-',
                'nama'=>'fadhil firoos',
                'slug_mahasiswa'=>'fadhil-firoos',
                'fakultas'=>'Fakultas Teknologi Industri',
                'kode_prodi'=>7,
                'email'=>'Mahasiswa@test.com',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),

            ]
        ];

        Mahasiswa::query()->insert($mahasiswa);
    }
}

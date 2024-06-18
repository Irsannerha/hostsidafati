<?php

namespace Database\Seeders;

use App\Models\Wafat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WafatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'prodi_id' => 1,
                'ts_id' => 1,
                'mhs_wafat_genap' => 1,
                'mhs_wafat_ganjil' => 2,
            ],
        
        ];
    
        foreach ($data as $item) {
            Wafat::create($item);
        }
    }
}    
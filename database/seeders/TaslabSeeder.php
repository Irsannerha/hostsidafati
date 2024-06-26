<?php

namespace Database\Seeders;

use App\Models\Taslab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaslabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    $taslabTemplate = [
        [
            'nama' => 'Abdul Aziz, S.T',
            'unit_kerja' => 'MS',
            'pendidikan' => 'Strata S1',
            'tmt' => '2019-10-01',
            'status_pegawai' => 'ASN',
            'jabatan' => 'Laboran',
            'bagian_tugas' => 'Pranata Laboratorium Pendidikan Teknik Mesin',
            'nitk' => '770023126',
            'tgl_lahir' => '1994-04-04',
            'no_hp' => '081234567890',
            'email' => 'abdul.aziz' . '@staff.itera.ac.id',
        ],
        [
            'nama' => 'Achmad Samudra Dewantara, S.T.',
            'unit_kerja' => 'TI',
            'pendidikan' => 'Magister S2',
            'tmt' => '2020-11-02',
            'status_pegawai' => 'ASN',
            'jabatan' => 'Laboran',
            'bagian_tugas' => 'Pranata Laboratorium Pendidikan Teknik Industri',
            'nitk' => '1234567890',
            'tgl_lahir' => '1996-03-14',
            'no_hp' => '081234567890',
            'email' => 'achmad.dewantara' . '@staff.itera.ac.id',
        ],
    ];

    foreach ($taslabTemplate as $data) {
        Taslab::query()->insert($data);
    }
}
}
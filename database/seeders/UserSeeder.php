<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $usersTemplate = [
            [
                'name' => 'Super Admin',
                'email' => 'superadmin@harmonyfti',
                'role' => 'superadmin',
                'status' => 'aktif',
                'password' => Hash::make('superadmin@harmonyfti')
            ],
            [
                'name' => 'Pegawai',
                'email' => 'adminpegawai@harmonyfti',
                'role' => 'pegawai',
                'status' => 'aktif',
                'password' => Hash::make('admin@harmonyfti')
            ],
            [
                'name' => 'Akademik',
                'email' => 'adminakademik@harmonyfti',
                'role' => 'akademik',
                'status' => 'aktif',
                'password' => Hash::make('admin@harmonyfti')
            ],
            [
                'name' => 'Kemahasiswaan',
                'email' => 'adminkemahasiswaan@harmonyfti',
                'role' => 'kemahasiswaan',
                'status' => 'aktif',
                'password' => Hash::make('admin@harmonyfti')
            ],
            [
                'name' => 'Keuangan',
                'email' => 'adminkeuangan@harmonyfti',
                'role' => 'keuangan',
                'status' => 'aktif',
                'password' => Hash::make('admin@harmonyfti')
            ],
            [
                'name' => 'Prodi',
                'email' => 'adminprodi@harmonyfti',
                'role' => 'prodi',
                'status' => 'aktif',
                'password' => Hash::make('admin@harmonyfti')
            ],
        ];
    
        // // Variabel untuk menyimpan data pengguna
        // $allUsers = [];
    
        // // Perulangan sebanyak 15 kali
        // for ($i = 0; $i < 15; $i++) {
        //     // Ambil data dari array contoh berdasarkan indeks perulangan
        //     $user = $usersTemplate[$i % count($usersTemplate)];
            
        //     // Tambahkan email yang unik untuk setiap data
        //     $user['email'] = str_replace('@fti.itera.ac.id', sprintf('%d@fti.itera.ac.id', $i), $user['email']);
            
        //     // Tambahkan data pengguna ke dalam array
        //     $allUsers[] = $user;
        // }
    
        // Masukkan data pengguna ke dalam database
        User::query()->insert($usersTemplate);
    }
   
}

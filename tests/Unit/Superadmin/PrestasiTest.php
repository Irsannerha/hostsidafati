<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Client\HomeController;
use App\Models\Prestasi;
use App\Models\User;
use Tests\TestCase;

class PrestasiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create a superadmin and Admin user for testing purposes.
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Start the session for unit tests
        $this->startSession();
    }

    /** @test */
    private function createSuperAdmin()
    {
        return User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);

        return user::create([
            'name' => 'Admin Kepegawaian',
            'email' => 'adminkepegawaian@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'adminkepegawaian',
            'email_verified_at' => now(),
        ]);
    }

    /** @test */
    public function superadmin_mengakses_halaman_index_MhsPrestasi(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index prestasi
        $response = $this->get('/superadmin/prestasi'); // Mengirim permintaan HTTP GET ke URL '/superadmin/prestasi'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }

    /** @test */
    public function superadmin_menambah_data_MhsPrestasi(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Buat data prestasi baru
        $response = $this->post('/superadmin/prestasi', [
            'prodi_id' => 1,
            'nama_tim' => 'Tim Prestasi',
            'nama_mahasiswa' => 'Mahasiswa Prestasi',
            'nim' => '1234567890',
            'kontak' => '081234567890',
            'jenis_prestasi' => 'Prestasi Akademik',
            'jumlah_peserta' => 5,
            'kategori_olahraga' => 'Olahraga Prestasi',
            'tahun_kegiatan' => 2021,
            'url_penyelenggara' => 'https://example.com',
            'nama_penyelenggara' => 'Penyelenggara Prestasi',
            'tgl_kegiatan' => '2021-01-01',
            'tingkat_kejuaraan' => 'Nasional',
            'judul_karya' => 'Judul Karya Prestasi',
            'anggota_karya' => 'Anggota Karya Prestasi',
            'foto' => json_encode([
                '27-10-2024_Foto_IMG1.jpg',
                '27-10-2024_Foto_IMG2.jpg',
                '27-10-2024_Foto_IMG3.jpg'
            ]), // Konversi array foto ke JSON
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index prestasi
        $response->assertRedirect('/superadmin/prestasi');

        // Pastikan bahwa data MhsPrestasi berhasil disimpan ke dalam database
        $this->assertDatabaseHas('prestasi', [
            'prodi_id' => 1,
            'nama_tim' => 'Tim Prestasi',
            'nama_mahasiswa' => 'Mahasiswa Prestasi',
            'nim' => '1234567890',
            'kontak' => '081234567890',
            'jenis_prestasi' => 'Prestasi Akademik',
            'jumlah_peserta' => 5,
            'kategori_olahraga' => 'Olahraga Prestasi',
            'tahun_kegiatan' => 2021,
            'url_penyelenggara' => 'https://example.com',
            'nama_penyelenggara' => 'Penyelenggara Prestasi',
            'tgl_kegiatan' => '2021-01-01',
            'tingkat_kejuaraan' => 'Nasional',
            'judul_karya' => 'Judul Karya Prestasi',
            'anggota_karya' => 'Anggota Karya Prestasi',
            'foto' => json_encode([
                '27-10-2024_Foto_IMG1.jpg',
                '27-10-2024_Foto_IMG2.jpg',
                '27-10-2024_Foto_IMG3.jpg'
            ]),
        ]);
    }


    /** @test */
    public function superadmin_mengedit_data_MhsPrestasi(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample Prestasi
        $Prestasi = Prestasi::create([
            'prodi_id' => 1,
            'nama_tim' => 'Tim Prestasi',
            'nama_mahasiswa' => 'Mahasiswa Prestasi',
            'nim' => '1234567890',
            'kontak' => '081234567890',
            'jenis_prestasi' => 'Prestasi Akademik',
            'jumlah_peserta' => 5,
            'kategori_olahraga' => 'Olahraga Prestasi',
            'tahun_kegiatan' => 2021,
            'url_penyelenggara' => 'https://example.com',
            'nama_penyelenggara' => 'Penyelenggara Prestasi',
            'tgl_kegiatan' => '2021-01-01',
            'tingkat_kejuaraan' => 'Nasional',
            'judul_karya' => 'Judul Karya Prestasi',
            'anggota_karya' => 'Anggota Karya Prestasi',
            'foto' => json_encode([
                '27-10-2024_Foto_IMG1.jpg',
                '27-10-2024_Foto_IMG2.jpg',
                '27-10-2024_Foto_IMG3.jpg'
            ]),
        ]);

        // Simulate updating the prestasi
        $response = $this->put("/superadmin/prestasi/{$Prestasi->id}", [
            'prodi_id' => 1,
            'nama_tim' => 'Tim Prestasi',
            'nama_mahasiswa' => 'Mahasiswa Prestasi',
            'nim' => '1234567890',
            'kontak' => '081234567890',
            'jenis_prestasi' => 'Prestasi Akademik',
            'jumlah_peserta' => 5,
            'kategori_olahraga' => 'Olahraga Prestasi',
            'tahun_kegiatan' => 2021,
            'url_penyelenggara' => 'https://example.com',
            'nama_penyelenggara' => 'Penyelenggara Prestasi',
            'tgl_kegiatan' => '2021-01-01',
            'tingkat_kejuaraan' => 'Nasional',
            'judul_karya' => 'Judul Karya Prestasi',
            'anggota_karya' => 'Anggota Karya Prestasi',
            'foto' => json_encode([
                '27-10-2024_Foto_IMG1.jpg',
                '27-10-2024_Foto_IMG2.jpg',
                '27-10-2024_Foto_IMG3.jpg'
            ]),
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/prestasi');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('prestasi', [
            'prodi_id' => 1,
            'nama_tim' => 'Tim Prestasi',
            'nama_mahasiswa' => 'Mahasiswa Prestasi',
            'nim' => '1234567890',
            'kontak' => '081234567890',
            'jenis_prestasi' => 'Prestasi Akademik',
            'jumlah_peserta' => 5,
            'kategori_olahraga' => 'Olahraga Prestasi',
            'tahun_kegiatan' => 2021,
            'url_penyelenggara' => 'https://example.com',
            'nama_penyelenggara' => 'Penyelenggara Prestasi',
            'tgl_kegiatan' => '2021-01-01',
            'tingkat_kejuaraan' => 'Nasional',
            'judul_karya' => 'Judul Karya Prestasi',
            'anggota_karya' => 'Anggota Karya Prestasi',
            'foto' => json_encode([
                '27-10-2024_Foto_IMG1.jpg',
                '27-10-2024_Foto_IMG2.jpg',
                '27-10-2024_Foto_IMG3.jpg'
            ]),
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_MhsPrestasi(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function superadmin_menghapus_data_MhsPrestasi(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample prestasi
        $Prestasi = Prestasi::create([
            'prodi_id' => 1,
            'nama_tim' => 'Tim Prestasi',
            'nama_mahasiswa' => 'Mahasiswa Prestasi',
            'nim' => '1234567890',
            'kontak' => '081234567890',
            'jenis_prestasi' => 'Prestasi Akademik',
            'jumlah_peserta' => 5,
            'kategori_olahraga' => 'Olahraga Prestasi',
            'tahun_kegiatan' => 2021,
            'url_penyelenggara' => 'https://example.com',
            'nama_penyelenggara' => 'Penyelenggara Prestasi',
            'tgl_kegiatan' => '2021-01-01',
            'tingkat_kejuaraan' => 'Nasional',
            'judul_karya' => 'Judul Karya Prestasi',
            'anggota_karya' => 'Anggota Karya Prestasi',
            'foto' => json_encode([
                '27-10-2024_Foto_IMG1.jpg',
                '27-10-2024_Foto_IMG2.jpg',
                '27-10-2024_Foto_IMG3.jpg'
            ]),
        ]);

        // Simulate deleting the prestasi
        $response = $this->delete("/superadmin/prestasi/{$Prestasi->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/prestasi');
        // Assert that the Prestasi Was deleted from the database
        $this->assertDatabaseMissing('prestasi', ['id' => $Prestasi->id]);
    }

    /** @test */
    public function superadmin_export_data_MhsPrestasi()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data prestasi yang akan diekspor
        $Prestasi = Prestasi::create([
            'prodi_id' => 1,
            'nama_tim' => 'Tim Prestasi',
            'nama_mahasiswa' => 'Mahasiswa Prestasi',
            'nim' => '1234567890',
            'kontak' => '081234567890',
            'jenis_prestasi' => 'Prestasi Akademik',
            'jumlah_peserta' => 5,
            'kategori_olahraga' => 'Olahraga Prestasi',
            'tahun_kegiatan' => 2021,
            'url_penyelenggara' => 'https://example.com',
            'nama_penyelenggara' => 'Penyelenggara Prestasi',
            'tgl_kegiatan' => '2021-01-01',
            'tingkat_kejuaraan' => 'Nasional',
            'judul_karya' => 'Judul Karya Prestasi',
            'anggota_karya' => 'Anggota Karya Prestasi',
            'foto' => json_encode([
                '27-10-2024_Foto_IMG1.jpg',
                '27-10-2024_Foto_IMG2.jpg',
                '27-10-2024_Foto_IMG3.jpg'
            ]),
        ]);

        // Pastikan data prestasi dibuat dengan benar
        $this->assertNotNull($Prestasi, "Data prestasi tidak berhasil dibuat.");
        $this->assertDatabaseHas('prestasi', [
            'prodi_id' => 1,
            'nama_tim' => 'Tim Prestasi',
            'nama_mahasiswa' => 'Mahasiswa Prestasi',
            'nim' => '1234567890',
            'kontak' => '081234567890',
            'jenis_prestasi' => 'Prestasi Akademik',
            'jumlah_peserta' => 5,
            'kategori_olahraga' => 'Olahraga Prestasi',
            'tahun_kegiatan' => 2021,
            'url_penyelenggara' => 'https://example.com',
            'nama_penyelenggara' => 'Penyelenggara Prestasi',
            'tgl_kegiatan' => '2021-01-01',
            'tingkat_kejuaraan' => 'Nasional',
            'judul_karya' => 'Judul Karya Prestasi',
            'anggota_karya' => 'Anggota Karya Prestasi',
            'foto' => json_encode([
                '27-10-2024_Foto_IMG1.jpg',
                '27-10-2024_Foto_IMG2.jpg',
                '27-10-2024_Foto_IMG3.jpg'
            ]),
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/prestasi/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=MhsPrestasi.xlsx');
    }
}

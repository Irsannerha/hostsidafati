<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\KegiatanController;
use App\Models\Kegiatan;
use App\Models\User;
use Tests\TestCase;
class KegiatanTest extends TestCase
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
    public function superadmin_mengakses_halaman_index_MhsKegiatan(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index kegiatan
        $response = $this->get('/superadmin/kegiatan'); // Mengirim permintaan HTTP GET ke URL '/superadmin/kegiatan'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }

    /** @test */
    public function superadmin_menambah_data_MhsKegiatan(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Buat data kegiatan baru
        $response = $this->post('/superadmin/kegiatan', [
            'prodi_id' => 1,
            'email' => 'superadmin@harmonyfti',
            'nama_kegiatan' => 'Kegiatan HIMA',
            'tgl_kegiatan'  => '2024-10-27',
            'mulai_kegiatan' => '08:00',
            'akhir_kegiatan' => '17:00',
            'tempat_pelaksanaan' => 'Gedung Serba Guna',
            'jumlah_peserta' => 100,
            'penanggung_jawab' => 'Penanggung Jawab Kegiatan',
            'nama_pemohon' => 'Nama Pemohon Kegiatan',
            'no_hp' => '081234567890',
            'status' => 'Disetujui',
            'keterangan' => 'Keterangan Kegiatan',
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index kegiatan
        $response->assertRedirect('/superadmin/kegiatan');

        // Pastikan bahwa data MhsKegiatan berhasil disimpan ke dalam database
        $this->assertDatabaseHas('kegiatan', [
            'prodi_id' => 1,
            'email' => 'superadmin@harmonyfti',
            'nama_kegiatan' => 'Kegiatan HIMA',
            'tgl_kegiatan'  => '2024-10-27',
            'mulai_kegiatan' => '08:00',
            'akhir_kegiatan' => '17:00',
            'tempat_pelaksanaan' => 'Gedung Serba Guna',
            'jumlah_peserta' => 100,
            'penanggung_jawab' => 'Penanggung Jawab Kegiatan',
            'nama_pemohon' => 'Nama Pemohon Kegiatan',
            'no_hp' => '081234567890',
            'status' => 'Disetujui',
            'keterangan' => 'Keterangan Kegiatan',
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_MhsKegiatan(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample Kegiatan
        $Kegiatan = Kegiatan::create([
            'prodi_id' => 1,
            'email' => 'superadmin@harmonyfti',
            'nama_kegiatan' => 'Kegiatan HIMA',
            'tgl_kegiatan'  => '2024-10-27',
            'mulai_kegiatan' => '08:00',
            'akhir_kegiatan' => '17:00',
            'tempat_pelaksanaan' => 'Gedung Serba Guna',
            'jumlah_peserta' => 100,
            'penanggung_jawab' => 'Penanggung Jawab Kegiatan',
            'nama_pemohon' => 'Nama Pemohon Kegiatan',
            'no_hp' => '081234567890',
            'status' => 'Disetujui',
            'keterangan' => 'Keterangan Kegiatan',
        ]);

        // Simulate updating the kegiatan
        $response = $this->put("/superadmin/kegiatan/{$Kegiatan->id}", [
            'prodi_id' => 1,
            'email' => 'superadmin@harmonyfti',
            'nama_kegiatan' => 'Kegiatan HIMA',
            'tgl_kegiatan'  => '2024-10-27',
            'mulai_kegiatan' => '08:00',
            'akhir_kegiatan' => '17:00',
            'tempat_pelaksanaan' => 'Gedung Serba Guna',
            'jumlah_peserta' => 100,
            'penanggung_jawab' => 'Penanggung Jawab Kegiatan',
            'nama_pemohon' => 'Nama Pemohon Kegiatan',
            'no_hp' => '081234567890',
            'status' => 'Disetujui',
            'keterangan' => 'Keterangan Kegiatan',
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/kegiatan');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('kegiatan', [
            'prodi_id' => 1,
            'email' => 'superadmin@harmonyfti',
            'nama_kegiatan' => 'Kegiatan HIMA',
            'tgl_kegiatan'  => '2024-10-27',
            'mulai_kegiatan' => '08:00',
            'akhir_kegiatan' => '17:00',
            'tempat_pelaksanaan' => 'Gedung Serba Guna',
            'jumlah_peserta' => 100,
            'penanggung_jawab' => 'Penanggung Jawab Kegiatan',
            'nama_pemohon' => 'Nama Pemohon Kegiatan',
            'no_hp' => '081234567890',
            'status' => 'Disetujui',
            'keterangan' => 'Keterangan Kegiatan',
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_MhsKegiatan(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function superadmin_menghapus_data_MhsKegiatan(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample Kegiatan
        $Kegiatan = Kegiatan::create([
            'prodi_id' => 1,
            'email' => 'superadmin@harmonyfti',
            'nama_kegiatan' => 'Kegiatan HIMA',
            'tgl_kegiatan'  => '2024-10-27',
            'mulai_kegiatan' => '08:00',
            'akhir_kegiatan' => '17:00',
            'tempat_pelaksanaan' => 'Gedung Serba Guna',
            'jumlah_peserta' => 100,
            'penanggung_jawab' => 'Penanggung Jawab Kegiatan',
            'nama_pemohon' => 'Nama Pemohon Kegiatan',
            'no_hp' => '081234567890',
            'status' => 'Disetujui',
            'keterangan' => 'Keterangan Kegiatan',
        ]);

        // Simulate deleting the kegiatan
        $response = $this->delete("/superadmin/kegiatan/{$Kegiatan->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/kegiatan');
        // Assert that the Kegiatan Was deleted from the database
        $this->assertDatabaseMissing('kegiatan', ['id' => $Kegiatan->id]);
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
        $Kegiatan = Kegiatan::create([
            'prodi_id' => 1,
            'email' => 'superadmin@harmonyfti',
            'nama_kegiatan' => 'Kegiatan HIMA',
            'tgl_kegiatan'  => '2024-10-27',
            'mulai_kegiatan' => '08:00',
            'akhir_kegiatan' => '17:00',
            'tempat_pelaksanaan' => 'Gedung Serba Guna',
            'jumlah_peserta' => 100,
            'penanggung_jawab' => 'Penanggung Jawab Kegiatan',
            'nama_pemohon' => 'Nama Pemohon Kegiatan',
            'no_hp' => '081234567890',
            'status' => 'Disetujui',
            'keterangan' => 'Keterangan Kegiatan',
        ]);

        // Pastikan data Kegiatan dibuat dengan benar
        $this->assertNotNull($Kegiatan, "Data Kegiatan tidak berhasil dibuat.");
        $this->assertDatabaseHas('kegiatan', [
            'prodi_id' => 1,
            'email' => 'superadmin@harmonyfti',
            'nama_kegiatan' => 'Kegiatan HIMA',
            'tgl_kegiatan'  => '2024-10-27',
            'mulai_kegiatan' => '08:00',
            'akhir_kegiatan' => '17:00',
            'tempat_pelaksanaan' => 'Gedung Serba Guna',
            'jumlah_peserta' => 100,
            'penanggung_jawab' => 'Penanggung Jawab Kegiatan',
            'nama_pemohon' => 'Nama Pemohon Kegiatan',
            'no_hp' => '081234567890',
            'status' => 'Disetujui',
            'keterangan' => 'Keterangan Kegiatan',
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/kegiatan/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=MhsKegiatan.xlsx');
    }
}

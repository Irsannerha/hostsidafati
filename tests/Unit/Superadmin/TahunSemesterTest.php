<?php

namespace Tests\Unit;

use App\Models\Tahun;
use App\Models\User;
use Tests\TestCase;

class TahunSemesterTest extends TestCase
{
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
    public function superadmin_mengakses_halaman_index_tahun_semester()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index tahun
        $response = $this->get('/superadmin/tahun'); // Mengirim permintaan HTTP GET ke URL '/superadmin/tahun'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }

    /** @test */
    public function superadmin_menambah_data_tahun_semester()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Membuat data tahun baru
        $response = $this->post('/superadmin/tahun', [
            'ts' => '2021/2022',
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index tahun
        $response->assertRedirect('/superadmin/tahun');

        // Pastikan bahwa data tahun berhasil disimpan ke dalam database
        $this->assertDatabaseHas('tahun', [
            'ts' => '2021/2022',
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_tahun_semester()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample tahun
        $tahun = Tahun::create([
            'ts' => '2021/2022',
        ]);

        // Simulate updating the tahun
        $response = $this->put("/superadmin/tahun/{$tahun->id}", [
            'ts' => '2022/2023',
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/tahun');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('tahun', [
            'ts' => '2022/2023',
        ]);
    }

    /** @test */
    public function superadmin_menghapus_data_tahun_semester()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample tahun
        $tahun = Tahun::create([
            'ts' => '2021/2022',
        ]);

        // Simulate deleting the tahun
        $response = $this->delete("/superadmin/tahun/{$tahun->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/tahun');
        // Assert that the tahun was deleted from the database
        $this->assertDatabaseMissing('tahun', ['id' => $tahun->id]);
    }
}

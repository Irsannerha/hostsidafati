<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase; 

class AdminKepegawaianTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    /** @test */
    public function AdminKepegawaian_access_to_login_website(): void
    {
        $response = $this->get('/login'); 
        $response->assertStatus(200);
    }

    /** @test */
    public function AdminKepegawaian_login_success(): void
    {
        $adminKepegawaian = User::create([
            'name' => 'Admin Kepegawaian',
            'email' => 'adminpegawai@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'pegawai',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'adminpegawai@harmonyfti',
            'password' => 'password',
        ]);

        $response->assertRedirect('/pegawai/dashboard');
        $this->assertAuthenticatedAs($adminKepegawaian);
    }

    /** @test */
    public function AdminKepegawaian_login_failed(): void
    {
        // Create a adminKepegawaian user
        User::create([
            'name' => 'Admin Kepegawaian',
            'email' => 'adminpegawai@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'pegawai',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'adminpegawai@harmonyfti',
            'password' => 'wrongpassword',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Email atau passwordnya salah nih, coba dicek lagi ya.');
    }

    /** @test */
    public function AdminKepegawaian_access_dashboard_utama(): void
    {
        $adminKepegawaian = User::create([
            'name' => 'Admin Kepegawaian',
            'email' => 'adminpegawai@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'pegawai',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($adminKepegawaian);
        $this->withoutMiddleware();
        $response = $this->get('/pegawai/dashboard');
        $response->assertStatus(200);
    }

    /** @test */
    public function AdminKepegawaian_mengakses_data_administrasi_kepegawaian(): void
    {
        $adminKepegawaian = User::create([
            'name' => 'Admin Kepegawaian',
            'email' => 'adminpegawai@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'pegawai',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($adminKepegawaian);
        $this->withoutMiddleware();
        $response = $this->get('/pegawai/dashboard');
        $response->assertStatus(200);
    }
}

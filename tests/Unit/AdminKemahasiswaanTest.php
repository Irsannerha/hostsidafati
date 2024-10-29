<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminKemahasiswaanTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    /** @test */
    public function AdminKemahasiswaan_access_to_login_website(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function AdminKemahasiswaan_login_success(): void
    {
        $adminKemahasiswaan = User::create([
            'name' => 'Admin Kemahasiswaan',
            'email' => 'adminkemahasiswaan@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'kemahasiswaan',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'adminkemahasiswaan@harmonyfti',
            'password' => 'password',
        ]);

        $response->assertRedirect('/kemahasiswaan/dashboard');
        $this->assertAuthenticatedAs($adminKemahasiswaan);
    }

    /** @test */
    public function AdminKemahasiswaan_login_failed(): void
    {
        // Create a adminKemahasiswaan user
        User::create([
            'name' => 'Admin Kemahasiswaan',
            'email' => 'adminkemahasiswaan@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'kemahasiswaan',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'adminkemahasiswaan@harmonyfti',
            'password' => 'wrongpassword',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Email atau passwordnya salah nih, coba dicek lagi ya.');
    }

    /** @test */
    public function AdminKemahasiswaan_access_to_dashboard_utama(): void
    {
        $adminKemahasiswaan = User::create([
            'name' => 'Admin Kemahasiswaan',
            'email' => 'adminkemahasiswaan@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'kemahasiswaan',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($adminKemahasiswaan);
        $this->withoutMiddleware();
        $response = $this->get('/kemahasiswaan/dashboard');
        $response->assertStatus(200);
    }

    /** @test */
    public function AdminKemahasiswaan_mengakses_data_administrasi__kemahasiswaan(): void
    {
        $adminKemahasiswaan = User::create([
            'name' => 'Admin Kemahasiswaan',
            'email' => 'adminkemahasiswaan@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'kemahasiswaan',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($adminKemahasiswaan);
        $this->withoutMiddleware();
        $response = $this->get('/kemahasiswaan/dashboard');
        $response->assertStatus(200);
    }
}

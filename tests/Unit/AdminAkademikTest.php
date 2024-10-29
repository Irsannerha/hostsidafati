<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminAkademikTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    /** @test */
    public function AdminAkademik_access_to_login_website(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function AdminAkademik_login_success(): void
    {
        $adminAkademik = User::create([
            'name' => 'Admin Akademik',
            'email' => 'adminakademik@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'akademik',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'adminakademik@harmonyfti',
            'password' => 'password',
        ]);

        $response->assertRedirect('/akademik/dashboard');
        $this->assertAuthenticatedAs($adminAkademik);
    }

    /** @test */
    public function AdminAkademik_login_failed(): void
    {
        // Create a adminAkademik user
        User::create([
            'name' => 'Admin Akademik',
            'email' => 'adminakademik@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'akademik',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'adminakademik@harmonyfti',
            'password' => 'wrongpassword',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Email atau passwordnya salah nih, coba dicek lagi ya.');
    }

    /** @test */
    public function AdminAkademik_access_dashboard_utama(): void
    {
        $adminAkademik = User::create([
            'name' => 'Admin Akademik',
            'email' => 'adminakademik@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'akademik',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($adminAkademik);
        $this->withoutMiddleware();
        $response = $this->get('/akademik/dashboard');
        $response->assertStatus(200);
    }

    /** @test */
    public function AdminAkademik_mengakses_data_administrasi_akademik(): void
    {
        $adminAkademik = User::create([
            'name' => 'Admin Akademik',
            'email' => 'adminakademik@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'akademik',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($adminAkademik);
        $this->withoutMiddleware();
        $response = $this->get('/akademik/dashboard');
        $response->assertStatus(200);
    }
}

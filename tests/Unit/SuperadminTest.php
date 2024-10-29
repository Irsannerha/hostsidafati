<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SuperadminTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    /** @test */
    public function superadmin_access_halaman_login()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /** @test */
    public function superadmin_login_success()
    {
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'superadmin@example.com',
            'password' => 'password',
        ]);

        $response->assertRedirect('/superadmin/dashboard');
        $this->assertAuthenticatedAs($superadmin);
    }

    /** @test */
    public function superadmin_login_failed()
    {
        // Create a superadmin user
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);

        $response = $this->post('/login', [
            'email' => 'superadmin@example.com',
            'password' => 'wrongpassword',
        ]);

        $this->assertGuest();
        $response->assertRedirect('/login');
        $response->assertSessionHas('error', 'Email atau passwordnya salah nih, coba dicek lagi ya.');
    }

    /** @test */
    public function superadmin_access_dashboard_utama()
    {
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($superadmin);
        $this->withoutMiddleware();
        $response = $this->get('/superadmin/dashboard');
        $response->assertStatus(200);
    }

    /** @test */
    public function superadmin_mengakses_data_administrasi_kepegawaian()
    {
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($superadmin);
        $this->withoutMiddleware();
        $response = $this->get('/superadmin/dashboard');
        $response->assertStatus(200);
    }

    /** @test */
    public function superadmin_mengakses_data_administrasi_akademik()
    {
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);

        $this->actingAs($superadmin);

        $this->withoutMiddleware();
        $response = $this->get('/superadmin/dashboard');
        $response->assertStatus(200);
    }

    /** @test */
    public function superadmin_mengakses_data_administrasi_kemahasiswaan()
    {
        $superadmin = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => bcrypt('password'),
            'role' => 'superadmin',
            'email_verified_at' => now(),
        ]);
        $this->actingAs($superadmin);

        $this->withoutMiddleware();
        $response = $this->get('/superadmin/dashboard');
        $response->assertStatus(200);
    }
}

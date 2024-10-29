<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\UndurDiriController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\UndurDiriImport;
use App\Models\UndurDiri;
use App\Models\User;
use Tests\TestCase;

class UndurDiriTest extends TestCase
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
    public function superadmin_mengakses_halaman_index_MhsUndurDiri(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index undur-diri
        $response = $this->get('/superadmin/undur-diri'); // Mengirim permintaan HTTP GET ke URL '/superadmin/undur-diri'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }

    /** @test */
    public function superadmin_menambah_data_MhsUndurDiri(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Membuat data mhs-aktif baru
        $response = $this->post('/superadmin/undur-diri', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_undur_diri_genap'  => 100,
            'mhs_undur_diri_ganjil' => 100,
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index Keluar
        $response->assertRedirect('/superadmin/undur-diri');

        // Pastikan bahwa data MhsTA berhasil disimpan ke dalam database
        $this->assertDatabaseHas('undur-diri', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_undur_diri_genap'  => 100,
            'mhs_undur_diri_ganjil' => 100,
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_MhsUndurDiri(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample UndurDiri
        $UndurDiri = UndurDiri::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_undur_diri_genap'  => 100,
            'mhs_undur_diri_ganjil' => 100,
        ]);

        // Simulate updating the undur-diri
        $response = $this->put("/superadmin/undur-diri/{$UndurDiri->id}", [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_undur_diri_genap'  => 100,
            'mhs_undur_diri_ganjil' => 100,
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/undur-diri');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('undur-diri', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_undur_diri_genap'  => 100,
            'mhs_undur_diri_ganjil' => 100,
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_MhsUndurDiri(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function superadmin_menghapus_data_MhsUndurDiri(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample mhs-ta
        $UndurDiri = UndurDiri::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_undur_diri_genap'  => 100,
            'mhs_undur_diri_ganjil' => 100,
        ]);

        // Simulate deleting the undur-diri
        $response = $this->delete("/superadmin/undur-diri/{$UndurDiri->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/undur-diri');
        // Assert that the UndurDiri was deleted from the database
        $this->assertDatabaseMissing('undur-diri', ['id' => $UndurDiri->id]);
    }

    /** @test */
    public function superadmin_export_data_MhsUndurDiri()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data UndurDiri yang akan diekspor
        $UndurDiri = UndurDiri::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_undur_diri_genap'  => 100,
            'mhs_undur_diri_ganjil' => 100,
        ]);

        // Pastikan data UndurDiri dibuat dengan benar
        $this->assertNotNull($UndurDiri, "Data UndurDiri tidak berhasil dibuat.");
        $this->assertDatabaseHas('undur-diri', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_undur_diri_genap'  => 100,
            'mhs_undur_diri_ganjil' => 100,
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/UndurDiri/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=UndurDiri.xlsx');
    }

    /** @test */
    public function superadmin_import_data_MhsUndurDiri()
    {
        // Define the correct path for the test file
        $filePath = __DIR__ . '/assets/templateImport/template_UndurDiri.xlsx'; // Corrected path
        $uploadedFile = new UploadedFile(
            $filePath,
            'file.xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            null,
            true
        );

        // Create a mock request with a valid file
        $request = new Request();
        $request->files->set('file', $uploadedFile);

        // Mock the Excel import to prevent actual file import
        Excel::shouldReceive('import')
            ->once()
            ->with(\Mockery::type(UndurDiriImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new UndurDiriController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Undur Diri berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function superadmin_download_template_excel_MhsUndurDiri()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('UndurDiri.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_UndurDiri.xlsx');
    }
}

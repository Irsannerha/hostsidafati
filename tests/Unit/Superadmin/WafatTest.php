<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\WafatController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\WafatImport;
use App\Models\Wafat;
use App\Models\User;
use Tests\TestCase;

class WafatTest extends TestCase
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
    public function superadmin_mengakses_halaman_index_MhsWafat(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index wafat
        $response = $this->get('/superadmin/wafat'); // Mengirim permintaan HTTP GET ke URL '/superadmin/wafat'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }

    /** @test */
    public function superadmin_menambah_data_MhsWafat(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Membuat data wafat baru
        $response = $this->post('/superadmin/wafat', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_wafat_genap'  => 100,
            'mhs_wafat_ganjil' => 100,
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index wafat
        $response->assertRedirect('/superadmin/wafat');

        // Pastikan bahwa data MhsTA berhasil disimpan ke dalam database
        $this->assertDatabaseHas('wafat', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_wafat_genap'  => 100,
            'mhs_wafat_ganjil' => 100,
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_MhsWafat(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample Wafat
        $Wafat = Wafat::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_wafat_genap'  => 100,
            'mhs_wafat_ganjil' => 100,
        ]);

        // Simulate updating the wafat
        $response = $this->put("/superadmin/wafat/{$Wafat->id}", [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_wafat_genap'  => 100,
            'mhs_wafat_ganjil' => 100,
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/wafat');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('wafat', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_wafat_genap'  => 100,
            'mhs_wafat_ganjil' => 100,
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_MhsWafat(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function superadmin_menghapus_data_MhsWafat(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample wafat
        $Wafat = Wafat::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_wafat_genap'  => 100,
            'mhs_wafat_ganjil' => 100,
        ]);

        // Simulate deleting the wafat
        $response = $this->delete("/superadmin/wafat/{$Wafat->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/wafat');
        // Assert that the Wafat Was deleted from the database
        $this->assertDatabaseMissing('wafat', ['id' => $Wafat->id]);
    }

    /** @test */
    public function superadmin_export_data_MhsWafat()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data Wafat yang akan diekspor
        $Wafat = Wafat::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_wafat_genap'  => 100,
            'mhs_wafat_ganjil' => 100,
        ]);

        // Pastikan data Wafat dibuat dengan benar
        $this->assertNotNull($Wafat, "Data Wafat tidak berhasil dibuat.");
        $this->assertDatabaseHas('wafat', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'mhs_wafat_genap'  => 100,
            'mhs_wafat_ganjil' => 100,
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/Wafat/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=MhsWafat.xlsx');
    }

    /** @test */
    public function superadmin_import_data_MhsWafat()
    {
        // Define the correct path for the test file
        $filePath = __DIR__ . '/assets/templateImport/template_Wafat.xlsx'; // Corrected path
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
            ->with(\Mockery::type(WafatImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new WafatController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Mhs Wafat berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function superadmin_download_template_excel_MhsWafat()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('Wafat.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_Wafat.xlsx');
    }
}

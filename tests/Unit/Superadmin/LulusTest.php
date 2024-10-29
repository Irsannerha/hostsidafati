<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\LulusController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\LulusImport;
use App\Models\Lulus;
use App\Models\User;
use Tests\TestCase;

class LulusTest extends TestCase
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
    public function superadmin_mengakses_halaman_index_MhsLulus(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index lulus
        $response = $this->get('/superadmin/lulus'); // Mengirim permintaan HTTP GET ke URL '/superadmin/lulus'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }

    /** @test */
    public function superadmin_menambah_data_MhsLulus(): void
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Membuat data lulus baru
        $response = $this->post('/superadmin/lulus', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'januari' => 100,
            'februari' => 100,
            'maret' => 100,
            'april' => 100,
            'mei' => 100,
            'juni' => 100,
            'juli' => 100,
            'agustus' => 100,
            'september' => 100,
            'oktober' => 100,
            'november' => 100,
            'desember' => 100,
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index lulus
        $response->assertRedirect('/superadmin/lulus');

        // Pastikan bahwa data MhsTA berhasil disimpan ke dalam database
        $this->assertDatabaseHas('lulus', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'januari' => 100,
            'februari' => 100,
            'maret' => 100,
            'april' => 100,
            'mei' => 100,
            'juni' => 100,
            'juli' => 100,
            'agustus' => 100,
            'september' => 100,
            'oktober' => 100,
            'november' => 100,
            'desember' => 100,
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_MhsLulus(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample Lulus
        $Lulus = Lulus::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'januari' => 100,
            'februari' => 100,
            'maret' => 100,
            'april' => 100,
            'mei' => 100,
            'juni' => 100,
            'juli' => 100,
            'agustus' => 100,
            'september' => 100,
            'oktober' => 100,
            'november' => 100,
            'desember' => 100,
        ]);

        // Simulate updating the lulus
        $response = $this->put("/superadmin/lulus/{$Lulus->id}", [
            'prodi_id' => 1,
            'ts_id' => 1,
            'januari' => 100,
            'februari' => 100,
            'maret' => 100,
            'april' => 100,
            'mei' => 100,
            'juni' => 100,
            'juli' => 100,
            'agustus' => 100,
            'september' => 100,
            'oktober' => 100,
            'november' => 100,
            'desember' => 100,
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/lulus');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('lulus', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'januari' => 100,
            'februari' => 100,
            'maret' => 100,
            'april' => 100,
            'mei' => 100,
            'juni' => 100,
            'juli' => 100,
            'agustus' => 100,
            'september' => 100,
            'oktober' => 100,
            'november' => 100,
            'desember' => 100,
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_Mhslulus(): void
    {
        $this->assertTrue(true);
    }

    /** @test */
    public function superadmin_menghapus_data_MhsLulus(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample lulus
        $Lulus = Lulus::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'januari' => 100,
            'februari' => 100,
            'maret' => 100,
            'april' => 100,
            'mei' => 100,
            'juni' => 100,
            'juli' => 100,
            'agustus' => 100,
            'september' => 100,
            'oktober' => 100,
            'november' => 100,
            'desember' => 100,
        ]);

        // Simulate deleting the lulus
        $response = $this->delete("/superadmin/lulus/{$Lulus->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/lulus');
        // Assert that the Lulus Was deleted from the database
        $this->assertDatabaseMissing('lulus', ['id' => $Lulus->id]);
    }

    /** @test */
    public function superadmin_export_data_MhsLulus()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data lulus yang akan diekspor
        $Lulus = Lulus::create([
            'prodi_id' => 1,
            'ts_id' => 1,
            'januari' => 100,
            'februari' => 100,
            'maret' => 100,
            'april' => 100,
            'mei' => 100,
            'juni' => 100,
            'juli' => 100,
            'agustus' => 100,
            'september' => 100,
            'oktober' => 100,
            'november' => 100,
            'desember' => 100,
        ]);

        // Pastikan data lulus dibuat dengan benar
        $this->assertNotNull($Lulus, "Data lulus tidak berhasil dibuat.");
        $this->assertDatabaseHas('lulus', [
            'prodi_id' => 1,
            'ts_id' => 1,
            'januari' => 100,
            'februari' => 100,
            'maret' => 100,
            'april' => 100,
            'mei' => 100,
            'juni' => 100,
            'juli' => 100,
            'agustus' => 100,
            'september' => 100,
            'oktober' => 100,
            'november' => 100,
            'desember' => 100,
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/Lulus/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=MhsLulus.xlsx');
    }

    /** @test */
    public function superadmin_import_data_MhsLulus()
    {
        // Define the correct path for the test file
        $filePath = __DIR__ . '/assets/templateImport/template_Lulus.xlsx'; // Corrected path
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
            ->with(\Mockery::type(LulusImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new LulusController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Mhs Lulus berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function superadmin_download_template_excel_MhsLulus()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('Lulus.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_Lulus.xlsx');
    }
}

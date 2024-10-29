<?php

namespace Tests\Unit\Superadmin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\DoslubiController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\DoslubiImport;
use App\Models\Doslubi;
use App\Models\User;
use Tests\TestCase;

class DoslubiTest extends TestCase
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

    private function createSuperAdmin()
    {
        return User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@harmonyfti',
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
    public function superadmin_mengakses_halaman_index_doslubi()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index prodi
        $response = $this->get('/superadmin/prodi'); // Mengirim permintaan HTTP GET ke URL '/superadmin/prodi'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }


    /** @test */
    public function superadmin_menambah_data_doslubi()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'Superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Membuat data doslubi baru
        $response = $this->post('/superadmin/doslubi', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index doslubi
        $response->assertRedirect('/superadmin/doslubi');
        // Pastikan bahwa data doslubi berhasil disimpan ke dalam database
        $this->assertDatabaseHas('doslubi', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_doslubi()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample doslubi
        $doslubi = Doslubi::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);

        // Simulate updating the doslubi
        $response = $this->put("/superadmin/doslubi/{$doslubi->id}", [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/doslubi');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('doslubi', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_doslubi()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat sample doslubi
        $doslubi = Doslubi::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);

        // Akses halaman detail doslubi
        $response = $this->get("/superadmin/doslubi/{$doslubi->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.doslubi.show');

        // Cek apakah data doslubi disertakan dalam tampilan
        $response->assertViewHas('doslubi', $doslubi);
    }

    /** @test */
    public function superadmin_menghapus_data_doslubi()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample doslubi
        $doslubi = Doslubi::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kadoslubi',
        ]);

        // Simulate deleting the doslubi
        $response = $this->delete("/superadmin/doslubi/{$doslubi->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/doslubi');
        // Assert that the doslubi was deleted from the database
        $this->assertDatabaseMissing('doslubi', ['id' => $doslubi->id]);
    }

    /** @test */
    public function superadmin_mengexport_data_doslubi()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data Doslubi yang akan diekspor
        $doslubi = Doslubi::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);

        // Pastikan data Prodi dibuat dengan benar
        $this->assertNotNull($doslubi, "Data Prodi tidak berhasil dibuat.");
        $this->assertDatabaseHas('doslubi', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/doslubi/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=doslubi.xlsx');
    }

    /** @test */
    public function superadmin_mengimport_data_doslubi()
    {
        // Define the correct path for the test file
        $filePath = __DIR__ . '/../assets/templateImport/template_doslubi.xlsx'; // Corrected path
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
            ->with(\Mockery::type(DoslubiImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new DoslubiController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Doslubi berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function superadmin_mendownload_template_excel_doslubi()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('doslubi.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_doslubi.xlsx');
    }

}

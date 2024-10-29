<?php

namespace Tests\Unit\AdminKepegawaian;

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

class AdminDoslubiTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create a pegawai and Admin user for testing purposes.
     */
     protected function setUp(): void
    {
        parent::setUp();
        // Start the session for unit tests
        $this->startSession();
    }

    /** @test */
    private function createAdmin()
    {
        return user::create([
            'name' => 'Pegawai',
            'email' => 'adminpegawai@harmonyfti',
            'password' => bcrypt('password'),
            'role' => 'pegawai',
            'email_verified_at' => now(),
        ]);
    }

    
    /** @test */
    public function adminPegawai_mengakses_halaman_index_doslubi()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $pegawai = User::factory()->create([
            'role' => 'pegawai', // Set role pengguna sebagai 'pegawai'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna pegawai
        $this->actingAs($pegawai); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna pegawai

        // Coba untuk mengakses halaman index doslubi
        $response = $this->get('/pegawai/doslubi'); // Mengirim permintaan HTTP GET ke URL '/pegawai/doslubi'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }


    /** @test */
    public function adminPegawai_menambah_data_doslubi()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $pegawai = User::factory()->create([
            'role' => 'pegawai', // Set role pengguna sebagai 'Superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna pegawai
        $this->actingAs($pegawai); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna pegawai

        // Membuat data doslubi baru
        $response = $this->post('/pegawai/doslubi', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index doslubi
        $response->assertRedirect('/pegawai/doslubi');
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
    public function adminPegawai_mengedit_data_doslubi()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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
        $response = $this->put("/pegawai/doslubi/{$doslubi->id}", [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nup_nidk' => '1234567890',
            'jurusan' => 'Teknik Informatika',
            'status' => 'Aktif',
            'tgl_lahir' => '2000-01-01',
            'jabatan_terakhir' => 'Kaprodi',
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/pegawai/doslubi');
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
    public function adminPegawai_melihat_data_doslubi()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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
        $response = $this->get("/pegawai/doslubi/{$doslubi->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.doslubi.show');

        // Cek apakah data doslubi disertakan dalam tampilan
        $response->assertViewHas('doslubi', $doslubi);
    }

    /** @test */
    public function adminPegawai_menghapus_data_doslubi()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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
        $response = $this->delete("/pegawai/doslubi/{$doslubi->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/pegawai/doslubi');
        // Assert that the doslubi was deleted from the database
        $this->assertDatabaseMissing('doslubi', ['id' => $doslubi->id]);
    }

    /** @test */
    public function adminPegawai_mengexport_data_doslubi()
    {
        // Buat user pegawai dan pastikan pengguna dibuat
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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
    public function adminPegawai_mengimport_data_doslubi()
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
    public function adminPegawai_mendownload_template_excel_doslubi()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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

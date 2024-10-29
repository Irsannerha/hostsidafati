<?php

namespace Tests\Unit\Superadmin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\ResignController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\ResignImport;
use App\Models\Resign;
use App\Models\User;
use Tests\TestCase;

class ResignTest extends TestCase
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
     public function superadmin_mengakses_halaman_index_dosen_resign()
     {
         // Buat pengguna dengan peran (role) dan status yang diperlukan
         $superadmin = User::factory()->create([
             'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
             'status' => 'aktif',     // Pastikan status aktif
         ]);
 
         // Melakukan autentikasi sebagai pengguna superadmin
         $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin
 
         // Coba untuk mengakses halaman index dosen resign
         $response = $this->get('/superadmin/resign'); // Mengirim permintaan HTTP GET ke URL '/superadmin/resign'
 
         // Pastikan bahwa status responsnya adalah 200 (OK)
         $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
     }

    /** @test */
    public function superadmin_menambah_data_dosen_resign()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Membuat data resign baru
        $response = $this->post('/superadmin/resign', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nrk' => '1234567890',
            'nidn' => '1234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tmt_masuk' => '2010-01-01',
            'tmt_keluar' => '2020-01-01',
            'alasan' => 'Pindah',
            'surat_keterangan' => 'Ada',
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index dosen
        $response->assertRedirect('/superadmin/resign');

        // Pastikan bahwa data dosen resign berhasil disimpan ke dalam database
        $this->assertDatabaseHas('resign', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nrk' => '1234567890',
            'nidn' => '1234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tmt_masuk' => '2010-01-01',
            'tmt_keluar' => '2020-01-01',
            'alasan' => 'Pindah',
            'surat_keterangan' => 'Ada',
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_dosen_resign()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample dosen resign
        $resign = Resign::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nrk' => '1234567890',
            'nidn' => '1234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tmt_masuk' => '2010-01-01',
            'tmt_keluar' => '2020-01-01',
            'alasan' => 'Pindah',
            'surat_keterangan' => 'Ada',
        ]);

        // Simulate updating the dosen resign
        $response = $this->put("/superadmin/resign/{$resign->id}", [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nrk' => '1234567890',
            'nidn' => '1234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tmt_masuk' => '2010-01-01',
            'tmt_keluar' => '2020-01-01',
            'alasan' => 'Pindah',
            'surat_keterangan' => 'Ada',
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/resign');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('resign', [
                'prodi_id' => 1,
                'nama' => 'Khyze',
                'nrk' => '1234567890',
                'nidn' => '1234567890',
                'jenis_kelamin' => 'Laki-laki',
                'tmt_masuk' => '2010-01-01',
                'tmt_keluar' => '2020-01-01',
                'alasan' => 'Pindah',
                'surat_keterangan' => 'Ada',
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_dosen_resign()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
        'role' => 'superadmin',
        'status' => 'aktif', // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat sample data dosen resign
        $resign = Resign::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nrk' => '1234567890',
            'nidn' => '1234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tmt_masuk' => '2010-01-01',
            'tmt_keluar' => '2020-01-01',
            'alasan' => 'Pindah',
            'surat_keterangan' => 'Ada',
        ]);

        // Akses halaman detail dosen resign
        $response = $this->get("/superadmin/resign/{$resign->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.resign.show');

        // Cek apakah data dosen disertakan dalam tampilan
        $response->assertViewHas('resign', $resign);
    }

    /** @test */
    public function superadmin_menghapus_data_dosen_resign()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample dosen resign
        $resign = Resign::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nrk' => '1234567890',
            'nidn' => '1234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tmt_masuk' => '2010-01-01',
            'tmt_keluar' => '2020-01-01',
            'alasan' => 'Pindah',
            'surat_keterangan' => 'Ada',
        ]);

        // Simulate deleting the dosen resign
        $response = $this->delete("/superadmin/resign/{$resign->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/resign');
        // Assert that the resign was deleted from the database
        $this->assertDatabaseMissing('resign', ['id' => $resign->id]);
    }

    /** @test */
    public function superadmin_mengexport_data_dosen_resign()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data Dosen yang akan diekspor
        $resign= Resign::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nrk' => '1234567890',
            'nidn' => '1234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tmt_masuk' => '2010-01-01',
            'tmt_keluar' => '2020-01-01',
            'alasan' => 'Pindah',
            'surat_keterangan' => 'Ada',
        ]);

        // Pastikan data Dosen dibuat dengan benar
        $this->assertNotNull($resign, "Data Dosen Resign tidak berhasil dibuat.");
        $this->assertDatabaseHas('resign', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nrk' => '1234567890',
            'nidn' => '1234567890',
            'jenis_kelamin' => 'Laki-laki',
            'tmt_masuk' => '2010-01-01',
            'tmt_keluar' => '2020-01-01',
            'alasan' => 'Pindah',
            'surat_keterangan' => 'Ada',
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/resign/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=resign.xlsx');
    }

    /** @test */
    public function superadmin_mengimport_data_dosen_resign()
    {
        // Define the correct path for the test filee
        $filePath = __DIR__ . '/../assets/templateImport/template_resign.xlsx'; // Corrected path
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
            ->with(\Mockery::type(ResignImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new ResignController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Resign berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function superadmin_mendownload_template_excel_dosen_resign()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('resign.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_resign.xlsx');
    }
}

<?php

namespace Tests\Unit\AdminKepegawaian;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\ResignController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\ResignImport;
use App\Models\Resign;
use App\Models\User;
use Tests\TestCase;

class AdminResignTest extends TestCase
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
    public function adminPegawai_mengakses_halaman_index_dosen_resign()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $pegawai = User::factory()->create([
            'role' => 'pegawai', // Set role pengguna sebagai 'pegawai'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna pegawai
        $this->actingAs($pegawai); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna pegawai

        // Coba untuk mengakses halaman index dosen resign
        $response = $this->get('/pegawai/resign'); // Mengirim permintaan HTTP GET ke URL '/pegawai/resign'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }

    /** @test */
    public function adminPegawai_menambah_data_dosen_resign()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna pegawai
        $this->actingAs($pegawai);

        // Membuat data resign baru
        $response = $this->post('/pegawai/resign', [
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
        $response->assertRedirect('/pegawai/resign');

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
    public function adminPegawai_mengedit_data_dosen_resign()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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
        $response = $this->put("/pegawai/resign/{$resign->id}", [
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
        $response->assertRedirect('/pegawai/resign');
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
    public function adminPegawai_melihat_data_dosen_resign()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif', // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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
        $response = $this->get("/pegawai/resign/{$resign->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.resign.show');

        // Cek apakah data dosen disertakan dalam tampilan
        $response->assertViewHas('resign', $resign);
    }

    /** @test */
    public function adminPegawai_menghapus_data_dosen_resign()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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
        $response = $this->delete("/pegawai/resign/{$resign->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/pegawai/resign');
        // Assert that the resign was deleted from the database
        $this->assertDatabaseMissing('resign', ['id' => $resign->id]);
    }

    /** @test */
    public function adminPegawai_mengexport_data_dosen_resign()
    {
        // Buat user pegawai dan pastikan pengguna dibuat
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Buat data Dosen yang akan diekspor
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
    public function adminPegawai_mengimport_data_dosen_resign()
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
    public function adminPegawai_mendownload_template_excel_dosen_resign()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

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

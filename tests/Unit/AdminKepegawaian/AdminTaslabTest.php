<?php

namespace Tests\Unit\AdminKepegawaian;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\TaslabController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\TaslabImport;
use App\Models\Taslab;
use App\Models\User;
use Tests\TestCase;

class AdminTaslabTest extends TestCase
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
     public function adminPegawai_mengakses_halaman_index_taslab()
     {
         // Buat pengguna dengan peran (role) dan status yang diperlukan
         $pegawai = User::factory()->create([
             'role' => 'pegawai', // Set role pengguna sebagai 'pegawai'
             'status' => 'aktif',     // Pastikan status aktif
         ]);
 
         // Melakukan autentikasi sebagai pengguna pegawai
         $this->actingAs($pegawai); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna pegawai
 
         // Coba untuk mengakses halaman index taslab
         $response = $this->get('/pegawai/taslab'); // Mengirim permintaan HTTP GET ke URL '/pegawai/taslab'
 
         // Pastikan bahwa status responsnya adalah 200 (OK)
         $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
     }

    /** @test */
    public function adminPegawai_menambah_data_taslab()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna pegawai
        $this->actingAs($pegawai);

        // Membuat data taslab baru
        $response = $this->post('/pegawai/taslab', [
            'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index taslab
        $response->assertRedirect('/pegawai/taslab');

        // Pastikan bahwa data taslab berhasil disimpan ke dalam database
        $this->assertDatabaseHas('taslab', [
            'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);
    }

    /** @test */
    public function adminPegawai_mengedit_data_taslab()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Create a sample taslab
        $taslab = Taslab::create([
           'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);

        // Simulate updating the taslab
        $response = $this->put("/pegawai/taslab/{$taslab->id}", [
            'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/pegawai/taslab');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('taslab', [
            'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);
    }

    /** @test */
    public function adminPegawai_melihat_data_taslab()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
        'role' => 'pegawai',
        'status' => 'aktif', // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Buat sample prodi
        $taslab = Taslab::create([
            'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);

        // Akses halaman detail taslab
        $response = $this->get("/pegawai/taslab/{$taslab->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.taslab.show');

        // Cek apakah data taslab disertakan dalam tampilan
        $response->assertViewHas('taslab', $taslab);
    }

    /** @test */
    public function adminPegawai_menghapus_data_taslab()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Create a sample taslab
        $taslab = Taslab::create([
            'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);

        // Simulate deleting the taslab
        $response = $this->delete("/pegawai/taslab/{$taslab->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/pegawai/taslab');
        // Assert that the taslab was deleted from the database
        $this->assertDatabaseMissing('taslab', ['id' => $taslab->id]);
    }

    /** @test */
    public function adminPegawai_mengexport_data_taslab()
    {
        // Buat user pegawai dan pastikan pengguna dibuat
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Buat data Taslab yang akan diekspor
        $taslab = Taslab::create([
            'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);

        // Pastikan data Taslab dibuat dengan benar
        $this->assertNotNull($taslab, "Data Taslab tidak berhasil dibuat.");
        $this->assertDatabaseHas('taslab', [
            'nama' => 'Khyze',
            'unit_kerja' => 'FTI',
            'pendidikan' => 'S2',
            'tmt' => '2020-01-01',
            'status_pegawai' => 'PNS',
            'jabatan' => 'Lektor',
            'bagian_tugas' => 'Taslab',
            'nitk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'no_hp' => '081234567890',
            'email' => 'taslab@harmonyfti',
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/taslab/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=taslab.xlsx');
    }

    /** @test */
    public function adminPegawai_mengimport_data_taslab()
    {
        // Define the correct path for the test file
        $filePath = __DIR__ . '/../assets/templateImport/template_taslab.xlsx'; // Corrected path
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
            ->with(\Mockery::type(TaslabImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new TaslabController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Taslab berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function adminPegawai_mendownload_template_excel_taslab()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('taslab.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_taslab.xlsx');
    }
}

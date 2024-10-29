<?php

namespace Tests\Unit\Superadmin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\TaslabController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\TaslabImport;
use App\Models\Taslab;
use App\Models\User;
use Tests\TestCase;

class TaslabTest extends TestCase
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
     public function superadmin_mengakses_halaman_index_taslab()
     {
         // Buat pengguna dengan peran (role) dan status yang diperlukan
         $superadmin = User::factory()->create([
             'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
             'status' => 'aktif',     // Pastikan status aktif
         ]);
 
         // Melakukan autentikasi sebagai pengguna superadmin
         $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin
 
         // Coba untuk mengakses halaman index taslab
         $response = $this->get('/superadmin/taslab'); // Mengirim permintaan HTTP GET ke URL '/superadmin/taslab'
 
         // Pastikan bahwa status responsnya adalah 200 (OK)
         $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
     }

    /** @test */
    public function superadmin_menambah_data_taslab()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Membuat data taslab baru
        $response = $this->post('/superadmin/taslab', [
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
        $response->assertRedirect('/superadmin/taslab');

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
    public function superadmin_mengedit_data_taslab()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

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
        $response = $this->put("/superadmin/taslab/{$taslab->id}", [
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
        $response->assertRedirect('/superadmin/taslab');
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
    public function superadmin_melihat_data_taslab()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
        'role' => 'superadmin',
        'status' => 'aktif', // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

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
        $response = $this->get("/superadmin/taslab/{$taslab->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.taslab.show');

        // Cek apakah data taslab disertakan dalam tampilan
        $response->assertViewHas('taslab', $taslab);
    }

    /** @test */
    public function superadmin_menghapus_data_taslab()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

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
        $response = $this->delete("/superadmin/taslab/{$taslab->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/taslab');
        // Assert that the taslab was deleted from the database
        $this->assertDatabaseMissing('taslab', ['id' => $taslab->id]);
    }

    /** @test */
    public function superadmin_mengexport_data_taslab()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

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
    public function superadmin_mengimport_data_taslab()
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
    public function superadmin_mendownload_template_excel_taslab()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

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

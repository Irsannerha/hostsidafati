<?php

namespace Tests\Unit\Superadmin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\ProdiController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\ProdiImport;
use App\Models\Prodi;
use App\Models\User;
use Tests\TestCase;

class ProdiTest extends TestCase
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
    public function superadmin_mengakses_halaman_index_prodi()
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
    public function superadmin_menambah_data_prodi()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'Superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Membuat data prodi baru
        $response = $this->post('/superadmin/prodi', [
            'prodi' => 'Teknik Informatika',
            'email' => 'informatika@itera.ac.id',
            'kapro' => 'Khyze',
            'fakultas' => 'FTI',
            'akreditasi' => 'A',
            'prodik' => '12345',
            'jumlah_mahasiswa' => 120,
            'tgl_pendirian' => '2020-01-01',
            'deskripsi' => 'Deskripsi prodi Teknik Informatika',
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index prodi
        $response->assertRedirect('/superadmin/prodi');
        // Pastikan bahwa data prodi berhasil disimpan ke dalam database
        $this->assertDatabaseHas('prodi', [
            'prodi' => 'Teknik Informatika',
            'kapro' => 'Khyze',
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_prodi()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample prodi
        $prodi = Prodi::create([
            'prodi' => 'Teknik Mesin',
            'email' => 'mesin@example.com',
            'kapro' => 'Jane Doe',
            'fakultas' => 'Teknik',
            'akreditasi' => 'B',
            'prodik' => '54321',
            'jumlah_mahasiswa' => 90,
            'tgl_pendirian' => '2015-06-15',
            'deskripsi' => 'Deskripsi prodi Teknik Mesin',
            'foto' => null,
            'sk_prodi' => null,
        ]);

        // Simulate updating the prodi
        $response = $this->put("/superadmin/prodi/{$prodi->id}", [
            'prodi' => 'Teknik Mesin',
            'email' => 'updated@example.com',
            'kapro' => 'Jane Smith',
            'fakultas' => 'Teknik',
            'akreditasi' => 'A',
            'prodik' => '54321',
            'jumlah_mahasiswa' => 100,
            'tgl_pendirian' => '2015-06-15',
            'deskripsi' => 'Updated description of Teknik Mesin',
            'foto' => UploadedFile::fake()->image('foto.jpg'), // Gunakan file gambar fake
            // Mengirim file sk_prodi yang valid
            'sk_prodi' => UploadedFile::fake()->create('22-10-2024_SK_PRODI_Teknik_Mesin.pdf', 100, 'application/pdf'), // Buat file PDF fake
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/prodi');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('prodi', [
            'id' => $prodi->id,
            'email' => 'updated@example.com',
            'kapro' => 'Jane Smith',
            'jumlah_mahasiswa' => 100,
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_prodi()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat sample prodi
        $prodi = Prodi::create([
            'prodi' => 'Teknik Mesin',
            'email' => 'mesin@example.com',
            'kapro' => 'Jane Doe',
            'fakultas' => 'Teknik',
            'akreditasi' => 'B',
            'prodik' => '54321',
            'jumlah_mahasiswa' => 90,
            'tgl_pendirian' => '2015-06-15',
            'deskripsi' => 'Deskripsi prodi Teknik Mesin',
            'foto' => null, // Jika diperlukan
            'sk_prodi' => null, // Jika diperlukan
        ]);

        // Akses halaman detail prodi
        $response = $this->get("/superadmin/prodi/{$prodi->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.prodi.show');

        // Cek apakah data prodi disertakan dalam tampilan
        $response->assertViewHas('prodi', $prodi);
    }

    /** @test */
    public function superadmin_menghapus_data_prodi()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample prodi
        $prodi = Prodi::create([
            'prodi' => 'Teknik Elektro',
            'email' => 'elektro@example.com',
            'kapro' => 'John Smith',
            'fakultas' => 'Teknik',
            'akreditasi' => 'A',
            'prodik' => '67890',
            'jumlah_mahasiswa' => 80,
            'tgl_pendirian' => '2017-03-21',
            'deskripsi' => 'Deskripsi prodi Teknik Elektro',
        ]);

        // Simulate deleting the prodi
        $response = $this->delete("/superadmin/prodi/{$prodi->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/prodi');
        // Assert that the prodi was deleted from the database
        $this->assertDatabaseMissing('prodi', ['id' => $prodi->id]);
    }

    /** @test */
    public function superadmin_mengexport_data_prodi()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data Prodi yang akan diekspor
        $prodi = Prodi::create([
            'prodi' => 'Teknik Mesin',
            'email' => 'mesin@example.com',
            'kapro' => 'Jane Doe',
            'fakultas' => 'Teknik',
            'akreditasi' => 'B',
            'prodik' => '54321',
            'jumlah_mahasiswa' => 90,
            'tgl_pendirian' => '2015-06-15',
            'deskripsi' => 'Deskripsi prodi Teknik Mesin',
        ]);

        // Pastikan data Prodi dibuat dengan benar
        $this->assertNotNull($prodi, "Data Prodi tidak berhasil dibuat.");
        $this->assertDatabaseHas('prodi', [
            'prodi' => 'Teknik Mesin'
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/prodi/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=prodi.xlsx');
    }

     /** @test */
    public function superadmin_mengimport_data_prodi()
    {
        // Define the correct path for the test file
        $filePath = __DIR__ . '/../assets/templateImport/template_prodi.xlsx'; // Corrected path
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
            ->with(\Mockery::type(ProdiImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new ProdiController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Prodi berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function superadmin_mendownload_template_excel_prodi()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('prodi.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_prodi.xlsx');
    }

}

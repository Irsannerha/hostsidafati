<?php

namespace Tests\Unit\AdminKepegawaian;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\DosbelController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\DosbelImport;
use App\Models\Dosbel;
use App\Models\User;
use Tests\TestCase;

class AdminDosbelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Membuat pengguna pegawai dan Admin untuk keperluan pengujian.
     */
    protected function setUp(): void
    {
        parent::setUp();
        // Memulai sesi untuk pengujian unit
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
    public function adminPegawai_mengakses_halaman_index_dosbel()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $pegawai = User::factory()->create([
            'role' => 'pegawai', // Set role pengguna sebagai 'pegawai'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna pegawai
        $this->actingAs($pegawai); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna pegawai

        // Coba untuk mengakses halaman index dosbel
        $response = $this->get('/pegawai/dosbel'); // Mengirim permintaan HTTP GET ke URL '/pegawai/dosbel'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil di
    }

    /** @test */
    public function adminPegawai_menambah_data_dosbel()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $pegawai = User::factory()->create([
            'role' => 'pegawai', // Set role pengguna sebagai 'Superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna pegawai
        $this->actingAs($pegawai); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna pegawai

        // Membuat data dosbel
        $response = $this->post('/pegawai/dosbel', [
            'prodi_id' => '1',
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'status' => 'aktif',
            'tempat_studi' => 'Institut Teknologi Sumatera',
            'jenis_beasiswa' => 'Beasiswa Penuh',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '1234567890',
            'perpanjangan_tubel' => '1',
            'mulai_perpanjangan' => '2022-01-01',
            'selesai_perpanjangan' => '2022-12-31',
            'keterangan' => 'Tidak ada',
        ]);

        // Pastikan bahwa data dosbel berhasil dibuat
        $response->assertStatus(302); // Memastikan bahwa data dosbel berhasil dibuat dengan status respons 302 (redirect)
        // Pastikan bahwa data dosbel berhasil disimpan ke dalam database
        $this->assertDatabaseHas('dosbel', [
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'status' => 'aktif',
            'tempat_studi' => 'Institut Teknologi Sumatera',
            'jenis_beasiswa' => 'Beasiswa Penuh',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '1234567890',
            'perpanjangan_tubel' => '1',
            'mulai_perpanjangan' => '2022-01-01',
            'selesai_perpanjangan' => '2022-12-31',
            'keterangan' => 'Tidak ada',
        ]);
    }

    /** @test */
    public function adminPegawai_mengedit_data_dosbel()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $pegawai = User::factory()->create([
            'role' => 'pegawai', // Set role pengguna sebagai 'Superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna pegawai
        $this->actingAs($pegawai); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna pegawai

        // Membuat data dosbel
        $dosbel = Dosbel::create([
            'prodi_id' => '1',
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'status' => 'aktif',
            'tempat_studi' => 'Institut Teknologi Sumatera',
            'jenis_beasiswa' => 'Beasiswa Penuh',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '1234567890',
            'perpanjangan_tubel' => '1',
            'mulai_perpanjangan' => '2022-01-01',
            'selesai_perpanjangan' => '2022-12-31',
            'keterangan' => 'Tidak ada',
        ]);

        // Mengirim permintaan HTTP POST ke URL '/pegawai/dosbel/$dosbel->id' untuk mengedit data dosbel
        $response = $this->put("/pegawai/dosbel/$dosbel->id", [
            'prodi_id' => '1',
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'status' => 'aktif',
            'tempat_studi' => 'Institut Teknologi Sumatera',
            'jenis_beasiswa' => 'Beasiswa Penuh',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '1234567890',
            'perpanjangan_tubel' => '1',
            'mulai_perpanjangan' => '2022-01-01',
            'selesai_perpanjangan' => '2022-12-31',
            'keterangan' => 'Tidak ada',
        ]);

        // Pastikan bahwa data dosbel berhasil diubah
        $response->assertRedirect('/pegawai/dosbel'); // Memastikan bahwa data dosbel berhasil diubah dengan status respons 302 (redirect)
        // Pastikan bahwa data dosbel berhasil diubah di dalam database
        $this->assertDatabaseHas('dosbel', [
            'prodi_id' => '1',
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'status' => 'aktif',
            'tempat_studi' => 'Institut Teknologi Sumatera',
            'jenis_beasiswa' => 'Beasiswa Penuh',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '1234567890',
            'perpanjangan_tubel' => '1',
            'mulai_perpanjangan' => '2022-01-01',
            'selesai_perpanjangan' => '2022-12-31',
            'keterangan' => 'Tidak ada',
        ]);
    
    }

    /** @test */
    public function adminPegawai_melihat_data_dosbel()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Buat sample dosbel
        $dosbel = Dosbel::create([
            'prodi_id' => '1',
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'status' => 'aktif',
            'tempat_studi' => 'Institut Teknologi Sumatera',
            'jenis_beasiswa' => 'Beasiswa Penuh',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '1234567890',
            'perpanjangan_tubel' => '1',
            'mulai_perpanjangan' => '2022-01-01',
            'selesai_perpanjangan' => '2022-12-31',
            'keterangan' => 'Tidak ada',
        ]);

        // Akses halaman detail dosbel
        $response = $this->get("/pegawai/dosbel/{$dosbel->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.dosbel.show');

        // Cek apakah data prodi disertakan dalam tampilan
        $response->assertViewHas('dosbel', $dosbel);
    }

    /** @test */
    public function adminPegawai_menghapus_data_dosbel()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Create a sample dosbel
        $dosbel = Dosbel::create([
            'prodi_id' => '1',
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'status' => 'aktif',
            'tempat_studi' => 'Institut Teknologi Sumatera',
            'jenis_beasiswa' => 'Beasiswa Penuh',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '1234567890',
            'perpanjangan_tubel' => '1',
            'mulai_perpanjangan' => '2022-01-01',
            'selesai_perpanjangan' => '2022-12-31',
            'keterangan' => 'Tidak ada',
        ]);

        // Simulate deleting the dosbel
        $response = $this->delete("/pegawai/dosbel/{$dosbel->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/pegawai/dosbel');
        // Assert that the dosbel was deleted from the database
        $this->assertDatabaseMissing('dosbel', ['id' => $dosbel->id]);
    }

    /** @test */
    public function adminPegawai_mengexport_data_dosbel()
    {
        // Buat user pegawai dan pastikan pengguna dibuat
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Buat data Dosbel yang akan diekspor
        $dosbel = Dosbel::create([
            'prodi_id' => '1',
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'status' => 'aktif',
            'tempat_studi' => 'Institut Teknologi Sumatera',
            'jenis_beasiswa' => 'Beasiswa Penuh',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '1234567890',
            'perpanjangan_tubel' => '1',
            'mulai_perpanjangan' => '2022-01-01',
            'selesai_perpanjangan' => '2022-12-31',
            'keterangan' => 'Tidak ada',
        ]);

        // Pastikan data Dosbel dibuat dengan benar
        $this->assertNotNull($dosbel, "Data Dosbel tidak berhasil dibuat.");
        $this->assertDatabaseHas('dosbel', [
            'nama' => 'Khyze',
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/dosbel/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=dosbel.xlsx');
    }

    /** @test */
    public function adminPegawai_mengimport_data_dosbel()
    {
        // Define the correct path for the test file
        $filePath = __DIR__ . '/../assets/templateImport/template_dosbel.xlsx'; // Corrected path
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
            ->with(\Mockery::type(DosbelImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new DosbelController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Dosbel berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function adminPegawai_mendownload_template_excel_dosbel()
    {
        // Buat user pegawai
        $pegawai = User::factory()->create([
            'role' => 'pegawai',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user pegawai sebagai pengguna yang sedang login
        $this->actingAs($pegawai);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('dosbel.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_dosbel.xlsx');
    }

}

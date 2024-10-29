<?php

namespace Tests\Unit\Superadmin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\PejabatController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\PejabatImport;
use App\Models\Pejabat;
use App\Models\User;
use Tests\TestCase;

class PejabatTest extends TestCase
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

    public function createSuperAdmin()
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
    public function superadmin_mengakses_halaman_index_pejabat()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index pejabat
        $response = $this->get('/superadmin/pejabat'); // Mengirim permintaan HTTP GET ke URL '/superadmin/pejabat'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil di
    }

    /** @test */
    public function superadmin_menambah_data_pejabat()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'Superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Membuat data pejabat
        $response = $this->post('/superadmin/pejabat', [
            'nama' => 'Khyze',
            'nip' => '1234567890',
            'jabatan' => 'Dekan',
            'pangkat_golongan' => 'IV/a',
        ]);

        // Pastikan bahwa data pejabat berhasil dibuat
        $response->assertStatus(302); // Memastikan bahwa data pejabat berhasil dibuat dengan status respons 302 (redirect)
        // Pastikan bahwa data pejabat berhasil disimpan ke dalam database
        $this->assertDatabaseHas('pejabat', [
            'nama' => 'Khyze',
            'nip' => '1234567890',
            'jabatan' => 'Dekan',
            'pangkat_golongan' => 'IV/a',
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_pejabat()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'Superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Membuat data pejabat
        $pejabat = Pejabat::create([
            'nama' => 'Khyze',
            'nip' => '1234567890',
            'jabatan' => 'Dekan',
            'pangkat_golongan' => 'IV/a',
        ]);

        // Mengirim permintaan HTTP POST ke URL '/superadmin/pejabat/$pejabat->id' untuk mengedit data pejabat
        $response = $this->put("/superadmin/pejabat/$pejabat->id", [
            'nama' => 'Khyze',
            'nip' => '1234567890',
            'jabatan' => 'Dekan',
            'pangkat_golongan' => 'IV/b',
        ]);

        // Pastikan bahwa data pejabat berhasil diubah

        $response->assertRedirect('/superadmin/pejabat'); // Memastikan bahwa data pejabat berhasil diubah dengan status respons 302 (redirect)
        // Pastikan bahwa data pejabat berhasil diubah di dalam database
        $this->assertDatabaseHas('pejabat', [
            'nama' => 'Khyze',
            'nip' => '1234567890',
            'jabatan' => 'Dekan',
            'pangkat_golongan' => 'IV/b',
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_pejabat()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat sample pejabat

        $pejabat = Pejabat::create([
            'nama' => 'Khyze',
            'nip' => '1234567890',
            'jabatan' => 'Dekan',
            'pangkat_golongan' => 'IV/a',
        ]);

        // Akses halaman detail pejabat
        $response = $this->get("/superadmin/pejabat/{$pejabat->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.pejabat.show');

        // Cek apakah data pejabat disertakan dalam tampilan
        $response->assertViewHas('pejabat', $pejabat);
    }

    /** @test */
    public function superadmin_menghapus_data_pejabat()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat sample pejabat

        $pejabat = Pejabat::create([
            'nama' => 'Khyze',
            'nip' => '1234567890',
            'jabatan' => 'Dekan',
            'pangkat_golongan' => 'IV/a',
        ]);

        // Menghapus data pejabat
        $response = $this->delete("/superadmin/pejabat/{$pejabat->id}");

        // Memastikan bahwa penghapusan mengarahkan kembali ke halaman indeks
        $response->assertRedirect('/superadmin/pejabat');
        // Memastikan bahwa data pejabat telah dihapus dari database
        $this->assertDatabaseMissing('pejabat', ['id' => $pejabat->id]);
    }

    /** @test */
    public function superadmin_mengexport_data_pejabat()
    {
         // Buat user superadmin dan pastikan pengguna dibuat
         $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        $pejabat = Pejabat::create([
            'nama' => 'Khyze',
            'nip' => '1234567890',
            'jabatan' => 'Dekan',
            'pangkat_golongan' => 'IV/a',
        ]);

         // Pastikan data pejabat dibuat dengan benar
         $this->assertNotNull($pejabat, "Data pejabat tidak berhasil dibuat.");
         $this->assertDatabaseHas('pejabat', [
             'jabatan' => 'Dekan'
         ]);
 
         // Simulasikan permintaan export
         $response = $this->get('/pejabat/export');
 
         // Tambahkan debug untuk memastikan respons
         $response->dump();
 
         // Pastikan respons adalah unduhan file
         $response->assertStatus(200);
 
         // Perbaiki format header untuk 'Content-Disposition'
         $response->assertHeader('Content-Disposition', 'attachment; filename=pejabat.xlsx');

    }

    /** @test */
    public function superadmin_mengimport_data_pejabat()
    {
        // Tentukan jalur yang benar untuk file uji
        $filePath = __DIR__ . '/../assets/templateImport/template_pejabat.xlsx'; // Jalur yang sudah diperbaiki
        $uploadedFile = new UploadedFile(
            $filePath,
            'file.xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            null,
            true
        );

        // Buat permintaan tiruan dengan file yang valid
        $request = new Request();
        $request->files->set('file', $uploadedFile);

        // Buat tiruan proses impor Excel untuk mencegah impor file yang sebenarnya
        Excel::shouldReceive('import')
            ->once()
            ->with(\Mockery::type(PejabatImport::class), $request->file('file'));

        // Panggil metode impor secara langsung
        $controller = new PejabatController(); // Pastikan controller yang benar digunakan
        $response = $controller->import($request);

        // Pastikan respon adalah redirect dan berhasil
        $this->assertEquals(302, $response->getStatusCode()); // Status redirect
        $this->assertEquals('Data Pejabat berhasil diimport.', session('success_import_data')); // Pesan berhasil
    }

    /** @test */
    public function superadmin_mendownload_template_excel_pejabat()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('pejabat.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_pejabat.xlsx');
        
    }


}

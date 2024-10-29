<?php

namespace Tests\Unit\Superadmin;

use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\AsmikbelController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\AsmikbelImport;
use App\Models\Asmikbel;
use App\Models\User;
use Tests\TestCase;

class AsmikbelTest extends TestCase
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
    public function superadmin_mengakses_halaman_index_asmikbel()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Coba untuk mengakses halaman index asmikbel
        $response = $this->get('/superadmin/asmikbel'); // Mengirim permintaan HTTP GET ke URL '/superadmin/asmikbel'

        // Pastikan bahwa status responsnya adalah 200 (OK)
        $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
    }

    /** @test */
    public function superadmin_menambah_data_asmikbel()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin', // Set role pengguna sebagai 'Superadmin'
            'status' => 'aktif',     // Pastikan status aktif
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin

        // Membuat data asmikbel baru
        $response = $this->post('/superadmin/asmikbel', [
            'prodi_id' => '1',
            'nama'   => 'Khyze',
            'nip_nrk' => '123456789',
            'status' => 'aktif',
            'studi_lanjut' => 'S2',
            'beasiswa' => 'LPDP',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '123',
            'status_asmik' => 'aktif',
            'keterangan' => 'Ini fake Keterangan',
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index asmikbel
        $response->assertRedirect('/superadmin/asmikbel');
        // Pastikan bahwa data asmikbel berhasil disimpan ke dalam database
        $this->assertDatabaseHas('asmikbel', [
            'prodi_id' => '1',
            'nama'   => 'Khyze',
            'nip_nrk' => '123456789',
            'status' => 'aktif',
            'studi_lanjut' => 'S2',
            'beasiswa' => 'LPDP',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '123',
            'status_asmik' => 'aktif',
            'keterangan' => 'ini fake Keterangan',
        ]);
    }

     /** @test */
     public function superadmin_mengedit_data_asmikbel()
     {
         // Buat user superadmin
         $superadmin = User::factory()->create([
             'role' => 'superadmin',
             'status' => 'aktif',  // Pastikan status aktif
         ]);
 
         // Set user superadmin sebagai pengguna yang sedang login
         $this->actingAs($superadmin);
 
         // Create a sample asmikbel
         $asmikbel = Asmikbel::create([
                'prodi_id' => '1',
                'nama'   => 'Khyze',
                'nip_nrk' => '123456789',
                'status' => 'aktif',
                'studi_lanjut' => 'S2',
                'beasiswa' => 'LPDP',
                'mulai_tubel' => '2021-01-01',
                'selesai_tubel' => '2021-12-31',
                'sk_tubel' => '123',
                'status_asmik' => 'aktif',
                'keterangan' => 'Ini fake Keterangan',
         ]);
 
         // Simulate updating the asmikbel
         $response = $this->put("/superadmin/asmikbel/{$asmikbel->id}", [
                'prodi_id' => '1',
                'nama'   => 'Khyze',
                'nip_nrk' => '123456789',
                'status' => 'aktif',
                'studi_lanjut' => 'S2',
                'beasiswa' => 'LPDP',
                'mulai_tubel' => '2021-01-01',
                'selesai_tubel' => '2021-12-31',
                'sk_tubel' => '123',
                'status_asmik' => 'aktif',
                'keterangan' => 'Ini fake Keterangan',
         ]);
 
         // Assert that the update redirects to the index page
         $response->assertRedirect('/superadmin/asmikbel');
         // Assert that the changes were saved to the database
         $this->assertDatabaseHas('asmikbel', [
                'id' => $asmikbel->id,
                'prodi_id' => '1',
                'nama'   => 'Khyze',
                'nip_nrk' => '123456789',
                'status' => 'aktif',
                'studi_lanjut' => 'S2',
                'beasiswa' => 'LPDP',
                'mulai_tubel' => '2021-01-01',
                'selesai_tubel' => '2021-12-31',
                'sk_tubel' => '123',
                'status_asmik' => 'aktif',
                'keterangan' => 'Ini fake Keterangan',
         ]);
     }

     /** @test */
    public function superadmin_melihat_data_asmikbel()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat sample asmikbel
        $asmikbel = Asmikbel::create([
            'prodi_id' => '1',
            'nama'   => 'Khyze',
            'nip_nrk' => '123456789',
            'status' => 'aktif',
            'studi_lanjut' => 'S2',
            'beasiswa' => 'LPDP',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '123',
            'status_asmik' => 'aktif',
            'keterangan' => 'Ini fake Keterangan',
        ]);

        // Akses halaman detail asmikbel
        $response = $this->get("/superadmin/asmikbel/{$asmikbel->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.asmikbel.show');

        // Cek apakah data asmikbel disertakan dalam tampilan
        $response->assertViewHas('asmikbel', $asmikbel);
    }

     /** @test */
     public function superadmin_menghapus_data_asmikbel()
     {
         // Buat user superadmin
         $superadmin = User::factory()->create([
             'role' => 'superadmin',
             'status' => 'aktif',  // Pastikan status aktif
         ]);
 
         // Set user superadmin sebagai pengguna yang sedang login
         $this->actingAs($superadmin);
 
         // Create a sample asmikbel
         $asmikbel = Asmikbel::create([
                'prodi_id' => '1',
                'nama'   => 'Khyze',
                'nip_nrk' => '123456789',
                'status' => 'aktif',
                'studi_lanjut' => 'S2',
                'beasiswa' => 'LPDP',
                'mulai_tubel' => '2021-01-01',
                'selesai_tubel' => '2021-12-31',
                'sk_tubel' => '123',
                'status_asmik' => 'aktif',
                'keterangan' => 'Ini fake Keterangan',
         ]);
 
         // Simulate deleting the asmikbel
         $response = $this->delete("/superadmin/asmikbel/{$asmikbel->id}");
 
         // Assert that the deletion redirects to the index page
         $response->assertRedirect('/superadmin/asmikbel');
         // Assert that the asmikbel was deleted from the database
         $this->assertDatabaseMissing('asmikbel', ['id' => $asmikbel->id]);
     }

     /** @test */
    public function superadmin_mengexport_data_asmikbel()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data Prodi yang akan diekspor
        $asmikbel = Asmikbel::create([
            'prodi_id' => '1',
            'nama'   => 'Khyze',
            'nip_nrk' => '123456789',
            'status' => 'aktif',
            'studi_lanjut' => 'S2',
            'beasiswa' => 'LPDP',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '123',
            'status_asmik' => 'aktif',
            'keterangan' => 'Ini fake Keterangan',
        ]);

        // Pastikan data Prodi dibuat dengan benar
        $this->assertNotNull($asmikbel, "Data Prodi tidak berhasil dibuat.");
        $this->assertDatabaseHas('asmikbel', [
            'prodi_id' => '1',
            'nama'   => 'Khyze',
            'nip_nrk' => '123456789',
            'status' => 'aktif',
            'studi_lanjut' => 'S2',
            'beasiswa' => 'LPDP',
            'mulai_tubel' => '2021-01-01',
            'selesai_tubel' => '2021-12-31',
            'sk_tubel' => '123',
            'status_asmik' => 'aktif',
            'keterangan' => 'ini fake Keterangan',
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/asmikbel/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=asmikbel.xlsx');
    }

    /** @test */
    public function superadmin_mengimport_data_asmikbel()
    {
        // Tentukan jalur yang benar untuk file uji
        $filePath = __DIR__ . '/../assets/templateImport/template_asmikbel.xlsx'; 
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
            ->with(\Mockery::type(AsmikbelImport::class), $request->file('file'));

        // Panggil metode impor secara langsung
        $controller = new AsmikbelController(); // Pastikan controller yang benar digunakan
        $response = $controller->import($request);

        // Pastikan respon adalah redirect dan berhasil
        $this->assertEquals(302, $response->getStatusCode()); // Status redirect
        $this->assertEquals('Data Asmikbel berhasil diimport.', session('success_import_data')); // Pesan berhasil
    }

    /** @test */
    public function superadmin_mendownload_template_excel_asmikbel()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('asmikbel.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_asmikbel.xlsx');
    }
}


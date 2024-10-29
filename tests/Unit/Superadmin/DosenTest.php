<?php

namespace Tests\Unit\Superadmin;


use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Controllers\Admin\DosenController;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Imports\DosenImport;
use App\Models\Dosen;
use App\Models\User;
use Tests\TestCase;

class DosenTest extends TestCase
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
     public function superadmin_mengakses_halaman_index_dosen()
     {
         // Buat pengguna dengan peran (role) dan status yang diperlukan
         $superadmin = User::factory()->create([
             'role' => 'superadmin', // Set role pengguna sebagai 'superadmin'
             'status' => 'aktif',     // Pastikan status aktif
         ]);
 
         // Melakukan autentikasi sebagai pengguna superadmin
         $this->actingAs($superadmin); // Fungsi actingAs() digunakan untuk "login" sebagai pengguna superadmin
 
         // Coba untuk mengakses halaman index dosen
         $response = $this->get('/superadmin/dosen'); // Mengirim permintaan HTTP GET ke URL '/superadmin/dosen'
 
         // Pastikan bahwa status responsnya adalah 200 (OK)
         $response->assertStatus(200); // Memastikan bahwa halaman berhasil diakses dengan status respons 200 (berhasil)
     }

    /** @test */
    public function superadmin_menambah_data_dosen()
    {
        // Buat pengguna dengan peran (role) dan status yang diperlukan
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Melakukan autentikasi sebagai pengguna superadmin
        $this->actingAs($superadmin);

        // Membuat data dosen baru
        $response = $this->post('/superadmin/dosen', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'pendidikan' => 'S2',
            'status_nidn_nidk' => 'NIDN',
            'status_pegawai' => 'PNS',
            'jabfung' => 'Lektor',
            'tmt_jabfung_terakhir' => '2020-01-01',
            'target_kenaikan_jabfung' => '2024-01-01',
            'tmt_masuk_itera' => '2010-01-01',
            'tmt' => '2010-01-01',
            'pekerti' => 'Baik',
            'serdos' => 'Ya',
            'status_dosen' => 'Aktif',
            
        ]);

        // Pastikan bahwa responsnya adalah redirect ke halaman index dosen
        $response->assertRedirect('/superadmin/dosen');

        // Pastikan bahwa data dosen berhasil disimpan ke dalam database
        $this->assertDatabaseHas('dosen', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'pendidikan' => 'S2',
            'status_nidn_nidk' => 'NIDN',
            'status_pegawai' => 'PNS',
            'jabfung' => 'Lektor',
            'tmt_jabfung_terakhir' => '2020-01-01',
            'target_kenaikan_jabfung' => '2024-01-01',
            'tmt_masuk_itera' => '2010-01-01',
            'tmt' => '2010-01-01',
            'pekerti' => 'Baik',
            'serdos' => 'Ya',
            'status_dosen' => 'Aktif',
            
        ]);
    }

    /** @test */
    public function superadmin_mengedit_data_dosen(): void
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample dosen
        $dosen = Dosen::create([
           'prodi_id' => 1,
           'nama' => 'Khyze',
           'nip_nrk' => '1234567890',
           'tgl_lahir' => '1990-01-01',
           'pendidikan' => 'S2',
           'status_nidn_nidk' => 'NIDN',
           'status_pegawai' => 'PNS',
           'jabfung' => 'Lektor',
           'tmt_jabfung_terakhir' => '2020-01-01',
           'target_kenaikan_jabfung' => '2024-01-01',
           'tmt_masuk_itera' => '2010-01-01',
           'tmt' => '2010-01-01',
           'pekerti' => 'Baik',
           'serdos' => 'Ya',
           'status_dosen' => 'Aktif',
           'sk_pns' => null,
           'sk_cpns' => null,
           'sk_tubel' => null,
           'sk_perpanjangan_tubel' => null,
           'sk_jabfung' => null,
           'sk_pengaktifan' => null,
           'sk_pengaktifan_kembali' => null,
        ]);

        // Simulate updating the dosen
        $response = $this->put("/superadmin/dosen/{$dosen->id}", [
           'prodi_id' => 1,
           'nama' => 'Khyze',
           'nip_nrk' => '1234567890',
           'tgl_lahir' => '1990-01-01',
           'pendidikan' => 'S2',
           'status_nidn_nidk' => 'NIDN',
           'status_pegawai' => 'PNS',
           'jabfung' => 'Lektor',
           'tmt_jabfung_terakhir' => '2020-01-01',
           'target_kenaikan_jabfung' => '2024-01-01',
           'tmt_masuk_itera' => '2010-01-01',
           'tmt' => '2010-01-01',
           'pekerti' => 'Baik',
           'serdos' => 'Ya',
           'status_dosen' => 'Aktif',
           'sk_pns' => UploadedFile::fake()->create('29-10-2024_SK_PNS_Khyze.pdf', 100, 'application/pdf'),
           'sk_cpns' => UploadedFile::fake()->create('29-10-2024_SK_CPNS_Khyze.pdf', 100, 'application/pdf'),
           'sk_tubel' => UploadedFile::fake()->create('29-10-2024_SK_Tubel_Khyze.pdf', 100, 'application/pdf'),
           'sk_perpanjangan_tubel' => UploadedFile::fake()->create('29-10-2024_SK_Perpanjangan_Tubel_Khyze.pdf', 100, 'application/pdf'),
           'sk_jabfung' => UploadedFile::fake()->create('29-10-2024_SK_Jabfung_Khyze.pdf', 100, 'application/pdf'),
           'sk_pengaktifan' => UploadedFile::fake()->create('29-10-2024_SK_Pengaktifan_Khyze.pdf', 100, 'application/pdf'),
           'sk_pengaktifan_kembali' => UploadedFile::fake()->create('29-10-2024_SK_Pengaktifan_Kembali_Khyze.pdf', 100, 'application/pdf'),
        ]);

        // Assert that the update redirects to the index page
        $response->assertRedirect('/superadmin/dosen');
        // Assert that the changes were saved to the database
        $this->assertDatabaseHas('dosen', [
               'prodi_id' => 1,
               'nama' => 'Khyze',
               'nip_nrk' => '1234567890',
               'tgl_lahir' => '1990-01-01',
               'pendidikan' => 'S2',
               'status_nidn_nidk' => 'NIDN',
               'status_pegawai' => 'PNS',
               'jabfung' => 'Lektor',
               'tmt_jabfung_terakhir' => '2020-01-01',
               'target_kenaikan_jabfung' => '2024-01-01',
               'tmt_masuk_itera' => '2010-01-01',
               'tmt' => '2010-01-01',
               'pekerti' => 'Baik',
               'serdos' => 'Ya',
               'status_dosen' => 'Aktif',
               'sk_pns' => '29-10-2024_SK_PNS_Khyze.pdf',
               'sk_cpns' => '29-10-2024_SK_CPNS_Khyze.pdf',
               'sk_tubel' => '29-10-2024_SK_Tubel_Khyze.pdf',
               'sk_perpanjangan_tubel' => '29-10-2024_SK_Perpanjangan_Tubel_Khyze.pdf',
               'sk_jabfung' => '29-10-2024_SK_Jabfung_Khyze.pdf',
               'sk_pengaktifan' => '29-10-2024_SK_Pengaktifan_Khyze.pdf',
               'sk_pengaktifan_kembali' => '29-10-2024_SK_Pengaktifan_Kembali_Khyze.pdf',
        ]);
    }

    /** @test */
    public function superadmin_melihat_data_dosen()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
        'role' => 'superadmin',
        'status' => 'aktif', // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat sample prodi
        $dosen = Dosen::create([
        'prodi_id' => 1,
        'nama' => 'Khyze',
        'nip_nrk' => '1234567890',
        'tgl_lahir' => '1990-01-01',
        'pendidikan' => 'S2',
        'status_nidn_nidk' => 'NIDN',
        'status_pegawai' => 'PNS',
        'jabfung' => 'Lektor',
        'tmt_jabfung_terakhir' => '2020-01-01',
        'target_kenaikan_jabfung' => '2024-01-01',
        'tmt_masuk_itera' => '2010-01-01',
        'tmt' => '2010-01-01',
        'pekerti' => 'Baik',
        'serdos' => 'Ya',
        'status_dosen' => 'Aktif',
        'sk_pns' => '29-10-2024_SK_PNS_Khyze.pdf',
        'sk_cpns' => '29-10-2024_SK_CPNS_Khyze.pdf',
        'sk_tubel' => '29-10-2024_SK_Tubel_Khyze.pdf',
        'sk_perpanjangan_tubel' => '29-10-2024_SK_Perpanjangan_Tubel_Khyze.pdf',
        'sk_jabfung' => '29-10-2024_SK_Jabfung_Khyze.pdf',
        'sk_pengaktifan' => '29-10-2024_SK_Pengaktifan_Khyze.pdf',
        'sk_pengaktifan_kembali' => '29-10-2024_SK_Pengaktifan_Kembali_Khyze.pdf',
        ]);

        // Akses halaman detail dosen
        $response = $this->get("/superadmin/dosen/{$dosen->id}");

        // Cek apakah respons status adalah 200 (OK)
        $response->assertStatus(200);

        // Cek apakah tampilan yang benar di-return
        $response->assertViewIs('admin.dosen.show');

        // Cek apakah data dosen disertakan dalam tampilan
        $response->assertViewHas('dosen', $dosen);
    }

    /** @test */
    public function superadmin_menghapus_data_dosen()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Create a sample dosen
        $dosen = Dosen::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'pendidikan' => 'S2',
            'status_nidn_nidk' => 'NIDN',
            'status_pegawai' => 'PNS',
            'jabfung' => 'Lektor',
            'tmt_jabfung_terakhir' => '2020-01-01',
            'target_kenaikan_jabfung' => '2024-01-01',
            'tmt_masuk_itera' => '2010-01-01',
            'tmt' => '2010-01-01',
            'pekerti' => 'Baik',
            'serdos' => 'Ya',
            'status_dosen' => 'Aktif',
            'sk_pns' => '29-10-2024_SK_PNS_Khyze.pdf',
            'sk_cpns' => '29-10-2024_SK_CPNS_Khyze.pdf',
            'sk_tubel' => '29-10-2024_SK_Tubel_Khyze.pdf',
            'sk_perpanjangan_tubel' => '29-10-2024_SK_Perpanjangan_Tubel_Khyze.pdf',
            'sk_jabfung' => '29-10-2024_SK_Jabfung_Khyze.pdf',
            'sk_pengaktifan' => '29-10-2024_SK_Pengaktifan_Khyze.pdf',
            'sk_pengaktifan_kembali' => '29-10-2024_SK_Pengaktifan_Kembali_Khyze.pdf',
        ]);

        // Simulate deleting the dosen
        $response = $this->delete("/superadmin/dosen/{$dosen->id}");

        // Assert that the deletion redirects to the index page
        $response->assertRedirect('/superadmin/dosen');
        // Assert that the dosen was deleted from the database
        $this->assertDatabaseMissing('dosen', ['id' => $dosen->id]);
    }

    /** @test */
    public function superadmin_mengexport_data_dosen()
    {
        // Buat user superadmin dan pastikan pengguna dibuat
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Buat data Dosen yang akan diekspor
        $dosen = Dosen::create([
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'pendidikan' => 'S2',
            'status_nidn_nidk' => 'NIDN',
            'status_pegawai' => 'PNS',
            'jabfung' => 'Lektor',
            'tmt_jabfung_terakhir' => '2020-01-01',
            'target_kenaikan_jabfung' => '2024-01-01',
            'tmt_masuk_itera' => '2010-01-01',
            'tmt' => '2010-01-01',
            'pekerti' => 'Baik',
            'serdos' => 'Ya',
            'status_dosen' => 'Aktif',
            'sk_pns' => '29-10-2024_SK_PNS_Khyze.pdf',
            'sk_cpns' => '29-10-2024_SK_CPNS_Khyze.pdf',
            'sk_tubel' => '29-10-2024_SK_Tubel_Khyze.pdf',
            'sk_perpanjangan_tubel' => '29-10-2024_SK_Perpanjangan_Tubel_Khyze.pdf',
            'sk_jabfung' => '29-10-2024_SK_Jabfung_Khyze.pdf',
            'sk_pengaktifan' => '29-10-2024_SK_Pengaktifan_Khyze.pdf',
            'sk_pengaktifan_kembali' => '29-10-2024_SK_Pengaktifan_Kembali_Khyze.pdf',
        ]);

        // Pastikan data Dosen dibuat dengan benar
        $this->assertNotNull($dosen, "Data Dosen tidak berhasil dibuat.");
        $this->assertDatabaseHas('dosen', [
            'prodi_id' => 1,
            'nama' => 'Khyze',
            'nip_nrk' => '1234567890',
            'tgl_lahir' => '1990-01-01',
            'pendidikan' => 'S2',
            'status_nidn_nidk' => 'NIDN',
            'status_pegawai' => 'PNS',
            'jabfung' => 'Lektor',
            'tmt_jabfung_terakhir' => '2020-01-01',
            'target_kenaikan_jabfung' => '2024-01-01',
            'tmt_masuk_itera' => '2010-01-01',
            'tmt' => '2010-01-01',
            'pekerti' => 'Baik',
            'serdos' => 'Ya',
            'status_dosen' => 'Aktif',
            'sk_pns' => '29-10-2024_SK_PNS_Khyze.pdf',
            'sk_cpns' => '29-10-2024_SK_CPNS_Khyze.pdf',
            'sk_tubel' => '29-10-2024_SK_Tubel_Khyze.pdf',
            'sk_perpanjangan_tubel' => '29-10-2024_SK_Perpanjangan_Tubel_Khyze.pdf',
            'sk_jabfung' => '29-10-2024_SK_Jabfung_Khyze.pdf',
            'sk_pengaktifan' => '29-10-2024_SK_Pengaktifan_Khyze.pdf',
            'sk_pengaktifan_kembali' => '29-10-2024_SK_Pengaktifan_Kembali_Khyze.pdf',
        ]);

        // Simulasikan permintaan export
        $response = $this->get('/dosen/export');

        // Tambahkan debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Perbaiki format header untuk 'Content-Disposition'
        $response->assertHeader('Content-Disposition', 'attachment; filename=dosen.xlsx');
    }

    /** @test */
    public function superadmin_mengimport_data_dosen()
    {
        // Define the correct path for the test file
        $filePath = __DIR__ . '/../assets/templateImport/template_dosen.xlsx'; // Corrected path
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
            ->with(\Mockery::type(DosenImport::class), $request->file('file'));

        // Call the import method directly
        $controller = new DosenController(); // Ensure the correct controller is used
        $response = $controller->import($request);

        // Assert the response is a redirect and successful
        $this->assertEquals(302, $response->getStatusCode()); // Redirect status
        $this->assertEquals('Data Dosen berhasil diimport.', session('success_import_data')); // Success message
    }

    /** @test */
    public function superadmin_mendownload_template_excel_dosen()
    {
        // Buat user superadmin
        $superadmin = User::factory()->create([
            'role' => 'superadmin',
            'status' => 'aktif',  // Pastikan status aktif
        ]);

        // Set user superadmin sebagai pengguna yang sedang login
        $this->actingAs($superadmin);

        // Simulasikan permintaan untuk mendownload template menggunakan rute yang benar
        $response = $this->get(route('dosen.template'));

        // Debug untuk memastikan respons
        $response->dump();

        // Pastikan respons adalah unduhan file
        $response->assertStatus(200);

        // Sesuaikan pengecekan Content-Disposition header
        $response->assertHeader('Content-Disposition', 'attachment; filename=template_dosen.xlsx');
    }

}

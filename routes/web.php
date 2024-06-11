<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controller
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\JumlahDosenController;
use App\Http\Controllers\Admin\ResignController;
use App\Http\Controllers\Admin\TaslabController;
use App\Http\Controllers\Admin\PejabatController;
use App\Http\Controllers\Admin\DosbelController;
use App\Http\Controllers\Admin\AsmikbelController;
use App\Http\Controllers\Admin\DoslubiController;
use App\Http\Controllers\Admin\DosenController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\AknaluController;
use App\Http\Controllers\Admin\TahunController;
use App\Http\Controllers\Admin\AllRekapController;
use App\Http\Controllers\Admin\MhsAktifController;
use App\Http\Controllers\Admin\UndurDiriController;
use App\Http\Controllers\Admin\KeluarController;
use App\Http\Controllers\Admin\WafatController;
use App\Http\Controllers\Admin\LulusController;
use App\Http\Controllers\Admin\MhsTAController;
use App\Http\Controllers\Admin\FormTAController;
use App\Http\Controllers\Admin\FormKPController;
use App\Http\Controllers\Admin\FormKHSController;
use App\Http\Controllers\Admin\FormLegalController;
use App\Http\Controllers\Admin\FormSTMController;
use App\Http\Controllers\Admin\FormWcrController;
use App\Http\Controllers\Admin\FormRekomController;
use App\Http\Controllers\Admin\FormBukrimController;


// Client
use App\Http\Controllers\Client\HomeController;

// Middleware
use App\Http\Middleware\SuperAdmin;
use App\Http\Middleware\Pegawai;
use App\Http\Middleware\Akademik;
use App\Http\Middleware\Kemahasiswaan;
use App\Http\Middleware\Keuangan;
use App\Http\Middleware\Prodi;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
  return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
  Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

  // CMS SUPER ADMIN
  Route::middleware([Superadmin::class])->name('superadmin.')->prefix('superadmin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('user', UserController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('jumlah_dosen', JumlahDosenController::class);
    Route::resource('resign', ResignController::class);
    Route::resource('taslab', TaslabController::class);
    Route::resource('pejabat', PejabatController::class);
    Route::resource('dosbel', DosbelController::class);
    Route::resource('asmikbel', AsmikbelController::class);
    Route::resource('doslubi', DoslubiController::class);
    Route::resource('dosen', DosenController::class);
    Route::resource('kegiatan', KegiatanController::class);
    Route::resource('prestasi', PrestasiController::class);
    Route::resource('aknalu', AknaluController::class);
    Route::resource('tahun', TahunController::class);
    Route::resource('all-rekap', AllRekapController::class);
    Route::resource('mhs-aktif', MhsAktifController::class);
    Route::resource('undur-diri', UndurDiriController::class);
    Route::resource('keluar', KeluarController::class);
    Route::resource('wafat', WafatController::class);
    Route::resource('lulus', LulusController::class);
    Route::resource('mhs-ta', MhsTAController::class);
    Route::resource('form-ta', FormTAController::class);
    Route::resource('form-kp', FormKPController::class);
    Route::resource('form-khs', FormKHSController::class);
    Route::resource('form-wcr', FormWcrController::class);
    Route::resource('form-rekom', FormRekomController::class);
    Route::resource('form-stm', FormSTMController::class);
    Route::resource('form-legal', FormLegalController::class);
    Route::resource('form-bukrim', FormBukrimController::class);  
  });

  // CMS PEGAWAI
  Route::middleware([Pegawai::class])->name('pegawai.')->prefix('pegawai')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  });

  // CMS AKADEMIK
  Route::middleware([Akademik::class])->name('akademik.')->prefix('akademik')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  });

  // CMS KEMAHASISWAAN
  Route::middleware([Kemahasiswaan::class])->name('kemahasiswaan.')->prefix('kemahasiswaan')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  });

  // CMS KEUANGAN
  Route::middleware([Keuangan::class])->name('keuangan.')->prefix('keuangan')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  });

  // CMS PRODI
  Route::middleware([Prodi::class])->name('prodi.')->prefix('prodi')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/data', [HomeController::class, 'data'])->name('data');
Route::get('/kegiatan', [HomeController::class, 'kegiatan'])->name('kegiatan');
Route::get('/kontak', [HomeController::class, 'kontak'])->name('kontak');
Route::get('/pengajuan', [HomeController::class, 'pengajuan'])->name('pengajuan');
Route::get('/prestasi', [HomeController::class, 'prestasi'])->name('prestasi');
Route::post('/prestasi', [HomeController::class, 'UploadPrestasi'])->name('prestasi.store');
Route::post('/kegiatan', [HomeController::class, 'UploadKegiatan'])->name('kegiatan.store');
Route::get('/tentang', [HomeController::class, 'tentang'])->name('tentang');
Route::get('/form-ta', [HomeController::class, 'formta'])->name('formta');
Route::post('/form-ta', [HomeController::class, 'UploadFormTA'])->name('formta.store');
Route::get('/form-kp', [HomeController::class, 'formkp'])->name('formkp');
Route::post('/form-kp', [HomeController::class, 'UploadFormKP'])->name('formkp.store');
Route::get('/form-khs', [HomeController::class, 'formkhs'])->name('formkhs');
Route::post('/form-khs', [HomeController::class, 'UploadFormKHS'])->name('formkhs.store');
Route::get('/form-legal', [HomeController::class, 'formlegal'])->name('formlegal');
Route::post('/form-legal', [HomeController::class, 'UploadFormLegal'])->name('formlegal.store');
Route::get('/form-stm', [HomeController::class, 'formstm'])->name('formstm');
Route::post('/form-stm', [HomeController::class, 'UploadFormSTM'])->name('formstm.store');
Route::get('/form-wcr', [HomeController::class, 'formwcr'])->name('formwcr');
Route::post('/form-wcr', [HomeController::class, 'UploadFormWcr'])->name('formwcr.store');
Route::get('/form-rekom', [HomeController::class, 'formrekom'])->name('formrekom');
Route::post('/form-rekom', [HomeController::class, 'UploadFormRekom'])->name('formrekom.store');
Route::get('/form-bukrim', [HomeController::class, 'formbukrim'])->name('formbukrim');
Route::post('/form-bukrim', [HomeController::class, 'UploadFormBukrim'])->name('formbukrim.store');

Route::get('/mahasiswa', [HomeController::class, 'mahasiswa'])->name('mahasiswa');

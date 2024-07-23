<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahun;
use App\Models\Prodi;
use App\Models\Asmikbel;
use App\Models\Pejabat;
use App\Models\Dosen;
use App\Models\Dosbel;
use App\Models\Doslubi;
use App\Models\Taslab;
use App\Models\Resign;
use App\Models\Prestasi;
use App\Models\Kegiatan;
use App\Models\MhsAktif;
use App\Models\UndurDiri;
use App\Models\Keluar;
use App\Models\Wafat;
use App\Models\Lulus;

class DashboardController extends Controller
{
    public function index()
    {   
        // Ambil tahun terbaru
        $latestTahun = Tahun::latest('created_at')->first();

        // Membuat array untuk digunakan di view
        $tahun = collect([]);
        if ($latestTahun !== null) {
            $tahun->push($latestTahun);
        }
        $countAllDosen = Prodi::sum('jumlah_dosen');
        $countProdi = Prodi::count();
        $countPejabat = Pejabat::count();
        $countDosen = Dosen::count();
        $countDosbel = Dosbel::count();
        $countDoslubi = Doslubi::count();
        $countTaslab = Taslab::count();
        $countResign = Resign::count();
        $countAsmikbel = Asmikbel::count();
        $countPrestasi = Prestasi::count();
        $countKegiatan = Kegiatan::count();
        $latestTahun = Tahun::latest('created_at')->first();

        // Menghitung jumlah mahasiswa

        $mhsAktif = MhsAktif::sum('jumlah_mhs_aktif_ts') + MhsAktif::sum('jumlah_mhs_aktif_th');

        $mhsUndurDiri = UndurDiri::sum('mhs_undur_diri_genap') + UndurDiri::sum('mhs_undur_diri_ganjil');

        $mhsKeluar = Keluar::sum('mhs_keluar_genap') + Keluar::sum('mhs_keluar_ganjil');

        $mhsWafat = Wafat::sum('mhs_wafat_genap') + Wafat::sum('mhs_wafat_ganjil');

        $mhsLulus = Lulus::sum('januari') + Lulus::sum('februari') + Lulus::sum('maret') + Lulus::sum('april') + Lulus::sum('mei') + Lulus::sum('juni') + Lulus::sum('juli') + Lulus::sum('agustus') + Lulus::sum('september') + Lulus::sum('oktober') + Lulus::sum('november') + Lulus::sum('desember');

        $hasilGabungan = $mhsAktif - $mhsUndurDiri - $mhsKeluar - $mhsWafat - $mhsLulus;

        $currentYear = date('Y');

        $kegiatan = Kegiatan::whereYear('tgl_kegiatan', $currentYear)
            ->selectRaw('MONTH(tgl_kegiatan) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month');

        // Ambil jumlah kegiatan per bulan
        $kegiatanPerBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $kegiatanPerBulan[$i] = isset($kegiatan[$i]) ? $kegiatan[$i]->count : 0;
        }

        $prestasi = Prestasi::whereYear('tgl_kegiatan', $currentYear)
            ->selectRaw('MONTH(tgl_kegiatan) as month, COUNT(*) as count')
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->keyBy('month'); // keyBy untuk mempermudah akses berdasarkan bulan

        // Ambil jumlah prestasi per bulan
        $prestasiPerBulan = [];
        for ($i = 1; $i <= 12; $i++) {
            $prestasiPerBulan[$i] = isset($prestasi[$i]) ? $prestasi[$i]->count : 0;
        }

        return view('admin.dashboard', 
        compact (
        'tahun', 
        'countProdi',
        'countPejabat', 
        'countDosen', 
        'countDosbel', 
        'countDoslubi', 
        'countTaslab', 
        'countResign', 
        'countAsmikbel', 
        'countPrestasi',
        'countKegiatan',
        'latestTahun',
        'mhsAktif',
        'mhsUndurDiri',
        'mhsKeluar',
        'mhsWafat',
        'mhsLulus',
        'hasilGabungan',
        'countAllDosen',
        'currentYear',
        'kegiatan',
        'kegiatanPerBulan',
        'prestasi',
        'prestasiPerBulan',
    ));
    }
    
}

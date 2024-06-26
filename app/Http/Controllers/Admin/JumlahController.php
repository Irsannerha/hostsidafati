<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MhsAktif;
use App\Models\UndurDiri;
use App\Models\Keluar;
use App\Models\Wafat;
use App\Models\Lulus;
use App\Models\Prodi;
use App\Models\Tahun;

class JumlahController extends Controller
{
    public function index()
    {   

        $dataPerTahunSemester = Tahun::get()->map(function ($tahun) {
            $mahasiswaAktif = MhsAktif::where('ts_id', $tahun->id)->get();
            $undurdiri = UndurDiri::where('ts_id', $tahun->id)->get();
            $keluar    = Keluar::where('ts_id', $tahun->id)->get();
            $wafat     = Wafat::where('ts_id', $tahun->id)->get();
            $lulus     = Lulus::where('ts_id', $tahun->id)->get();

            $daftarProdiAktif = $mahasiswaAktif->pluck('prodi_id')->flatten()->unique()->toArray();
            $daftarProdiUndurDiri = $undurdiri->pluck('prodi_id')->flatten()->unique()->toArray();
            $daftarProdiKeluar = $keluar->pluck('prodi_id')->flatten()->unique()->toArray();
            $daftarProdiWafat = $wafat->pluck('prodi_id')->flatten()->unique()->toArray();
            $daftarProdiLulus = $lulus->pluck('prodi_id')->flatten()->unique()->toArray();

            $daftarProdi = array_unique(array_merge($daftarProdiAktif, $daftarProdiUndurDiri, $daftarProdiKeluar, $daftarProdiWafat, $daftarProdiLulus));
            $data = collect();
            foreach ($daftarProdi as $prodi) {
                $mhsaktif = $mahasiswaAktif->where('prodi_id', $prodi);
                $jumlahMhsAktif = $mhsaktif->sum('jumlah_mhs_aktif_ts') + $mhsaktif->sum('jumlah_mhs_aktif_th');
                $mhsUndurDiri = $undurdiri->where('prodi_id', $prodi);
                $jumlahUndurDiri = $mhsUndurDiri->sum('mhs_undur_diri_genap') + $mhsUndurDiri->sum('mhs_undur_diri_ganjil');
                $mhsKeluar = $keluar->where('prodi_id', $prodi);
                $jumlahKeluar = $mhsKeluar->sum('mhs_keluar_genap') + $mhsKeluar->sum('mhs_keluar_ganjil');
                $mhsWafat = $wafat->where('prodi_id', $prodi);
                $jumlahWafat = $mhsWafat->sum('mhs_wafat_genap') + $mhsWafat->sum('mhs_wafat_ganjil');
                $mhsLulus = $lulus->where('prodi_id', $prodi);
                $jumlahLulus = $mhsLulus->sum('januari') + $mhsLulus->sum('februari') + $mhsLulus->sum('maret') + $mhsLulus->sum('april') + $mhsLulus->sum('mei') + $mhsLulus->sum('juni') + $mhsLulus->sum('juli') + $mhsLulus->sum('agustus') + $mhsLulus->sum('september') + $mhsLulus->sum('oktober') + $mhsLulus->sum('november') + $mhsLulus->sum('desember');
                $jumlahKurang = $jumlahMhsAktif - $jumlahUndurDiri - $jumlahKeluar - $jumlahWafat - $jumlahLulus;
                $data->push((object) [
                    'prodi_id' => $prodi,
                    'prodi' => Prodi::find($prodi)->prodi,
                    'jumlahMhsAktif' => $jumlahMhsAktif,
                    'jumlahUndurDiri' => $jumlahUndurDiri,
                    'jumlahKeluar' => $jumlahKeluar,
                    'jumlahWafat' => $jumlahWafat,
                    'jumlahLulus' => $jumlahLulus,
                    'jumlahKurang' => $jumlahKurang,
                ]);
            }

            $jumlahMhsAktif = $mahasiswaAktif->sum('jumlah_mhs_aktif_ts') + $mahasiswaAktif->sum('jumlah_mhs_aktif_th');
            $jumlahUndurDiri = $undurdiri->sum('mhs_undur_diri_genap') + $undurdiri->sum('mhs_undur_diri_ganjil');
            $jumlahKeluar = $keluar->sum('mhs_keluar_genap') + $keluar->sum('mhs_keluar_ganjil');
            $jumlahWafat = $wafat->sum('mhs_wafat_genap') + $wafat->sum('mhs_wafat_ganjil');
            $jumlahLulus = $lulus->sum('januari') + $lulus->sum('februari') + $lulus->sum('maret') + $lulus->sum('april') + $lulus->sum('mei') + $lulus->sum('juni') + $lulus->sum('juli') + $lulus->sum('agustus') + $lulus->sum('september') + $lulus->sum('oktober') + $lulus->sum('november') + $lulus->sum('desember');
            $jumlahKurang = $jumlahMhsAktif - $jumlahUndurDiri - $jumlahKeluar - $jumlahWafat - $jumlahLulus;
            return (object) [
                'ts_id' => $tahun->id,
                'tahun' => $tahun->ts,
                'data' => $data,
                'jumlahMhsAktif' => $jumlahMhsAktif,
                'jumlahUndurDiri' => $jumlahUndurDiri,
                'jumlahKeluar' => $jumlahKeluar,
                'jumlahWafat' => $jumlahWafat,
                'jumlahLulus' => $jumlahLulus,
                'jumlahKurang' => $jumlahKurang,
            ];
        });

        // Mengirimkan data yang dihitung ke view
        return view('admin.jumlah.index', compact('dataPerTahunSemester'));
    }
}

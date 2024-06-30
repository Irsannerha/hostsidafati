<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MhsAktif;
use App\Models\Prodi;
use App\Models\Tahun;
use App\Exports\MhsAktifExport;
use App\Imports\MhsAktifImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MhsAktifController extends Controller
{
    public function index()
    {
        $mhsaktif = MhsAktif::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();

        $total = MhsAktif::select(DB::raw('SUM(jumlah_mhs_aktif_ts) as mhs_non_pmb, SUM(jumlah_mhs_aktif_th) as mhs_pmb, SUM(jumlah_mhs_aktif_ts + jumlah_mhs_aktif_th) as total'))
            ->groupBy('ts_id')
            ->get();
        return view('admin.mhs-aktif.index', compact('mhsaktif', 'prodi', 'tahun', 'total'));
    }

    public function create(Request $request)
    {
        if ($request->tahun_semester_id == null) {
        $prodi = Prodi::all();
        }
        else {
            $tahun_filter = MhsAktif::select('prodi_id')->where('ts_id', $request->tahun_semester_id)->get();
            $prodi = Prodi::whereNotIn('id', $tahun_filter)->get();
        }
        $tahun = Tahun::all();if ($request->tahun_semester_id == null) {
        return view('admin.mhs-aktif.create', compact('prodi', 'tahun'));
        } else {
            return response()->json($prodi);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'jumlah_mhs_aktif_ts' => 'nullable',
            'jumlah_mhs_aktif_th' => 'nullable',
        ]);

        $mhsaktif = new MhsAktif;
        $mhsaktif->prodi_id = $request->prodi_id;
        $mhsaktif->ts_id = $request->ts_id;
        $mhsaktif->jumlah_mhs_aktif_ts = $request->jumlah_mhs_aktif_ts;
        $mhsaktif->jumlah_mhs_aktif_th = $request->jumlah_mhs_aktif_th;
        $mhsaktif->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.mhs-aktif.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.mhs-aktif.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $mhsaktif = MhsAktif::find($id);
        $prodi = Prodi::all();
        return view('admin.rekap-mhs.show', compact('mhsaktif', 'prodi'));
    }

    public function edit($id)
    {
        $mhsaktif = MhsAktif::findOrFail($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        // dd($rekapmhs);
        return view('admin.mhs-aktif.edit', compact('mhsaktif', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'jumlah_mhs_aktif_ts' => 'nullable',
            'jumlah_mhs_aktif_th' => 'nullable',
        ]);

        $mhsaktif = MhsAktif::findOrFail($id);
        $mhsaktif->prodi_id = $request->prodi_id;
        $mhsaktif->ts_id = $request->ts_id;
        $mhsaktif->jumlah_mhs_aktif_ts = $request->jumlah_mhs_aktif_ts;
        $mhsaktif->jumlah_mhs_aktif_th = $request->jumlah_mhs_aktif_th;
        $mhsaktif->save();

        if(Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.mhs-aktif.index')->with('success_update_data', 'Data berhasil diubah');
        } elseif (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.mhs-aktif.index')->with('success_update_data', 'Data berhasil diubah');
        }
    }

   public function destroy($id)
    {
        $mhsaktif = MhsAktif::findOrFail($id);
        $mhsaktif->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.mhs-aktif.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.mhs-aktif.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    // public function chartData()
    // {
    //     // Ambil data jumlah mahasiswa aktif dan prodi_id
    //     $mhsAktifData = MhsAktif::select('prodi_id', 'jumlah_mhs_aktif_ts', 'jumlah_mhs_aktif_th')
    //         ->orderBy('prodi_id')
    //         ->get();

    //     // Siapkan struktur data untuk chart
    //     $chartData = [
    //         'labels' => [],
    //         'datasets' => [
    //             [
    //                 'label' => 'Jumlah Mahasiswa',
    //                 'data' => [],
    //                 'backgroundColor' => [],
    //                 'borderColor' => [],
    //                 'borderWidth' => 1
    //             ]
    //         ]
    //     ];

    //     // Warna untuk jumlah mahasiswa
    //     $colors = ['#1b3133', '#daa520', '#ff6347', '#4682b4', '#32cd32']; // Beberapa warna contoh
    //     $colorIndex = 0;

    //     // Function untuk mendapatkan nama prodi berdasarkan prodi_id
    //     function getProdiName($prodiId)
    //     {
    //         $prodiNames = [
    //             1 => 'Teknik Biomedis',
    //             2 => 'Teknik Biosistem',
    //             3 => 'Teknik Elektro',
    //             4 => 'Teknik Fisika',
    //             5 => 'Teknik Geofisika',
    //             6 => 'Teknik Geologi',
    //             7 => 'Teknik Informatika',
    //             8 => 'Teknik Industri',
    //             9 => 'Teknik Kimia',
    //             10 => 'Teknik Material',
    //             11 => 'Teknik Mesin',
    //             12 => 'Teknik Pertambangan',
    //             13 => 'Teknik Sistem Energi',
    //             14 => 'Teknik Telekomunikasi',
    //             15 => 'Teknologi Industri Pertanian',
    //             16 => 'Teknologi Pangan',
    //             17 => 'Rekayasa Instrumentasi dan Automasi',
    //             18 => 'Rekayasa Kehutanan',
    //             19 => 'Rekayasa Keolahragaan',
    //             20 => 'Rekayasa Kosmetik',
    //             21 => 'Rekayasa Minyak dan Gas',
    //             // Tambahkan nama prodi lainnya jika diperlukan
    //         ];

    //         return $prodiNames[$prodiId] ?? 'Unknown';
    //     }

    //     // Isi data berdasarkan nilai jumlah_mhs_aktif_ts dan jumlah_mhs_aktif_th
    //     foreach ($mhsAktifData as $data) {
    //         // Menentukan nama prodi berdasarkan prodi_id
    //         $prodiName = getProdiName($data->prodi_id);

    //         // Mengisi data dan properti lainnya
    //         $chartData['labels'][] = $prodiName;
    //         $chartData['datasets'][0]['data'][] = $data->jumlah_mhs_aktif_ts + $data->jumlah_mhs_aktif_th; // Total jumlah mahasiswa aktif
    //         $chartData['datasets'][0]['backgroundColor'][] = $colors[$colorIndex % count($colors)];
    //         $chartData['datasets'][0]['borderColor'][] = $colors[$colorIndex % count($colors)];
    //         $colorIndex++;
    //     }

    //     return response()->json($chartData);
    // }
    public function getchartDataMhsAktif()
    {
        $filter = '2012/2013';
        $data = MhsAktif::with('prodi')->whereHas('tahun', function ($query) use ($filter) {
            $query->where('ts', $filter);
        })->get();
        
        $labels = $data->map(function($item) {
            return $item->prodi->prodi; 
        });

        $jumlah_mhs_aktif_ts = $data->pluck('jumlah_mhs_aktif_ts');
        $jumlah_mhs_aktif_th = $data->pluck('jumlah_mhs_aktif_th');
        $total = $jumlah_mhs_aktif_ts->zip($jumlah_mhs_aktif_th)->map(function($item) {
            return $item[0] + $item[1];
        });

        return response()->json([
            'labels' => $labels,
            'ts' => substr($filter, 0, 4) - 1 . '/' . substr($filter, -4) - 1,
            'th' => explode('/', $filter)[1] -1,
            'jumlah_mhs_aktif_ts' => $jumlah_mhs_aktif_ts,
            'jumlah_mhs_aktif_th' => $jumlah_mhs_aktif_th,
            'total' => $total,
        ]);
    }

    public function export()
    {
        return Excel::download(new MhsAktifExport, 'MhsAktif + PMB.xlsx');
    }

    public function downloadTemplate()
    {
        $file = public_path('assets/template/template_MhsAktif.xlsx');
        return response()->download($file);
    }
    
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        // dd ($file);

        Excel::import(new MhsAktifImport, $file);

        return back()->with('success_import_data', 'Data Mhs Aktif + PMB berhasil diimport');
    }
}

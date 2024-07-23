<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wafat;
use App\Models\Prodi;
use App\Models\Tahun;
use App\Exports\WafatExport;
use App\Imports\WafatImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Import DB facade

class WafatController extends Controller
{
    public function index()
    {
        $wafat = Wafat::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();

        $totals = Wafat::select(DB::raw('ts_id,
            SUM(mhs_wafat_genap) as mhs_wafat_genap,
            SUM(mhs_wafat_ganjil) as mhs_wafat_ganjil'))
            ->groupBy('ts_id')
            ->get();

        $totals = $totals->map(function ($item) {
            $item->jumlahTotal = $item->mhs_wafat_genap + $item->mhs_wafat_ganjil;
            return $item;
        });

        $groupedWafat = $wafat->groupBy('ts_id');

        return view('admin.wafat.index', compact('wafat', 'prodi', 'tahun', 'totals', 'groupedWafat'));
    }

    public function create(Request $request)
    {
        if ($request->tahun_semester_id == null) {
            $prodi = Prodi::all();
        } else {
            $tahun_filter = Wafat::select('prodi_id')->where('ts_id', $request->tahun_semester_id)->get();
            $prodi = Prodi::whereNotIn('id', $tahun_filter)->get();
        }
        $tahun = Tahun::all();
        if ($request->tahun_semester_id == null) {
            return view('admin.wafat.create', compact('prodi', 'tahun'));
        } else {
            return response()->json($prodi);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'mhs_wafat_genap' => 'nullable',
            'mhs_wafat_ganjil' => 'nullable',
        ]);

        $wafat = new Wafat;
        $wafat->prodi_id = $request->prodi_id;
        $wafat->ts_id = $request->ts_id;
        $wafat->mhs_wafat_genap = $request->mhs_wafat_genap;
        $wafat->mhs_wafat_ganjil = $request->mhs_wafat_ganjil;
        $wafat->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.wafat.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.wafat.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function show ($id)
    {
        $wafat = Wafat::find($id);
        return view('admin.wafat.show', compact('wafat'));
    }

    public function edit($id)
    {
        $wafat = Wafat::find($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();

        return view('admin.wafat.edit', compact('wafat', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'mhs_wafat_genap' => 'nullable',
            'mhs_wafat_ganjil' => 'nullable',
        ]);

        $wafat = Wafat::find($id);
        $wafat->prodi_id = $request->prodi_id;
        $wafat->ts_id = $request->ts_id;
        $wafat->mhs_wafat_genap = $request->mhs_wafat_genap;
        $wafat->mhs_wafat_ganjil = $request->mhs_wafat_ganjil;
        $wafat->save();
        
        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.wafat.index')->with('success_update_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.wafat.index')->with('success_update_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $wafat = Wafat::find($id);
        $wafat->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.wafat.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.wafat.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    public function getChartDataWafat()
    {
        $data = Wafat::with('prodi')->get();

        $labels = $data->map(function($item) {
            return $item->prodi->prodi;
        });

        $mhs_wafat_genap = $data->pluck('mhs_wafat_genap');
        $mhs_wafat_ganjil = $data->pluck('mhs_wafat_ganjil');
        $total = $mhs_wafat_genap->zip($mhs_wafat_ganjil)->map(function($item) {
            return $item[0] + $item[1];
        });

        return response()->json([
            'labels' => $labels,
            'mhs_wafat_genap' => $mhs_wafat_genap,
            'mhs_wafat_ganjil' => $mhs_wafat_ganjil,
            'total' => $total,
        ]);
    }

    public function export()
    {
        return Excel::download(new WafatExport, 'wafat.xlsx');
    }

    public function downloadTemplate()
    {
        $file = public_path('assets/template/template_Wafat.xlsx');
        return response()->download($file);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new WafatImport, $file);

        return back()->with('success_import_data', 'Data Mhs Wafat berhasil diimport');
    }
}

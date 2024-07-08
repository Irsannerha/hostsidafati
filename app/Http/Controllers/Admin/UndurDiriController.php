<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UndurDiri;
use App\Models\Prodi;
use App\Models\Tahun;
use App\Exports\UndurDiriExport;
use App\Imports\UndurDiriImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UndurDiriController extends Controller
{
    public function index()
    {
        $undurdiri = UndurDiri::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();

        $totals = UndurDiri::select(DB::raw('ts_id,
            SUM(mhs_undur_diri_genap) as mhs_undur_diri_genap,
            SUM(mhs_undur_diri_ganjil) as mhs_undur_diri_ganjil'))
            ->groupBy('ts_id')
            ->get();

        $totals = $totals->map(function ($item) {
            $item->jumlahTotal = $item->mhs_undur_diri_genap + $item->mhs_undur_diri_ganjil;
            return $item;
        });

        $groupedUndurDiri = $undurdiri->groupBy('ts_id');

        return view('admin.undur-diri.index', compact('undurdiri', 'prodi', 'tahun', 'totals', 'groupedUndurDiri'));
    }

    public function create(Request $request)
    {
        if ($request->tahun_semester_id == null) {
            $prodi = Prodi::all();
        } else {
            $tahun_filter = UndurDiri::select('prodi_id')->where('ts_id', $request->tahun_semester_id)->get();
            $prodi = Prodi::whereNotIn('id', $tahun_filter)->get();
        }
        $tahun = Tahun::all();
        if ($request->tahun_semester_id == null) {
            return view('admin.undur-diri.create', compact('prodi', 'tahun'));
        } else {
            return response()->json($prodi);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'mhs_undur_diri_genap' => 'nullable',
            'mhs_undur_diri_ganjil' => 'nullable',
        ]);

        $undurdiri = new UndurDiri;
        $undurdiri->prodi_id = $request->prodi_id;
        $undurdiri->ts_id = $request->ts_id;
        $undurdiri->mhs_undur_diri_genap = $request->mhs_undur_diri_genap;
        $undurdiri->mhs_undur_diri_ganjil = $request->mhs_undur_diri_ganjil;
        $undurdiri->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.undur-diri.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.undur-diri.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $undurdiri = UndurDiri::findorFail($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.undur-diri.edit', compact('undurdiri', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'mhs_undur_diri_genap' => 'nullable',
            'mhs_undur_diri_ganjil' => 'nullable',
        ]);

        $undurdiri = UndurDiri::findorFail($id);
        $undurdiri->prodi_id = $request->prodi_id;
        $undurdiri->ts_id = $request->ts_id;
        $undurdiri->mhs_undur_diri_genap = $request->mhs_undur_diri_genap;
        $undurdiri->mhs_undur_diri_ganjil = $request->mhs_undur_diri_ganjil;
        $undurdiri->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.undur-diri.index')->with('success_update_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.undur-diri.index')->with('success_update_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $undurdiri = UndurDiri::findorFail($id);
        $undurdiri->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.undur-diri.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.undur-diri.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    public function getChartDataUndurdiri()
    {
        $data = UndurDiri::with('prodi')->get();

        $labels = $data->map(function ($item) {
            return $item->prodi->prodi;
        });

        $mhs_undur_diri_genap = $data->pluck('mhs_undur_diri_genap');
        $mhs_undur_diri_ganjil = $data->pluck('mhs_undur_diri_ganjil');
        $total = $mhs_undur_diri_genap->zip($mhs_undur_diri_ganjil)->map(function ($item) {
            return $item[0] + $item[1];
        });

        return response()->json([
            'labels' => $labels,
            'mhs_undur_diri_genap' => $mhs_undur_diri_genap,
            'mhs_undur_diri_ganjil' => $mhs_undur_diri_ganjil,
            'total' => $total,
        ]);
    }

    public function export()
    {
        return Excel::download(new UndurDiriExport, 'UndurDiri.xlsx');
    }

    public function downloadTemplate()
    {
        $template_path = public_path('assets/template/template_UndurDiri.xlsx');
        return response()->download($template_path);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new UndurDiriImport, $request->file('file'));

        return back()->with('success_import_data', 'Data Undur Diri berhasil diimport');
    }
}


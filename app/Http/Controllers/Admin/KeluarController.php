<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keluar;
use App\Models\Prodi;
use App\Models\Tahun;
use App\Exports\KeluarExport;
use App\Imports\KeluarImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class KeluarController extends Controller
{
    public function index()
    {
        $keluar = Keluar::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();

        $totals = Keluar::select(DB::raw('ts_id,
            SUM(mhs_keluar_genap) as mhs_keluar_genap,
            SUM(mhs_keluar_ganjil) as mhs_keluar_ganjil'))
            ->groupBy('ts_id')
            ->get();

        $totals = $totals->map(function ($item) {
            $item->jumlahTotal = $item->mhs_keluar_genap + $item->mhs_keluar_ganjil;
            return $item;
        });

        $groupedKeluar = $keluar->groupBy('ts_id');

        return view('admin.keluar.index', compact('keluar', 'prodi', 'tahun', 'totals', 'groupedKeluar'));
    }

    public function create(Request $request)
    {
        if ($request->tahun_semester_id == null) {
            $prodi = Prodi::all();
        } else {
            $tahun_filter = Keluar::select('prodi_id')->where('ts_id', $request->tahun_semester_id)->get();
            $prodi = Prodi::whereNotIn('id', $tahun_filter)->get();
        }
        $tahun = Tahun::all();
        if ($request->tahun_semester_id == null) {
            return view('admin.keluar.create', compact('prodi', 'tahun'));
        } else {
            return response()->json($prodi);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'mhs_keluar_genap' => 'nullable',
            'mhs_keluar_ganjil' => 'nullable',
        ]);

        $keluar = new Keluar;
        $keluar->prodi_id = $request->prodi_id;
        $keluar->ts_id = $request->ts_id;
        $keluar->mhs_keluar_genap = $request->mhs_keluar_genap;
        $keluar->mhs_keluar_ganjil = $request->mhs_keluar_ganjil;
        $keluar->save();

        if(Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.keluar.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.keluar.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function edit($id)
    {
        $keluar = Keluar::find($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.keluar.edit', compact('keluar', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'mhs_keluar_genap' => 'nullable',
            'mhs_keluar_ganjil' => 'nullable',
        ]);

        $keluar = Keluar::find($id);
        $keluar->prodi_id = $request->prodi_id;
        $keluar->ts_id = $request->ts_id;
        $keluar->mhs_keluar_genap = $request->mhs_keluar_genap;
        $keluar->mhs_keluar_ganjil = $request->mhs_keluar_ganjil;
        $keluar->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.keluar.index')->with('success_update_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.keluar.index')->with('success_update_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $keluar = Keluar::find($id);
        $keluar->delete();

        if(Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.keluar.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'akademik') {
            return redirect()->route('akademik.keluar.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    public function export()
    {
        return Excel::download(new KeluarExport, 'Mahasiswa Keluar.xlsx');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');

        Excel::import(new KeluarImport, $file);

        return back()->with('success_import_data', 'Data Mhs Keluar berhasil diimport');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wafat;
use App\Models\Prodi;
use App\Models\Tahun;
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

        return redirect()->route('superadmin.wafat.index')->with('success_create_data', 'Data berhasil ditambahkan');
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

        return redirect()->route('superadmin.wafat.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $wafat = Wafat::find($id);
        $wafat->delete();

        return redirect()->route('superadmin.wafat.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

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

        $total = Wafat::select(DB::raw('SUM(mhs_wafat_genap + mhs_wafat_ganjil) as total'))
            ->groupBy('tahun_id')
            ->get();
        return view('admin.wafat.index', compact('wafat', 'prodi', 'tahun', 'total'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.wafat.create', compact('prodi', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'mhs_wafat_genap' => 'required',
            'mhs_wafat_ganjil' => 'required',
        ]);
    
        $wafat = new Wafat();
        $wafat->prodi_id = $request->prodi_id;
        $wafat->tahun_id = $request->tahun_id;
        $wafat->mhs_wafat_genap = $request->mhs_wafat_genap;
        $wafat->mhs_wafat_ganjil = $request->mhs_wafat_ganjil;
        $wafat->save();

        return redirect()->route('superadmin.wafat.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $wafat = Wafat::find($id);
        $prodi = Prodi::all();
        return view('admin.wafat.show', compact('wafat', 'prodi'));
    }

    public function edit($id)
    {
        $wafat = Wafat::findOrFail($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.wafat.edit', compact('wafat', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'mhs_wafat_genap' => 'required',
            'mhs_wafat_ganjil' => 'required',
        ]);

        $wafat = Wafat::find($id);
        $wafat->prodi_id = $request->prodi_id;
        $wafat->tahun_id = $request->tahun_id;
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

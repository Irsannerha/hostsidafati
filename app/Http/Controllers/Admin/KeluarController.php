<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Keluar;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB;


class KeluarController extends Controller
{
    public function index()
    {
        $keluar = Keluar::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();

        $total = Keluar::select(DB::raw('SUM(mhs_keluar_genap + mhs_keluar_ganjil) as total'))
            ->groupBy('tahun_id')
            ->get();
        return view('admin.keluar.index', compact('keluar', 'prodi', 'tahun', 'total'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.keluar.create', compact('prodi', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'mhs_keluar_genap' => 'required',
            'mhs_keluar_ganjil' => 'required',
        ]);
    
        $keluar = new Keluar();
        $keluar->prodi_id = $request->prodi_id;
        $keluar->tahun_id = $request->tahun_id;
        $keluar->mhs_keluar_genap = $request->mhs_keluar_genap;
        $keluar->mhs_keluar_ganjil = $request->mhs_keluar_ganjil;
        $keluar->save();

        return redirect()->route('superadmin.keluar.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $keluar = Keluar::find($id);
        $prodi = Prodi::all();
        return view('admin.keluar.show', compact('keluar', 'prodi'));
    }

    public function edit($id)
    {
        $keluar = Keluar::findOrFail($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.keluar.edit', compact('keluar', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'mhs_keluar_genap' => 'required',
            'mhs_keluar_ganjil' => 'required',
        ]);

        $keluar = Keluar::find($id);
        $keluar->prodi_id = $request->prodi_id;
        $keluar->tahun_id = $request->tahun_id;
        $keluar->mhs_keluar_genap = $request->mhs_keluar_genap;
        $keluar->mhs_keluar_ganjil = $request->mhs_keluar_ganjil;
        $keluar->save();

        return redirect()->route('superadmin.keluar.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $keluar = Keluar::find($id);
        $keluar->delete();
        return redirect()->route('superadmin.keluar.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

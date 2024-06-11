<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UndurDiri;
use App\Models\Prodi;
use App\Models\Tahun;
use App\Models\Lulus;
use Illuminate\Support\Facades\DB;

class UndurDiriController extends Controller
{
    public function index ()
    {
        $undurdiri = UndurDiri::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        
        $total = UndurDiri::select(DB::raw('SUM(mhs_undur_diri_genap + mhs_undur_diri_ganjil) as total'))
            ->groupBy('tahun_id')
            ->get();
        return view('admin.undur-diri.index', compact('undurdiri', 'prodi', 'tahun', 'total'));
    }

    public function create(Request $request)
    {
        if ($request->tahun_semester_id == null) {
            $prodi = Prodi::all();
        }
        else {
            $tahun_filter = Lulus::select('prodi_id')->where('tahun_id', $request->tahun_semester_id)->get();
            $prodi = Prodi::whereNotIn('id', $tahun_filter)->get();
        }
        $tahun = Tahun::all();
        $lulus = Lulus::all();
        if ($request->tahun_semester_id == null) {
            return view('admin.undur-diri.create', compact('prodi', 'tahun', 'lulus'));
        } else {
            return response()->json($prodi);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'mhs_undur_diri_genap' => 'required',
            'mhs_undur_diri_ganjil' => 'required',
        ]);
    
        $undurdiri = new UndurDiri();
        $undurdiri->prodi_id = $request->prodi_id;
        $undurdiri->tahun_id = $request->tahun_id;
        $undurdiri->mhs_undur_diri_genap = $request->mhs_undur_diri_genap;
        $undurdiri->mhs_undur_diri_ganjil = $request->mhs_undur_diri_ganjil;
        $undurdiri->save();

        return redirect()->route('superadmin.undur-diri.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $undurdiri = UndurDiri::find($id);
        $prodi = Prodi::all();
        return view('admin.undur-diri.show', compact('undurdiri', 'prodi'));
    }

    public function edit($id)
    {
        $undurdiri = UndurDiri::findOrFail($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.undur-diri.edit', compact('undurdiri', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'mhs_undur_diri_genap' => 'required',
            'mhs_undur_diri_ganjil' => 'required',
        ]);

        $undurdiri = UndurDiri::find($id);
        $undurdiri->prodi_id = $request->prodi_id;
        $undurdiri->tahun_id = $request->tahun_id;
        $undurdiri->mhs_undur_diri_genap = $request->mhs_undur_diri_genap;
        $undurdiri->mhs_undur_diri_ganjil = $request->mhs_undur_diri_ganjil;
        $undurdiri->save();

        return redirect()->route('superadmin.undur-diri.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $undurdiri = UndurDiri::find($id);
        $undurdiri->delete();
        return redirect()->route('superadmin.undur-diri.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}
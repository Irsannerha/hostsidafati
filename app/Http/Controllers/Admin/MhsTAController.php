<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MhsTA;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB;

class MhsTAController extends Controller
{
    public function index ()
    {
        $mhsta = MhsTA::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        
        $total = MhsTA::select(DB::raw('SUM(mhs_ta) as total'))
            ->groupBy('tahun_id')
            ->get();
        return view('admin.mhs-ta.index', compact('mhsta', 'prodi', 'tahun', 'total'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.mhs-ta.create', compact('prodi', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'mhs_ta' => 'nullable',
        ]);
    
        $mhsta = new MhsTA();
        $mhsta->prodi_id = $request->prodi_id;
        $mhsta->tahun_id = $request->tahun_id;
        $mhsta->mhs_ta = $request->mhs_ta;
        $mhsta->save();

        return redirect()->route('superadmin.mhs-ta.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $mhsta = MhsTA::find($id);
        $prodi = Prodi::all();
        return view('admin.mhs-ta.show', compact('mhsta', 'prodi'));
    }

    public function edit($id)
    {
        $mhsta = MhsTA::find($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.mhs-ta.edit', compact('mhsta', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'mhs_ta' => 'nullable',
        ]);

        $mhsta = MhsTA::find($id);
        $mhsta->prodi_id = $request->prodi_id;
        $mhsta->tahun_id = $request->tahun_id;
        $mhsta->mhs_ta = $request->mhs_ta;
        $mhsta->save();

        return redirect()->route('superadmin.mhs-ta.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $mhsta = MhsTA::find($id);
        $mhsta->delete();

        return redirect()->route('superadmin.mhs-ta.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

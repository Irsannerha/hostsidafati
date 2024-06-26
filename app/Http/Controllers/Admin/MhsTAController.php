<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MhsTA;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MhsTAController extends Controller
{
    public function index ()
    {
        $mhsta = MhsTA::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        
        $total = MhsTA::select(DB::raw('SUM(mhs_ta) as total'))
            ->groupBy('ts_id')
            ->get();
        return view('admin.mhs-ta.index', compact('mhsta', 'prodi', 'tahun', 'total'));
    }

    public function create(Request $request)
    {
        if ($request->tahun_semester_id == null) {
            $prodi = Prodi::all();
        }
        else {
            $tahun_filter = MhsTA::select('prodi_id')->where('ts_id', $request->tahun_semester_id)->get();
            $prodi = Prodi::whereNotIn('id', $tahun_filter)->get();
        }
        $tahun = Tahun::all(); if ($request->tahun_semester_id == null) {
            return view('admin.mhs-ta.create', compact('prodi', 'tahun'));
        } else {
            return response()->json($prodi);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'mhs_ta' => 'nullable',
        ]);
    
        $mhsta = new MhsTA();
        $mhsta->prodi_id = $request->prodi_id;
        $mhsta->ts_id = $request->ts_id;
        $mhsta->mhs_ta = $request->mhs_ta;
        $mhsta->save();

        if(Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.mhs-ta.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'Akademik'){
            return redirect()->route('akademik.mhs-ta.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
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
            'ts_id' => 'required',
            'mhs_ta' => 'nullable',
        ]);

        $mhsta = MhsTA::find($id);
        $mhsta->prodi_id = $request->prodi_id;
        $mhsta->ts_id = $request->ts_id;
        $mhsta->mhs_ta = $request->mhs_ta;
        $mhsta->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.mhs-ta.index')->with('success_update_data', 'Data berhasil diubah');
         }else if  (Auth::user()->role == 'Akademik') {
            return redirect()->route('akademik.mhs-ta.index')->with('success_update_data', 'Data berhasil diubah');
         }
    }

    public function destroy($id)
    {
        $mhsta = MhsTA::find($id);
        $mhsta->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.mhs-ta.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'Akademik') {
            return redirect()->route('akademik.mhs-ta.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lulus;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB;

class LulusController extends Controller
{
    public function index()
    {
        $lulus = Lulus::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();

        $total = Lulus::select(DB::raw('SUM(september + november + maret + mei + juli) as total'))
            ->groupBy('tahun_id')
            ->get();
        return view('admin.lulus.index', compact('lulus', 'prodi', 'tahun', 'total'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.lulus.create', compact('prodi', 'tahun'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'september' => 'nullable',
            'november' => 'nullable',
            'maret' => 'nullable',
            'mei' => 'nullable',
            'juli' => 'nullable',
        ]);

        $lulus = new Lulus();
        $lulus->prodi_id = $request->prodi_id;
        $lulus->tahun_id = $request->tahun_id;
        $lulus->september = $request->september;
        $lulus->november = $request->november;
        $lulus->maret = $request->maret;
        $lulus->mei = $request->mei;
        $lulus->juli = $request->juli;
        $lulus->save();

        return redirect()->route('superadmin.lulus.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }
    

    public function show($id)
    {
        $lulus = Lulus::find($id);
        $prodi = Prodi::all();
        return view('admin.lulus.show', compact('lulus', 'prodi'));
    }

    public function edit($id)
    {
        $lulus = Lulus::findOrFail($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.lulus.edit', compact('lulus', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_id' => 'required',
            'september' => 'nullable',
            'november' => 'nullable',
            'maret' => 'nullable',
            'mei' => 'nullable',
            'juli' => 'nullable',
        ]);

        $lulus = Lulus::findOrFail($id);
        $lulus->prodi_id = $request->prodi_id;
        $lulus->tahun_id = $request->tahun_id;
        $lulus->september = $request->september;
        $lulus->november = $request->november;
        $lulus->maret = $request->maret;
        $lulus->mei = $request->mei;
        $lulus->juli = $request->juli;
        $lulus->save();

        return redirect()->route('superadmin.lulus.index')->with('success_update_data', 'Data berhasil diubah');
    }


    public function destroy($id)
    {
        $lulus = Lulus::findOrFail($id);
        $lulus->delete();
        return redirect()->route('superadmin.lulus.index')->with('success_delete_data', 'Data berhasil dihapus');
    }

}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aknalu;
use App\Models\Prodi;

class AknaluController extends Controller
{
    public function index()
    {
        $aknalu = Aknalu::all();
        $aknalus = Aknalu::all();
        $prodi = Prodi::all();
        return view('admin.aknalu.index', compact('aknalu', 'aknalus', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.aknalu.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun' => 'required',
            'jumlah' => 'required',
        ]);

        $aknalu = new Aknalu;
        $aknalu->prodi_id = $request->prodi_id;
        $aknalu->tahun = $request->tahun;
        $aknalu->jumlah = $request->jumlah;
        $aknalu->save();

        return redirect()->route('superadmin.aknalu.index')->with('success_create_data', 'Aknalu created successfully');
    }

    public function show($id)
    {
        $aknalu = Aknalu::find($id);
        return view('admin.aknalu.show', compact('aknalu', 'aknalus'));
    }

    public function edit($id)
    {
        $aknalu = Aknalu::find($id);
        $prodi = Prodi::all();
        return view('admin.aknalu.edit', compact('aknalu', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun' => 'required',
            'jumlah' => 'required',
        ]);

        $aknalu = Aknalu::find($id);
        $aknalu->prodi_id = $request->prodi_id;
        $aknalu->tahun = $request->tahun;
        $aknalu->jumlah = $request->jumlah;
        $aknalu->save();

        return redirect()->route('superadmin.aknalu.index')->with('success_edit_data', 'Aknalu updated successfully');
    }

    public function destroy($id)
    {
        $aknalu = Aknalu::find($id);
        $aknalu->delete();
        return redirect()->route('superadmin.aknalu.index')->with('success_delete_data', 'Aknalu deleted successfully');
    }
}
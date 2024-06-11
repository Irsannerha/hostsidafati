<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;

class JumlahDosenController extends Controller
{
    public function index()
    {

        $prodis = Prodi::all();
        return view('admin.jumlah_dosen.index', compact('prodis'));
    }

    public function show($id)
    {
        $prodi = Prodi::find($id);
        return view('admin.jumlah_dosen.show', compact('prodi'));
    }

    public function edit(Request $request, $id)
    {
        $prodi = Prodi::find($id);
        return view('admin.jumlah_dosen.edit', compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $prodi = Prodi::findOrFail($id);
        $request->validate([
            'jumlah_dosen' => 'required'
        ]);

        $prodi->update([
            'jumlah_dosen' => $request->jumlah_dosen,
        ]);

        // dd($prodi->jumlah_dosen);

        return redirect()->route('superadmin.jumlah_dosen.index')->with('success_edit_data', 'Data berhasil diubah');
    }

}

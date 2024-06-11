<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Resign;
use App\Models\Prodi;

class ResignController extends Controller
{
    public function index() 
    {
        $resign = Resign::all();
        return view('admin.resign.index', compact('resign'));
    }

    public function create()
    {
        $prodis = Prodi::all();
        return view('admin.resign.create', compact('prodis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nrk' => 'required',
            'nidn' => 'required',
            'jenis_kelamin' => 'required',
            'tmt_masuk' => 'required',
            'tmt_keluar' => 'required',
            'alasan' => 'required',
            'surat_keterangan' => 'required',
        ]);

        $resign = new Resign;
        $resign->prodi_id = $request->prodi_id;
        $resign->nama = $request->nama;
        $resign->nrk = $request->nrk;
        $resign->nidn = $request->nidn;
        $resign->jenis_kelamin = $request->jenis_kelamin;
        $resign->tmt_masuk = $request->tmt_masuk;
        $resign->tmt_keluar = $request->tmt_keluar;
        $resign->alasan = $request->alasan;
        $resign->surat_keterangan = $request->surat_keterangan;
        $resign->save();

        return redirect()->route('superadmin.resign.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $resign = Resign::find($id);
        return view('admin.resign.show', compact('resign'));
    }

    public function edit(Request $request, $id)
    {
        $resign = Resign::find($id);
        $prodis = Prodi::all();
        return view('admin.resign.edit', compact('resign', 'prodis'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nrk' => 'required',
            'nidn' => 'required',
            'jenis_kelamin' => 'required',
            'tmt_masuk' => 'required',
            'tmt_keluar' => 'required',
            'alasan' => 'required',
            'surat_keterangan' => 'required',
        ]);

        $resign = Resign::find($id);
        $resign->prodi_id = $request->prodi_id;
        $resign->nama = $request->nama;
        $resign->nrk = $request->nrk;
        $resign->nidn = $request->nidn;
        $resign->jenis_kelamin = $request->jenis_kelamin;
        $resign->tmt_masuk = $request->tmt_masuk;
        $resign->tmt_keluar = $request->tmt_keluar;
        $resign->alasan = $request->alasan;
        $resign->surat_keterangan = $request->surat_keterangan;
        $resign->save();
        // dd($resign);

        return redirect()->route('superadmin.resign.index')->with('success_edit_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $resign = Resign::find($id);
        $resign->delete();
        return redirect()->route('superadmin.resign.index')->with('success_delete_data', 'Data berhasil dihapus.');
    }
}

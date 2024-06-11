<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Doslubi;
use App\Models\Prodi;

class DoslubiController extends Controller
{
    public function index()
    {
        $doslubi = Doslubi::all();
        return view('admin.doslubi.index', compact('doslubi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.doslubi.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nup_nidk' => 'required',
            'jurusan' => 'required',
            'status' => 'required',
            'tgl_lahir' => 'required',
            'jabatan_terakhir' => 'required',
        ]);

        $doslubi = new Doslubi;
        $doslubi->prodi_id = $request->prodi_id;
        $doslubi->nama = $request->nama;
        $doslubi->nup_nidk = $request->nup_nidk;
        $doslubi->jurusan = $request->jurusan;
        $doslubi->status = $request->status;
        $doslubi->tgl_lahir = $request->tgl_lahir;
        $doslubi->jabatan_terakhir = $request->jabatan_terakhir;
        $doslubi->save();

        return redirect()->route('superadmin.doslubi.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function show ($id)
    {
        $doslubi = Doslubi::find($id);
        return view('admin.doslubi.show', compact('doslubi'));
    }

    public function edit($id)
    {
        $doslubi = Doslubi::find($id);
        $prodi = Prodi::all();
        return view('admin.doslubi.edit', compact('doslubi', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nup_nidk' => 'required',
            'jurusan' => 'required',
            'status' => 'required',
            'tgl_lahir' => 'required',
            'jabatan_terakhir' => 'required',
        ]);

        $doslubi = Doslubi::find($id);
        $doslubi->prodi_id = $request->prodi_id;
        $doslubi->nama = $request->nama;
        $doslubi->nup_nidk = $request->nup_nidk;
        $doslubi->jurusan = $request->jurusan;
        $doslubi->status = $request->status;
        $doslubi->tgl_lahir = $request->tgl_lahir;
        $doslubi->jabatan_terakhir = $request->jabatan_terakhir;
        $doslubi->save();

        return redirect()->route('superadmin.doslubi.index')->with('success_edit_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $doslubi = Doslubi::find($id);
        $doslubi->delete();

        return redirect()->route('superadmin.doslubi.index')->with('success_delete_data', 'Data berhasil dihapus');
    }

}

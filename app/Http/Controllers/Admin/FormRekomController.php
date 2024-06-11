<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormRekom;
use App\Models\Prodi;

class FormRekomController extends Controller
{
    public function index()
    {
        $formrekom = FormRekom::all();
        $prodi = Prodi::all();
        return view('admin.form-rekom.index', compact('formrekom', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.form-rekom.create', compact('prodi'));
    }

    public function show($id)
    {
        $formrekom = FormRekom::find($id);
        return view('admin.form-rekom.show', compact('formrekom'));
    }

    public function edit($id)
    {
        $formrekom = FormRekom::find($id);
        $prodi = Prodi::all();
        return view('admin.form-rekom.edit', compact('formrekom', 'prodi'));
    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'no_hp_mhs' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'jerekom' => 'required',
            'deskripsi' => 'nullable',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $formrekom = FormRekom::find($id);
        $formrekom->prodi_id = $request->prodi_id;
        $formrekom->nama = $request->nama;
        $formrekom->nim = $request->nim;
        $formrekom->no_hp_mhs = $request->no_hp_mhs;
        $formrekom->instansi = $request->instansi;
        $formrekom->alamat_instansi = $request->alamat_instansi;
        $formrekom->jerekom = $request->jerekom;
        $formrekom->deskripsi = $request->deskripsi;
        $formrekom->status = $request->status;
        $formrekom->keterangan = $request->keterangan;
        $formrekom->save();

        return redirect()->route('superadmin.form-rekom.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $formrekom = FormRekom::find($id);
        $formrekom->delete();
        return redirect()->route('superadmin.form-rekom.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

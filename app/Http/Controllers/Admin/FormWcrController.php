<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormWcr;
use App\Models\Prodi;

class FormWcrController extends Controller
{
    public function index()
    {
        $formwcr = FormWcr::all();
        $prodi = Prodi::all();
        return view('admin.form-wcr.index', compact('formwcr', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.form-wcr.create', compact('prodi'));
    }

    public function show($id)
    {
        $formwcr = FormWcr::find($id);
        return view('admin.form-wcr.show', compact('formwcr'));
    }

    public function edit($id)
    {
        $formwcr = FormWcr::find($id);
        $prodi = Prodi::all();
        return view('admin.form-wcr.edit', compact('formwcr', 'prodi'));
    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $formwcr = FormWcr::find($id);
        $formwcr->prodi_id = $request->prodi_id;
        $formwcr->nama = $request->nama;
        $formwcr->nim = $request->nim;
        $formwcr->instansi = $request->instansi;
        $formwcr->alamat_instansi = $request->alamat_instansi;
        $formwcr->status = $request->status;
        $formwcr->keterangan = $request->keterangan;
        $formwcr->save();

        return redirect()->route('superadmin.form-wcr.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $formwcr = FormWcr::find($id);
        $formwcr->delete();
        return redirect()->route('superadmin.form-wcr.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormKHS;
use App\Models\Prodi;
use App\Exports\FormkhsExport;
use Maatwebsite\Excel\Facades\Excel;

class FormKHSController extends Controller
{
    public function index()
    {
        $formkhs = FormKHS::all();
        $prodi = Prodi::all();
        return view('admin.form-khs.index', compact('formkhs', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.form-khs.create', compact('prodi'));
    }

    public function show($id)
    {
        $formkhs = FormKHS::find($id);
        return view('admin.form-khs.show', compact('formkhs'));
    }

    public function edit($id)
    {
        $formkhs = FormKHS::find($id);
        $prodi = Prodi::all();
        return view('admin.form-khs.edit', compact('formkhs', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'no_hp_mhs' => 'required',
            'email' => 'required',
            'keperluan' => 'required',
            'jumlah' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $formkhs = FormKHS::find($id);
        $formkhs->prodi_id = $request->prodi_id;
        $formkhs->nama = $request->nama;
        $formkhs->nim = $request->nim;
        $formkhs->no_hp_mhs = $request->no_hp_mhs;
        $formkhs->email = $request->email;
        $formkhs->keperluan = $request->keperluan;
        $formkhs->jumlah = $request->jumlah;
        $formkhs->status = $request->status;
        $formkhs->keterangan = $request->keterangan;
        $formkhs->save();

        return redirect()->route('superadmin.form-khs.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $formkhs = FormKHS::find($id);
        $formkhs->delete();

        return redirect()->route('superadmin.form-khs.index')->with('success_delete_data', 'Data berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new FormkhsExport, 'formkhs.xlsx');
    }
}

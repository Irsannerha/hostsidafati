<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormLegal;
use App\Models\Prodi;
use App\Exports\FormlegalExport;
use Maatwebsite\Excel\Facades\Excel;

class FormLegalController extends Controller
{
    public function index()
    {
        $formlegal = FormLegal::all();
        $prodi = Prodi::all();
        return view('admin.form-legal.index', compact('formlegal', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.form-legal.create', compact('prodi'));
    }

    public function show($id)
    {
        $formlegal = FormLegal::find($id);
        return view('admin.form-legal.show', compact('formlegal'));
    }

    public function edit($id)
    {
        $formlegal = FormLegal::find($id);
        $prodi = Prodi::all();
        return view('admin.form-legal.edit', compact('formlegal', 'prodi'));
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
            'jumlah_legal' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $formlegal = FormLegal::find($id);
        $formlegal->prodi_id = $request->prodi_id;
        $formlegal->nama = $request->nama;
        $formlegal->nim = $request->nim;
        $formlegal->no_hp_mhs = $request->no_hp_mhs;
        $formlegal->email = $request->email;
        $formlegal->keperluan = $request->keperluan;
        $formlegal->jumlah_legal = $request->jumlah_legal;
        $formlegal->status = $request->status;
        $formlegal->keterangan = $request->keterangan;
        $formlegal->save();

        return redirect()->route('superadmin.form-legal.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $formlegal = FormLegal::find($id);
        $formlegal->delete();
        return redirect()->route('superadmin.form-legal.index')->with('success_delete_data', 'Data berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new FormlegalExport, 'formlegal.xlsx'); 
    }   
}

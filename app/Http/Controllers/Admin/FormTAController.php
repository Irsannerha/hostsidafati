<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormTA;
use App\Models\Prodi;
use App\Exports\FormtaExport;   
use Maatwebsite\Excel\Facades\Excel;

class FormTAController extends Controller
{
    public function index()
    {
        $formta = FormTA::all();
        $prodi = Prodi::all();
        return view('admin.form-ta.index', compact('formta', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.form-ta.create', compact('prodi'));
    }

    public function show($id)
    {
        $formta = FormTA::find($id);
        return view('admin.form-ta.show', compact('formta'));
    }

    public function edit($id)
    {
        $formta = FormTA::find($id);
        $prodi = Prodi::all();
        return view('admin.form-ta.edit', compact('formta', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'keperluan' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'tjp' => 'nullable',
            'pelaksanaan' => 'required',
            'waktu_mulai_pelaksanaan' => 'required',
            'waktu_akhir_pelaksanaan' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
            'nama_pembimbing_satu' => 'required',
            'nama_pembimbing_dua' => 'required',
            'judul' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $formta = FormTA::find($id);
        $formta->prodi_id = $request->prodi_id;
        $formta->nama = $request->nama;
        $formta->nim = $request->nim;
        $formta->keperluan = $request->keperluan;
        $formta->instansi = $request->instansi;
        $formta->alamat_instansi = $request->alamat_instansi;
        $formta->tjp = $request->tjp;
        $formta->pelaksanaan = $request->pelaksanaan;
        $formta->waktu_mulai_pelaksanaan = $request->waktu_mulai_pelaksanaan;
        $formta->waktu_akhir_pelaksanaan = $request->waktu_akhir_pelaksanaan;
        $formta->no_hp = $request->no_hp;
        $formta->email = $request->email;
        $formta->nama_pembimbing_satu = $request->nama_pembimbing_satu;
        $formta->nama_pembimbing_dua = $request->nama_pembimbing_dua;
        $formta->judul = $request->judul;
        $formta->status = $request->status;
        $formta->keterangan = $request->keterangan;

        $formta->save();
        return redirect()->route('superadmin.form-ta.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $formta = FormTA::find($id);
        $formta->delete();
        return redirect()->route('superadmin.form-ta.index')->with('success_delete_data', 'Data berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new FormtaExport, 'formta.xlsx');
    }
}

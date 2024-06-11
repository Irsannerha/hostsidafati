<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormSTM;
use App\Models\Prodi;

class FormSTMController extends Controller
{
    public function index()
    {
        $formstm = FormSTM::all();
        $prodi = Prodi::all();
        return view('admin.form-stm.index', compact('formstm', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.form-stm.create', compact('prodi'));
    }

    public function show($id)
    {
        $formstm = FormSTM::find($id);
        return view('admin.form-stm.show', compact('formstm'));
    }

    public function edit($id)
    {
        $formstm = FormSTM::find($id);
        $prodi = Prodi::all();
        return view('admin.form-stm.edit', compact('formstm', 'prodi'));
    }
    
    public function update (Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'instansi' => 'required',
            'tgl_bls' => 'required',
            'tgl_mulai_pelaksanaan' => 'required',
            'tgl_akhir_pelaksanaan' => 'required',
            'jenis_surat_tugas' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $formstm = FormSTM::find($id);
        $formstm->prodi_id = $request->prodi_id;
        $formstm->nama = $request->nama;
        $formstm->nim = $request->nim;
        $formstm->instansi = $request->instansi;
        $formstm->tgl_bls = $request->tgl_bls;
        $formstm->tgl_mulai_pelaksanaan = $request->tgl_mulai_pelaksanaan;
        $formstm->tgl_akhir_pelaksanaan = $request->tgl_akhir_pelaksanaan;
        $formstm->jenis_surat_tugas = $request->jenis_surat_tugas;
        $formstm->status = $request->status;
        $formstm->keterangan = $request->keterangan;
        $formstm->save();

        return redirect()->route('superadmin.form-stm.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $formstm = FormSTM::find($id);
        $formstm->delete();
        return redirect()->route('superadmin.form-stm.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormKP;
use App\Models\Prodi;
use App\Exports\FormkpExport;
use Maatwebsite\Excel\Facades\Excel;

class FormKPController extends Controller
{
    public function index()
    {
        $formkp = FormKP::all();
        $prodi = Prodi::all();
        return view('mahasiswa.form-kp.index', compact('formkp', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('mahasiswa.form-kp.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'tjp' => 'nullable',
            'waktu_mulai_pelaksanaan' => 'required',
            'waktu_akhir_pelaksanaan' => 'required',
            'no_hp_mhs' => 'required',
            'email' => 'required',
        ]);

        $formkp = new FormKP;
        $formkp->prodi_id = $request->prodi_id;
        $formkp->nama = $request->nama;
        $formkp->nim = $request->nim;
        $formkp->instansi = $request->instansi;
        $formkp->alamat_instansi = $request->alamat_instansi;
        $formkp->tjp = $request->tjp;
        $formkp->waktu_mulai_pelaksanaan = $request->waktu_mulai_pelaksanaan;
        $formkp->waktu_akhir_pelaksanaan = $request->waktu_akhir_pelaksanaan;
        $formkp->no_hp_mhs = $request->no_hp_mhs;
        $formkp->email = $request->email;
        $formkp->save();

        return back()->with('success_create_data', 'Selamat! Data Pengajuan Kerja Praktekmu Berhasil');
    }

    public function show($id)
    {
        $formkp = FormKP::find($id);
        return view('admin.form-kp.show', compact('formkp'));
    }

    public function edit($id)
    {
        $formkp = FormKP::find($id);
        $prodi = Prodi::all();
        return view('admin.form-kp.edit', compact('formkp', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'tjp' => 'nullable',
            'waktu_mulai_pelaksanaan' => 'required',
            'waktu_akhir_pelaksanaan' => 'required',
            'no_hp_mhs' => 'required',
            'email' => 'required',
            'status' => 'required',
            'keterangan' => 'nullable',
        ]);

        $formkp = FormKP::find($id);
        $formkp->prodi_id = $request->prodi_id;
        $formkp->nama = $request->nama;
        $formkp->nim = $request->nim;
        $formkp->instansi = $request->instansi;
        $formkp->alamat_instansi = $request->alamat_instansi;
        $formkp->tjp = $request->tjp;
        $formkp->waktu_mulai_pelaksanaan = $request->waktu_mulai_pelaksanaan;
        $formkp->waktu_akhir_pelaksanaan = $request->waktu_akhir_pelaksanaan;
        $formkp->no_hp_mhs = $request->no_hp_mhs;
        $formkp->email = $request->email;
        $formkp->status = $request->status;
        $formkp->keterangan = $request->keterangan;
        $formkp->save();

        return redirect()->route('superadmin.form-kp.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $formkp = FormKP::find($id);
        $formkp->delete();
        return redirect()->route('superadmin.form-kp.index')->with('success_delete_data', 'Data berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new FormkpExport, 'formkp.xlsx');
    }
}

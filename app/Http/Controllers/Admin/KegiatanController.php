<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Prodi;
use App\Exports\KegiatanExport;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class KegiatanController extends Controller
{
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.kegiatan.create', compact('prodi'));
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('admin.kegiatan.show', compact('kegiatan'));
    }

    public function edit($id)
    {
        $kegiatan = Kegiatan::find($id);
        $prodi = Prodi::all();
        return view('admin.kegiatan.edit', compact('kegiatan', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'email' => 'required',
            'nama_kegiatan' => 'required',
            'tgl_kegiatan' => 'required',
            'mulai_kegiatan' => 'required',
            'akhir_kegiatan' => 'required',
            'tempat_pelaksanaan' => 'required',
            'jumlah_peserta' => 'required',
            'penanggung_jawab' => 'required',
            'nama_pemohon' => 'required',
            'no_hp' => 'required',
            'status' => 'required',
            'keterangan' => 'required',
            'surat_izin' => 'mimes:pdf|max:2048',
        ]);

        $kegiatan = Kegiatan::find($id);
        $kegiatan->prodi_id = $request->prodi_id;
        $kegiatan->email = $request->email;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tgl_kegiatan = $request->tgl_kegiatan;
        $kegiatan->mulai_kegiatan = $request->mulai_kegiatan;
        $kegiatan->akhir_kegiatan = $request->akhir_kegiatan;
        $kegiatan->tempat_pelaksanaan = $request->tempat_pelaksanaan;
        $kegiatan->jumlah_peserta = $request->jumlah_peserta;
        $kegiatan->penanggung_jawab = $request->penanggung_jawab;
        $kegiatan->nama_pemohon = $request->nama_pemohon;
        $kegiatan->no_hp = $request->no_hp;
        $kegiatan->status = $request->status;
        $kegiatan->keterangan = $request->keterangan;
        $kegiatan->surat_izin = $request->surat_izin;
        if ($request->hasFile('surat_izin')) {
            $surat_izin = $request->file('surat_izin');
            $file_name = date('d-m-Y', strtotime('+7 hours')) . '_Surat_Izin' . $kegiatan->nama_kegiatan . '.' . $surat_izin->getClientOriginalExtension();
            $kegiatan->surat_izin = $file_name;
            $kegiatan->update();
            $surat_izin->move('../public/assets/surat_izin/', $file_name);
        }
        $kegiatan->save();
        // dd($kegiatan);

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.kegiatan.index')->with('success_edit_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'kemahasiswaan') {
            return redirect()->route('kemahasiswaan.kegiatan.index')->with('success_edit_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $kegiatan = Kegiatan::find($id);
        $kegiatan->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.kegiatan.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'kemahasiswaan') {
            return redirect()->route('kemahasiswaan.kegiatan.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    public function export()
    {
        return Excel::download(new KegiatanExport, 'kegiatan.xlsx');
    }
}

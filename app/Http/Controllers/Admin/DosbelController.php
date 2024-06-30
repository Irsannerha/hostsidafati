<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosbel;
use App\Models\Prodi;
use App\Exports\DosbelExport;
use App\Imports\DosbelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;


class DosbelController extends Controller
{
   public function index()
   {
       $dosbel = Dosbel::all();
       return view('admin.dosbel.index', compact('dosbel'));
   }

    public function create()
    {
         $prodi = Prodi::all();
         return view('admin.dosbel.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nip_nrk' => 'required',
            'status' => 'required',
            'tempat_studi' => 'required',
            'jenis_beasiswa' => 'required',
            'mulai_tubel' => 'required',
            'selesai_tubel' => 'required',
            'sk_tubel' => 'required',
            'perpanjangan_tubel' => 'required',
            'mulai_perpanjangan' => 'required',
            'selesai_perpanjangan' => 'required',
            'keterangan' => 'required',
        ]);

        $dosbel = new Dosbel;
        $dosbel->prodi_id = $request->prodi_id;
        $dosbel->nama = $request->nama;
        $dosbel->nip_nrk = $request->nip_nrk;
        $dosbel->status = $request->status;
        $dosbel->tempat_studi = $request->tempat_studi;
        $dosbel->jenis_beasiswa = $request->jenis_beasiswa;
        $dosbel->mulai_tubel = $request->mulai_tubel;
        $dosbel->selesai_tubel = $request->selesai_tubel;
        $dosbel->sk_tubel = $request->sk_tubel;
        $dosbel->perpanjangan_tubel = $request->perpanjangan_tubel;
        $dosbel->mulai_perpanjangan = $request->mulai_perpanjangan;
        $dosbel->selesai_perpanjangan = $request->selesai_perpanjangan;
        $dosbel->keterangan = $request->keterangan;
        $dosbel->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.dosbel.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.dosbel.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function show ($id)
    {
        $dosbel = Dosbel::find($id);
        return view('admin.dosbel.show', compact('dosbel'));
    }

    public function edit(Request $request, $id)
    {
        $dosbel = Dosbel::find($id);
        $prodi = Prodi::all();
        return view('admin.dosbel.edit', compact('dosbel', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nip_nrk' => 'required',
            'status' => 'required',
            'tempat_studi' => 'required',
            'jenis_beasiswa' => 'required',
            'mulai_tubel' => 'required',
            'selesai_tubel' => 'required',
            'sk_tubel' => 'required',
            'perpanjangan_tubel' => 'required',
            'mulai_perpanjangan' => 'required',
            'selesai_perpanjangan' => 'required',
            'keterangan' => 'required',
        ]);

        $dosbel = Dosbel::find($id);
        $dosbel->prodi_id = $request->prodi_id;
        $dosbel->nama = $request->nama;
        $dosbel->nip_nrk = $request->nip_nrk;
        $dosbel->status = $request->status;
        $dosbel->tempat_studi = $request->tempat_studi;
        $dosbel->jenis_beasiswa = $request->jenis_beasiswa;
        $dosbel->mulai_tubel = $request->mulai_tubel;
        $dosbel->selesai_tubel = $request->selesai_tubel;
        $dosbel->sk_tubel = $request->sk_tubel;
        $dosbel->perpanjangan_tubel = $request->perpanjangan_tubel;
        $dosbel->mulai_perpanjangan = $request->mulai_perpanjangan;
        $dosbel->selesai_perpanjangan = $request->selesai_perpanjangan;
        $dosbel->keterangan = $request->keterangan;
        $dosbel->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.dosbel.index')->with('success_edit_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.dosbel.index')->with('success_edit_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $dosbel = Dosbel::find($id);
        $dosbel->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.dosbel.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.dosbel.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    public function export()
    {
        return Excel::download(new DosbelExport, 'dosbel.xlsx');
    }

    public function downloadTemplate()
    {
        $file = public_path('assets/templateImport/template_dosbel.xlsx');
        return response()->download($file);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file');
        // dd($file);

        Excel::import(new DosbelImport, $file);

        return back()->with('success_import_data', 'Data Dosbel berhasil diimport.');
    }

}

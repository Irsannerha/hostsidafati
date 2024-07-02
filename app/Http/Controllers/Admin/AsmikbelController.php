<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asmikbel;
use App\Models\Prodi;
use App\Exports\AsmikbelExport;
use App\Imports\AsmikbelImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class AsmikbelController extends Controller
{
    public function index()
    {
        $asmikbel = Asmikbel::all();
        return view('admin.asmikbel.index', compact('asmikbel'));
    }

    public function create()
    {
         $prodi = Prodi::all();
         return view('admin.asmikbel.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nip_nrk' => 'required',
            'status' => 'required',
            'studi_lanjut' => 'required',
            'beasiswa' => 'required',
            'mulai_tubel' => 'required',
            'selesai_tubel' => 'required',
            'sk_tubel' => 'required',
            'status_asmik' => 'required',
            'keterangan' => 'required',
        ]);

        $asmikbel = new Asmikbel;
        $asmikbel->prodi_id = $request->prodi_id;
        $asmikbel->nama = $request->nama;
        $asmikbel->nip_nrk = $request->nip_nrk;
        $asmikbel->status = $request->status;
        $asmikbel->studi_lanjut = $request->studi_lanjut;
        $asmikbel->beasiswa = $request->beasiswa;
        $asmikbel->mulai_tubel = $request->mulai_tubel;
        $asmikbel->selesai_tubel = $request->selesai_tubel;
        $asmikbel->sk_tubel = $request->sk_tubel;
        $asmikbel->status_asmik = $request->status_asmik;
        $asmikbel->keterangan = $request->keterangan;
        $asmikbel->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.asmikbel.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.asmikbel.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $asmikbel = Asmikbel::find($id);
        return view('admin.asmikbel.show', compact('asmikbel'));
    }

    public function edit($id)
    {
        $asmikbel = Asmikbel::find($id);
        $prodi = Prodi::all();
        return view('admin.asmikbel.edit', compact('asmikbel', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nip_nrk' => 'required',
            'status' => 'required',
            'studi_lanjut' => 'required',
            'beasiswa' => 'required',
            'mulai_tubel' => 'required',
            'selesai_tubel' => 'required',
            'sk_tubel' => 'required',
            'status_asmik' => 'required',
            'keterangan' => 'required',
        ]);

        $asmikbel = Asmikbel::find($id);
        $asmikbel->prodi_id = $request->prodi_id;
        $asmikbel->nama = $request->nama;
        $asmikbel->nip_nrk = $request->nip_nrk;
        $asmikbel->status = $request->status;
        $asmikbel->studi_lanjut = $request->studi_lanjut;
        $asmikbel->beasiswa = $request->beasiswa;
        $asmikbel->mulai_tubel = $request->mulai_tubel;
        $asmikbel->selesai_tubel = $request->selesai_tubel;
        $asmikbel->sk_tubel = $request->sk_tubel;
        $asmikbel->status_asmik = $request->status_asmik;
        $asmikbel->keterangan = $request->keterangan;
        $asmikbel->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.asmikbel.index')->with('success_edit_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.asmikbel.index')->with('success_edit_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $asmikbel = Asmikbel::find($id);
        $asmikbel->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.asmikbel.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.asmikbel.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    public function export() 
    {
        return Excel::download(new AsmikbelExport, 'asmikbel.xlsx');
    }

    public function downloadTemplate()
    {
        $template = public_path('template/template_asmikbel.xlsx');
        return response()->download($template);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

        Excel::import(new AsmikbelImport, $request->file('file'));

        return redirect()->route('superadmin.asmikbel.index')->with('success_import_data', 'Data  Asmikbel berhasil diimport');
    }
    
    
}

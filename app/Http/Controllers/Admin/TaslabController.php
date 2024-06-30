<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Taslab;
use Carbon\Carbon;
use App\Exports\TaslabExport;
use App\Imports\TaslabImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;

class TaslabController extends Controller
{
    public function index()
    {
        $taslab = Taslab::all();
        return view('admin.taslab.index', compact('taslab'));
    }

    public function create()
    {
        return view('admin.taslab.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'unit_kerja' => 'required',
            'pendidikan' => 'required',
            'tmt' => 'required',
            'status_pegawai' => 'required',
            'jabatan' => 'required',
            'bagian_tugas' => 'required',
            'nitk' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);

        $taslab = new Taslab;
        $taslab->nama = $request->nama;
        $taslab->unit_kerja = $request->unit_kerja;
        $taslab->pendidikan = $request->pendidikan;
        $taslab->tmt = $request->tmt;
        $taslab->status_pegawai = $request->status_pegawai;
        $taslab->jabatan = $request->jabatan;
        $taslab->bagian_tugas = $request->bagian_tugas;
        $taslab->nitk = $request->nitk;
        $taslab->tgl_lahir = $request->tgl_lahir;
        $taslab->no_hp = $request->no_hp;
        $taslab->email = $request->email;
        $taslab->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.taslab.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.taslab.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $taslab = Taslab::find($id);
        return view('admin.taslab.show', compact('taslab'));
    }

    public function edit(Request $request, $id)
    {
        $taslab = Taslab::find($id);
        return view('admin.taslab.edit', compact('taslab'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'unit_kerja' => 'required',
            'pendidikan' => 'required',
            'tmt' => 'required',
            'status_pegawai' => 'required',
            'jabatan' => 'required',
            'bagian_tugas' => 'required',
            'nitk' => 'required',
            'tgl_lahir' => 'required',
            'no_hp' => 'required',
            'email' => 'required',
        ]);

        $taslab = Taslab::find($id);
        $taslab->nama = $request->nama;
        $taslab->unit_kerja = $request->unit_kerja;
        $taslab->pendidikan = $request->pendidikan;
        $taslab->tmt = $request->tmt;
        $taslab->status_pegawai = $request->status_pegawai;
        $taslab->jabatan = $request->jabatan;
        $taslab->bagian_tugas = $request->bagian_tugas;
        $taslab->nitk = $request->nitk;
        $taslab->tgl_lahir = $request->tgl_lahir;
        $taslab->no_hp = $request->no_hp;
        $taslab->email = $request->email;
        $taslab->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.taslab.index')->with('success_edit_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.taslab.index')->with('success_edit_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $taslab = Taslab::find($id);
        $taslab->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.taslab.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.taslab.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }

    public function export()
    {
        return Excel::download(new TaslabExport, 'taslab.xlsx');
    }

    public function downloadTemplate()
    {
        $file = public_path('assets/template/template_taslab.xlsx');
        return response()->download($file);
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);

       $file = $request->file('file');

        Excel::import(new TaslabImport, $file);

        return back()->with('success_import_data', 'Data Taslab berhasil diimport');
    }
}

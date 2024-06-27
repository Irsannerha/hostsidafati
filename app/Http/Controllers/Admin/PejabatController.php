<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pejabat;
use Illuminate\Support\Facades\Auth;


class PejabatController extends Controller
{
    public function index()
    {
        $pejabat = Pejabat::all();
        return view('admin.pejabat.index', compact('pejabat'));
    }

    public function create()
    {
        return view('admin.pejabat.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'pangkat_golongan' => 'required',
            'jabatan' => 'required',
        ]);

        $pejabat = new Pejabat;
        $pejabat->nama = $request->nama;
        $pejabat->nip = $request->nip;
        $pejabat->pangkat_golongan = $request->pangkat_golongan;
        $pejabat->jabatan = $request->jabatan;
        $pejabat->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.pejabat.index')->with('success_create_data', 'Data berhasil ditambahkan');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.pejabat.index')->with('success_edit_data', 'Data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $pejabat = Pejabat::find($id);
        return view('admin.pejabat.show', compact('pejabat'));
    }

    public function edit($id)
    {
        $pejabat = Pejabat::find($id);
        return view('admin.pejabat.edit', compact('pejabat'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'pangkat_golongan' => 'required',
            'jabatan' => 'required',
        ]);

        $pejabat = Pejabat::find($id);
        $pejabat->nama = $request->nama;
        $pejabat->nip = $request->nip;
        $pejabat->pangkat_golongan = $request->pangkat_golongan;
        $pejabat->jabatan = $request->jabatan;
        $pejabat->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.pejabat.index')->with('success_edit_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.pejabat.index')->with('success_edit_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $pejabat = Pejabat::find($id);
        $pejabat->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.pejabat.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'pegawai') {
            return redirect()->route('pegawai.pejabat.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }
}

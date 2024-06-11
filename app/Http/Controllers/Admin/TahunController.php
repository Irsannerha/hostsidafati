<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tahun;

class TahunController extends Controller
{
    public function index()
    {
        $ts = Tahun::all();
        return view('admin.tahun.index', compact('ts'));
    }

    public function create()
    {
        return view('admin.tahun.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'ts' => 'required'
        ]);

        Tahun::create($request->all());

        return redirect()->route('superadmin.tahun.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function edit(Tahun $tahun)
    {
        return view('admin.tahun.edit', compact('tahun'));
    } 

    public function update(Request $request, Tahun $tahun)
    {
        $request->validate([
            'ts' => 'required'
        ]);

        $tahun->update($request->all());

        return redirect()->route('superadmin.tahun.index')->with('success_edit_data', 'Data berhasil diubah');
    }

    public function destroy(Tahun $tahun)
    {
        $tahun->delete();

        return redirect()->route('superadmin.tahun.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}
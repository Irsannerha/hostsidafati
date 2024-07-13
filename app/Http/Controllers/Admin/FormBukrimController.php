<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FormBukrim;
use App\Models\Prodi;
use App\Exports\FormbukrimExport;
use Maatwebsite\Excel\Facades\Excel;

class FormBukrimController extends Controller
{
    public function index()
    {
        $formbukrim = FormBukrim::all();
        $prodi = Prodi::all();
        return view('admin.form-bukrim.index', compact('formbukrim', 'prodi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.form-bukrim.create', compact('prodi'));
    }

    public function show($id)
    {
        $formbukrim = FormBukrim::find($id);
        return view('admin.form-bukrim.show', compact('formbukrim'));
    }

    public function edit($id)
    {
        $formbukrim = FormBukrim::find($id);
        $prodi = Prodi::all();
        return view('admin.form-bukrim.edit', compact('formbukrim', 'prodi'));
    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama_dok' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'jenis_berkas' => 'required',
            'jumlah_dok' => 'required',
        ]);

        $formbukrim = FormBukrim::find($id);
        $formbukrim->prodi_id = $request->prodi_id;
        $formbukrim->nama_dok = $request->nama_dok;
        $formbukrim->nama = $request->nama;
        $formbukrim->nim = $request->nim;
        $formbukrim->jenis_berkas = $request->jenis_berkas;
        $formbukrim->jumlah_dok = $request->jumlah_dok;
        $formbukrim->save();

        return redirect()->route('superadmin.form-bukrim.index')->with('success_update_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $formbukrim = FormBukrim::find($id);
        $formbukrim->delete();
        return redirect()->route('superadmin.form-bukrim.index')->with('success_delete_data', 'Data berhasil dihapus');
    }

    public function export()
    {
        return Excel::download(new FormbukrimExport, 'formbukrim.xlsx');
    }
}

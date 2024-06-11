<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;
use Symfony\Component\HttpKernel\HttpCache\Store;
use Illuminate\Support\Facades\Storage;

class ProdiController extends Controller
{
    public function index()
    {
        $prodi = Prodi::all();
        return view('admin.prodi.index', compact('prodi'));
    }

    public function create()
    {
        return view('admin.prodi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048',
            'email' => 'required',
            'kapro' => 'required',
            'fakultas' => 'required',
            'akreditasi' => 'required',
            'prodik' => 'required',
            'jumlah_mahasiswa' => 'required',
            'tgl_pendirian' => 'required',
            'deskripsi' => 'required',
            'sk_prodi' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);

        $prodi = new Prodi;
        $prodi->prodi = $request->prodi;
        $prodi->foto = $request->file('foto')->store('/');
        $prodi->email = $request->email;
        $prodi->kapro = $request->kapro;
        $prodi->fakultas = $request->fakultas;
        $prodi->akreditasi = $request->akreditasi;
        $prodi->prodik = $request->prodik;
        $prodi->jumlah_mahasiswa = $request->jumlah_mahasiswa;
        $prodi->tgl_pendirian = $request->tgl_pendirian;
        $prodi->deskripsi = $request->deskripsi;
        $prodi->sk_prodi = $request->sk_prodi;
        if ($request->hasFile('sk_prodi')) {
            $sk_prodi = $request->file('sk_prodi');
            $file_name = time() . '_SK_PRODI' . $prodi->prodi . '.' . $sk_prodi->getClientOriginalExtension();
            $prodi->sk_prodi = $file_name;
            $prodi->update();
            $sk_prodi->move('../public/assets/sk_prodi/', $file_name);
        }
        $prodi->save();

        if (auth()->user()->role == 'superadmin') {
            return redirect()->route('superadmin.prodi.index')->with('success_create_data', 'Data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $prodi = Prodi::find($id);
        return view('admin.prodi.show', compact('prodi'));
    }

    public function edit(Request $request, $id)
    {
        $prodi = Prodi::find($id);
        return view('admin.prodi.edit', compact('prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi' => 'required',
            'foto' => 'mimes:jpg,jpeg,png|max:2048',
            'email' => 'required',
            'kapro' => 'required',
            'fakultas' => 'required',
            'akreditasi' => 'required',
            'prodik' => 'required',
            'jumlah_mahasiswa' => 'required',
            'tgl_pendirian' => 'required',
            'deskripsi' => 'required',
            'sk_prodi' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);

        $prodi = Prodi::find($id);
        $prodi->prodi = $request->prodi;
        $prodi->foto = $request->file('foto')->store('/');
        $prodi->email = $request->email;
        $prodi->kapro = $request->kapro;
        $prodi->fakultas = $request->fakultas;
        $prodi->akreditasi = $request->akreditasi;
        $prodi->prodik = $request->prodik;
        $prodi->jumlah_mahasiswa = $request->jumlah_mahasiswa;
        $prodi->tgl_pendirian = $request->tgl_pendirian;
        $prodi->deskripsi = $request->deskripsi;
        $prodi->sk_prodi = $request->sk_prodi;
        if ($request->hasFile('sk_prodi')) {
            $sk_prodi = $request->file('sk_prodi');
            $file_name = time() . '_' . $prodi->prodi . '.' . $sk_prodi->getClientOriginalExtension();
            $prodi->sk_prodi = $file_name;
            $prodi->update();
            $sk_prodi->move('../public/assets/sk_prodi/', $file_name);
        }
        $prodi->save();

        if (auth()->user()->role == 'superadmin') {
            return redirect()->route('superadmin.prodi.index')->with('success_edit_data', 'Data berhasil diubah');
        }
    }

    public function destroy($id)
    {
        $prodi = Prodi::find($id);
        Storage::delete($prodi->foto);
        $prodi->delete();

        if (auth()->user()->role == 'superadmin') {
            return redirect()->route('superadmin.prodi.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }
}

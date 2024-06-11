<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosbel;
use App\Models\Prodi;


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

        return redirect()->route('superadmin.dosbel.index')->with('success_create_data', 'Data berhasil ditambahkan');

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

        return redirect()->route('superadmin.dosbel.index')->with('success_edit_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $dosbel = Dosbel::find($id);
        $dosbel->delete();
        return redirect()->route('superadmin.dosbel.index')->with('success_delete_data', 'Data berhasil dihapus');
    }

}

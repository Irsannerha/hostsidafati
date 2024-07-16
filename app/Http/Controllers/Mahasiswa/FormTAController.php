<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormTARequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\FormTA;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Auth;

class FormTAController extends Controller
{
    public function index()
    {
        $formta = FormTA::all();
        $prodi = Prodi::all();
        return view('mahasiswa.form-ta.create', compact('prodi'));
    }

    public function create()
    {
        $user = Auth::user();
        $prodi = Prodi::all();
        $mahasiswa = Mahasiswa::where('email', $user->email)->first();
        return view('mahasiswa.form-ta.create', compact('prodi', 'mahasiswa'));
    }

    public function store(FormTARequest $request)
    {
        $validatedData = $request->validated();

        try {
            $formta = new FormTA;
            $formta->prodi_id = $validatedData['prodi_id'];
            $formta->jenis_pengajuan_id = 1;
            $formta->nama = $validatedData['nama'];
            $formta->nim = $validatedData['nim'];
            $formta->keperluan = $validatedData['keperluan'];
            $formta->instansi = $validatedData['instansi'];
            $formta->alamat_instansi = $validatedData['alamat_instansi'];
            $formta->tjp = $validatedData['tjp'];
            $formta->pelaksanaan = $validatedData['pelaksanaan'];
            $formta->waktu_mulai_pelaksanaan = $validatedData['waktu_mulai_pelaksanaan'];
            $formta->waktu_akhir_pelaksanaan = $validatedData['waktu_akhir_pelaksanaan'];
            $formta->no_hp = $validatedData['no_hp'];
            $formta->email = $validatedData['email'];
            $formta->nama_pembimbing_satu = $validatedData['nama_pembimbing_satu'];
            $formta->nama_pembimbing_dua = $validatedData['nama_pembimbing_dua'];
            $formta->judul = $validatedData['judul'];
            $formta->save();

            return back()->with('success_create_data', 'Selamat! Data Pengajuan Tugas Akhirmu Berhasil');
        } catch (\Exception $e) {
            return back()->with('error_create_data', 'Maaf! Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    public function show($id)
    {
        $formta = FormTA::find($id);
        return view('mahasiswa.form-ta.show', compact('formta'));
    }

    public function edit($id)
    {
        $formta = FormTA::find($id);
        $prodi = Prodi::all();
        return view('mahasiswa.form-ta.edit', compact('formta', 'prodi'));
    }

    public function update(FormTARequest $request, $id)
    {
        $validatedData = $request->validated();
        try {
            if (!is_numeric($id) || $id <= 0) {
                abort(404);
            }
            $formta = FormTA::findOrFail($id);

            if (
                $formta->prodi_id != $request->prodi_id ||
                $formta->nama != $request->nama ||
                $formta->nim != $request->nim ||
                $formta->keperluan != $request->keperluan ||
                $formta->instansi != $request->instansi ||
                $formta->alamat_instansi != $request->alamat_instansi ||
                $formta->tjp != $request->tjp ||
                $formta->status == 'Ditolak' ||
                $formta->pelaksanaan != $request->pelaksanaan ||
                $formta->waktu_mulai_pelaksanaan != $request->waktu_mulai_pelaksanaan ||
                $formta->waktu_akhir_pelaksanaan != $request->waktu_akhir_pelaksanaan ||
                $formta->no_hp != $request->no_hp ||
                $formta->email != $request->email ||
                $formta->nama_pembimbing_satu != $request->nama_pembimbing_satu ||
                $formta->nama_pembimbing_dua != $request->nama_pembimbing_dua ||
                $formta->judul != $request->judul
            ) {


                $formta->prodi_id = $validatedData['prodi_id'];
                $formta->nama = $validatedData['nama'];
                $formta->nim = $validatedData['nim'];
                $formta->keperluan = $validatedData['keperluan'];
                $formta->instansi = $validatedData['instansi'];
                $formta->alamat_instansi = $validatedData['alamat_instansi'];
                $formta->tjp = $validatedData['tjp'];
                $formta->pelaksanaan = $validatedData['pelaksanaan'];
                $formta->waktu_mulai_pelaksanaan = $validatedData['waktu_mulai_pelaksanaan'];
                $formta->waktu_akhir_pelaksanaan = $validatedData['waktu_akhir_pelaksanaan'];
                $formta->no_hp = $validatedData['no_hp'];
                $formta->status = 'Diproses';
                $formta->email = $validatedData['email'];
                $formta->nama_pembimbing_satu = $validatedData['nama_pembimbing_satu'];
                $formta->nama_pembimbing_dua = $validatedData['nama_pembimbing_dua'];
                $formta->judul = $validatedData['judul'];

                $formta->save();

                return redirect()->route('mahasiswa.dashboard')->with('success_update_data', 'Data berhasil diubah');
            } else {
                return redirect()->route('mahasiswa.dashboard')->with('no_changes', 'Tidak ada perubahan yang dilakukan.');
            }
        } catch (\Exception $e) {
            return back()->with('error_create_data', 'Maaf! Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }

    public function destroy($id)
    {
        $formta = FormTA::find($id);
        $formta->delete();
        return redirect()->route('mahasiswa.form-ta.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

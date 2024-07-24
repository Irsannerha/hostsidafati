<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormTARequest;
use App\Http\Requests\FormTARequestEdit;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use App\Models\FormTA;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Storage;
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
        // dd($validatedData);

        $khs = $request->file('file_khs');
        $krs = $request->file('file_krs');
        $transkrip = $request->file('file_transkrip');

        $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
        $nim = $request->nim;

        $khs_name_file = "{$nim}-{$timestamp}.{$khs->getClientOriginalExtension()}";
        $krs_name_file = "{$nim}-{$timestamp}.{$krs->getClientOriginalExtension()}";
        $transkrip_name_file = "{$nim}-{$timestamp}.{$transkrip->getClientOriginalExtension()}";

        $path_khs = 'mahasiswa/form-ta/khs/';
        $path_krs = 'mahasiswa/form-ta/krs/';
        $path_transkrip = 'mahasiswa/form-ta/transkrip/';

        Storage::disk('public')->putFileAs($path_khs, $khs, $khs_name_file);
        Storage::disk('public')->putFileAs($path_krs, $krs, $krs_name_file);
        Storage::disk('public')->putFileAs($path_transkrip, $transkrip, $transkrip_name_file);

        $formta = new FormTA;
        $formta->jenis_pengajuan_id = 1;
        $formta->nama = $validatedData['nama'];
        $formta->nim = $validatedData['nim'];
        $formta->prodi_id = $validatedData['prodi_id'];
        $formta->no_hp_mahasiswa = $validatedData['no_hp_mhs'];
        $formta->email = $validatedData['email'];
        $formta->keperluan = $validatedData['keperluan'];
        $formta->nama_pembimbing_satu = $validatedData['nama_pembimbing_satu'];
        $formta->nama_pembimbing_dua = $validatedData['nama_pembimbing_dua'];
        $formta->alamat_mahasiswa = $validatedData['alamat_mhs'];
        $formta->judul_ta = $validatedData['judul_ta'];
        $formta->khs = $khs_name_file;
        $formta->krs = $krs_name_file;
        $formta->transkrip = $transkrip_name_file;
        $formta->nama_instansi_satu = $validatedData['nama_instansi1'];
        $formta->nama_pimpinan_instansi_satu = $validatedData['nama_pimpinan_instansi1'];
        $formta->no_hp_instansi_satu = $validatedData['no_hp_instansi1'];
        $formta->alamat_instansi_satu = $validatedData['alamat_instansi1'];
        $formta->keperluan_satu = $validatedData['keperluan1'];
        $formta->nama_instansi_dua = $validatedData['nama_instansi2'];
        $formta->nama_pimpinan_instansi_dua = $validatedData['nama_pimpinan_instansi2'];
        $formta->no_hp_instansi_dua = $validatedData['no_hp_instansi2'];
        $formta->alamat_instansi_dua = $validatedData['alamat_instansi2'];
        $formta->keperluan_dua = $validatedData['keperluan2'];
        $formta->save();

        return back()->with('success_create_data', 'Selamat! Data Pengajuan Tugas Akhirmu Berhasil');
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
                $khs = $request->file('khs');
                $krs = $request->file('krs');
                $transkrip = $request->file('transkrip');

                $timestamp = Carbon::now()->format('Y-m-d_H-i-s');
                $nim = $request->nim;

                $khs_name_file = "{$nim}-{$timestamp}.{$khs->getClientOriginalExtension()}";
                $krs_name_file = "{$nim}-{$timestamp}.{$krs->getClientOriginalExtension()}";
                $transkrip_name_file = "{$nim}-{$timestamp}.{$transkrip->getClientOriginalExtension()}";

                $path_khs = 'mahasiswa/form-ta/khs/';
                $path_krs = 'mahasiswa/form-ta/krs/';
                $path_transkrip = 'mahasiswa/form-ta/transkrip/';

                Storage::disk('public')->putFileAs($path_khs, $khs, $khs_name_file);
                Storage::disk('public')->putFileAs($path_krs, $krs, $krs_name_file);
                Storage::disk('public')->putFileAs($path_transkrip, $transkrip, $transkrip_name_file);

                $formta = new FormTA;
                $formta->jenis_pengajuan_id = 1;
                $formta->nama = $validatedData['nama'];
                $formta->nim = $validatedData['nim'];
                $formta->prodi_id = $validatedData['prodi_id'];
                $formta->no_hp_mahasiswa = $validatedData['no_hp_mhs'];
                $formta->email = $validatedData['email'];
                $formta->nama_pembimbing_satu = $validatedData['nama_pembimbing_satu'];
                $formta->nama_pembimbing_dua = $validatedData['nama_pembimbing_dua'];
                $formta->alamat_mahasiswa = $validatedData['alamat_mhs'];
                $formta->judul_ta = $validatedData['judul_ta'];
                $formta->khs = $khs_name_file;
                $formta->krs = $krs_name_file;
                $formta->transkrip = $transkrip_name_file;
                $formta->nama_instansi_satu = $validatedData['nama_instansi_satu'];
                $formta->nama_pimpinan_instansi_satu = $validatedData['nama_pimpinan_instansi_satu'];
                $formta->no_hp_instansi_satu = $validatedData['no_hp_instansi_satu'];
                $formta->alamat_instansi_satu = $validatedData['alamat_instansi_satu'];
                $formta->keperluan_satu = $validatedData['keperluan_satu'];
                $formta->nama_instansi_dua = $validatedData['nama_instansi_dua'];
                $formta->nama_pimpinan_instansi_dua = $validatedData['nama_pimpinan_instansi_dua'];
                $formta->no_hp_instansi_dua = $validatedData['no_hp_instansi_dua'];
                $formta->alamat_instansi_dua = $validatedData['alamat_instansi_dua'];
                $formta->keperluan_dua = $validatedData['keperluan_dua'];
                $formta->save();

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

    public function loadPdf($id)
    {
        $data = FormTA::findOrFail($id);
        $pdf = PDF::loadView('pdf.pengajuanTA', compact('data'));
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

    }
}

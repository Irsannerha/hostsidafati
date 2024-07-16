<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormTARequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\FormTA;
use App\Models\KeteranganPengajuan;

class FormTADosenController extends Controller
{
    public function tolak(Request $request, $id)
    {
        $katerangan = $request->validate([
            'keterangan' => 'required',
		]);

        try {
            if (!is_numeric($id) || $id <= 0) {
                abort(404);
            }

            $formta = FormTA::findOrFail($id);

            // dd($format->id);

            $keterangan_pengajuan = new KeteranganPengajuan;
            $keterangan_pengajuan->jenis_pengajuan_id = $formta->jenis_pengajuan_id;
            $keterangan_pengajuan->id_pengajuan = $formta->id;
            $keterangan_pengajuan->status_keterangan = "Pengajuan Ditolak Dosen Wali";
            $keterangan_pengajuan->keterangan = $katerangan['keterangan'];
            $keterangan_pengajuan->save();

            $formta->status = "Ditolak";
            $formta->keterangan = "Pengajuan Ditolak Dosen Wali";
            $formta->save();

            return redirect()->route('dosen.dashboard')->with('success_update_data', 'Data berhasil diubah');

        } catch (\Exception $e) {
            return back()->with('error_create_data', 'Maaf! Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }
    public function terima($id)
    {
        try {
            if (!is_numeric($id) || $id <= 0) {
                abort(404);
            }

            $formta = FormTA::findOrFail($id);

            $keterangan_pengajuan = new KeteranganPengajuan;
            $keterangan_pengajuan->jenis_pengajuan_id = $formta->jenis_pengajuan_id;
            $keterangan_pengajuan->id_pengajuan = $formta->id;
            $keterangan_pengajuan->status_keterangan = "Telah Diverifikasi Dosen Wali";
            $keterangan_pengajuan->keterangan = "-";
            $keterangan_pengajuan->save();

            $formta->status = "Diproses";
            $formta->dosen_wali = true;
            $formta->keterangan = "Telah Diverifikasi Dosen Wali";
            $formta->save();

            return redirect()->route('dosen.dashboard')->with('success_update_data', 'Data berhasil diubah');

        } catch (\Exception $e) {
            return back()->with('error_create_data', 'Maaf! Terjadi kesalahan saat menyimpan data.')->withInput();
        }
    }
}

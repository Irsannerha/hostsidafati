<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MhsAktif;
use App\Models\Prodi;
use App\Models\Tahun;
use Illuminate\Support\Facades\DB; // Import DB facade

class MhsAktifController extends Controller
{
    public function index()
    {
        $mhsaktif = MhsAktif::all();
        $prodi = Prodi::all();
        $tahun = Tahun::all();

        $total = MhsAktif::select(DB::raw('SUM(jumlah_mhs_aktif_ts) as mhs_non_pmb, SUM(jumlah_mhs_aktif_th) as mhs_pmb, SUM(jumlah_mhs_aktif_ts + jumlah_mhs_aktif_th) as total'))
            ->groupBy('ts_id')
            ->get();
        return view('admin.mhs-aktif.index', compact('mhsaktif', 'prodi', 'tahun', 'total'));
    }

    public function create(Request $request)
    {
        if ($request->tahun_semester_id == null) {
        $prodi = Prodi::all();
        }
        else {
            $tahun_filter = MhsAktif::select('prodi_id')->where('ts_id', $request->tahun_semester_id)->get();
            $prodi = Prodi::whereNotIn('id', $tahun_filter)->get();
        }
        $tahun = Tahun::all();if ($request->tahun_semester_id == null) {
        return view('admin.mhs-aktif.create', compact('prodi', 'tahun'));
        } else {
            return response()->json($prodi);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'jumlah_mhs_aktif_ts' => 'required',
            'jumlah_mhs_aktif_th' => 'required',
        ]);

        $mhsaktif = new MhsAktif;
        $mhsaktif->prodi_id = $request->prodi_id;
        $mhsaktif->ts_id = $request->ts_id;
        $mhsaktif->jumlah_mhs_aktif_ts = $request->jumlah_mhs_aktif_ts;
        $mhsaktif->jumlah_mhs_aktif_th = $request->jumlah_mhs_aktif_th;
        $mhsaktif->save();

        return redirect()->route('superadmin.mhs-aktif.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $mhsaktif = MhsAktif::find($id);
        $prodi = Prodi::all();
        return view('admin.rekap-mhs.show', compact('mhsaktif', 'prodi'));
    }

    public function edit($id)
    {
        $mhsaktif = MhsAktif::findOrFail($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        // dd($rekapmhs);
        return view('admin.mhs-aktif.edit', compact('mhsaktif', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'ts_id' => 'required',
            'jumlah_mhs_aktif_ts' => 'required',
            'jumlah_mhs_aktif_th' => 'required',
        ]);

        $mhsaktif = MhsAktif::findOrFail($id);
        $mhsaktif->prodi_id = $request->prodi_id;
        $mhsaktif->ts_id = $request->ts_id;
        $mhsaktif->jumlah_mhs_aktif_ts = $request->jumlah_mhs_aktif_ts;
        $mhsaktif->jumlah_mhs_aktif_th = $request->jumlah_mhs_aktif_th;
        $mhsaktif->save();

        return redirect()->route('superadmin.mhs-aktif.index')->with('success_update_data', 'Data berhasil diubah');
    }

   public function destroy($id)
    {
        $mhsaktif = MhsAktif::findOrFail($id);
        $mhsaktif->delete();

        return redirect()->route('superadmin.mhs-aktif.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

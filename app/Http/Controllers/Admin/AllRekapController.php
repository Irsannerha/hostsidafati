<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AllRekap;
use App\Models\Prodi;
use App\Models\Tahun;

class AllRekapController extends Controller
{
    public function index()
    {
        $allrekap = AllRekap::all();
        $tahun = Tahun::all();
        return view('admin.all-rekap.index', compact('allrekap', 'tahun'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        $tahun_semester = Tahun::all();
        $tahun = Tahun::all();
        return view('admin.all-rekap.create', compact('prodi', 'tahun', 'tahun_semester'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_semester_id' => 'required',
            'tahun_id' => 'required',
            'jumlah_mhs_aktif_ts' => 'required',
            'jumlah_mhs_aktif_th' => 'required',
            'mhs_undur_diri_genap' => 'required',
            'mhs_undur_diri_ganjil' => 'required',
            'mhs_keluar_genap' => 'required',
            'mhs_keluar_ganjil' => 'required',
            'mhs_wafat_genap' => 'required',
            'mhs_wafat_ganjil' => 'required',
            'mhs_lulus_januari' => 'required',
            'mhs_lulus_februari' => 'required',
            'mhs_lulus_maret' => 'required',
            'mhs_lulus_april' => 'required',
            'mhs_lulus_mei' => 'required',
            'mhs_lulus_juni' => 'required',
            'mhs_lulus_juli' => 'required',
            'mhs_lulus_agustus' => 'required',
            'mhs_lulus_september' => 'required',
            'mhs_lulus_oktober' => 'required',
            'mhs_lulus_november' => 'required',
            'mhs_lulus_desember' => 'required',
            'mhs_lulus_ta' => 'required',
        ]);

        $rekapmhs = new AllRekap();
        $rekapmhs->prodi_id = $request->prodi_id;
        $rekapmhs->tahun_semester_id = $request->tahun_semester_id;
        $rekapmhs->tahun_id = $request->tahun_id;
        $rekapmhs->jumlah_mhs_aktif_ts = $request->jumlah_mhs_aktif_ts;
        $rekapmhs->jumlah_mhs_aktif_th = $request->jumlah_mhs_aktif_th;
        $rekapmhs->mhs_undur_diri_genap = $request->mhs_undur_diri_genap;   
        $rekapmhs->mhs_undur_diri_ganjil = $request->mhs_undur_diri_ganjil;
        $rekapmhs->mhs_keluar_genap = $request->mhs_keluar_genap;
        $rekapmhs->mhs_keluar_ganjil = $request->mhs_keluar_ganjil;
        $rekapmhs->mhs_wafat_genap = $request->mhs_wafat_genap;
        $rekapmhs->mhs_wafat_ganjil = $request->mhs_wafat_ganjil;
        $rekapmhs->mhs_lulus_januari = $request->mhs_lulus_januari;
        $rekapmhs->mhs_lulus_februari = $request->mhs_lulus_februari;
        $rekapmhs->mhs_lulus_maret = $request->mhs_lulus_maret;
        $rekapmhs->mhs_lulus_april = $request->mhs_lulus_april;
        $rekapmhs->mhs_lulus_mei = $request->mhs_lulus_mei;
        $rekapmhs->mhs_lulus_juni = $request->mhs_lulus_juni;
        $rekapmhs->mhs_lulus_juli = $request->mhs_lulus_juli;
        $rekapmhs->mhs_lulus_agustus = $request->mhs_lulus_agustus;
        $rekapmhs->mhs_lulus_september = $request->mhs_lulus_september;
        $rekapmhs->mhs_lulus_oktober = $request->mhs_lulus_oktober;
        $rekapmhs->mhs_lulus_november = $request->mhs_lulus_november;
        $rekapmhs->mhs_lulus_desember = $request->mhs_lulus_desember;
        $rekapmhs->mhs_lulus_ta = $request->mhs_lulus_ta;
        $rekapmhs->save();


        AllRekap::create($request->all());
        return redirect()->route('superadmin.all-rekap.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $rekapmhs = AllRekap::find($id);
        $prodi = Prodi::all();
        $tahun = Tahun::all();
        return view('admin.all-rekap.edit', compact('allrekap', 'prodi', 'tahun'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'tahun_semester_id' => 'required',
            'tahun_id' => 'required',
            'jumlah_mhs_aktif_ts' => 'required',
            'jumlah_mhs_aktif_th' => 'required',
            'mhs_undur_diri_genap' => 'required',
            'mhs_undur_diri_ganjil' => 'required',
            'mhs_keluar_genap' => 'required',
            'mhs_keluar_ganjil' => 'required',
            'mhs_wafat_genap' => 'required',
            'mhs_wafat_ganjil' => 'required',
            'mhs_lulus_januari' => 'required',
            'mhs_lulus_februari' => 'required',
            'mhs_lulus_maret' => 'required',
            'mhs_lulus_april' => 'required',
            'mhs_lulus_mei' => 'required',
            'mhs_lulus_juni' => 'required',
            'mhs_lulus_juli' => 'required',
            'mhs_lulus_agustus' => 'required',
            'mhs_lulus_september' => 'required',
            'mhs_lulus_oktober' => 'required',
            'mhs_lulus_november' => 'required',
            'mhs_lulus_desember' => 'required',
            'mhs_lulus_ta' => 'required',
        ]);

        $rekapmhs = AllRekap::find($id);
        $rekapmhs->prodi_id = $request->prodi_id;
        $rekapmhs->tahun_semester_id = $request->tahun_semester_id;
        $rekapmhs->tahun_id = $request->tahun_id;
        $rekapmhs->jumlah_mhs_aktif_ts = $request->jumlah_mhs_aktif_ts;
        $rekapmhs->jumlah_mhs_aktif_th = $request->jumlah_mhs_aktif_th;
        $rekapmhs->mhs_undur_diri_genap = $request->mhs_undur_diri_genap;
        $rekapmhs->mhs_undur_diri_ganjil = $request->mhs_undur_diri_ganjil;
        $rekapmhs->mhs_keluar_genap = $request->mhs_keluar_genap;
        $rekapmhs->mhs_keluar_ganjil = $request->mhs_keluar_ganjil;
        $rekapmhs->mhs_wafat_genap = $request->mhs_wafat_genap;
        $rekapmhs->mhs_wafat_ganjil = $request->mhs_wafat_ganjil;
        $rekapmhs->mhs_lulus_januari = $request->mhs_lulus_januari;
        $rekapmhs->mhs_lulus_februari = $request->mhs_lulus_februari;
        $rekapmhs->mhs_lulus_maret = $request->mhs_lulus_maret;
        $rekapmhs->mhs_lulus_april = $request->mhs_lulus_april;
        $rekapmhs->mhs_lulus_mei = $request->mhs_lulus_mei;
        $rekapmhs->mhs_lulus_juni = $request->mhs_lulus_juni;
        $rekapmhs->mhs_lulus_juli = $request->mhs_lulus_juli;
        $rekapmhs->mhs_lulus_agustus = $request->mhs_lulus_agustus;
        $rekapmhs->mhs_lulus_september = $request->mhs_lulus_september;
        $rekapmhs->mhs_lulus_oktober = $request->mhs_lulus_oktober;
        $rekapmhs->mhs_lulus_november = $request->mhs_lulus_november;
        $rekapmhs->mhs_lulus_desember = $request->mhs_lulus_desember;
        $rekapmhs->mhs_lulus_ta = $request->mhs_lulus_ta;
        $rekapmhs->save();

        AllRekap::find($id)->update($request->all());
        return redirect()->route('superadmin.all-rekap.index')->with('success_edit_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        AllRekap::find($id)->delete();
        return redirect()->router('superadmin.all-rekap.index')->with('success_delete_data', 'Data berhasil dihapus');
    }


    public function show($id)
    {
        $rekapmhs = AllRekap::find($id);
        return view('admin.all-rekap.show', compact('allrekap'));
    }
}

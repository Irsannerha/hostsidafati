<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\Prodi;

class DosenController extends Controller
{
    public function index()
    {
        $dosen = Dosen::all();
        return view('admin.dosen.index', compact('dosen'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.dosen.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nip_nrk' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'pendidikan' => 'required',
            'masa_kerja' => 'required',
            'status_nidn_nidk' => 'required',
            'status_pegawai' => 'required',
            'jabfung' => 'required',
            'tmt_jabfung_terakhir' => 'required',
            'target_kenaikan_jabfung' => 'required',
            'tmt_masuk_itera' => 'required',
            'pekerti' => 'required',
            'serdos' => 'required',
            'status_dosen' => 'required',
            'sk_pns' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_cpns' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_tubel' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_perpanjangan_tubel' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_jabfung' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_pengaktifan' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_pengaktifan_kembali' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);

        // dd($request);

        $dosen = new Dosen;
        $dosen->prodi_id = $request->prodi_id;
        $dosen->nama = $request->nama;
        $dosen->nip_nrk = $request->nip_nrk;
        $dosen->tgl_lahir = $request->tgl_lahir;
        $dosen->umur = $request->umur;
        $dosen->pendidikan = $request->pendidikan;
        $dosen->masa_kerja = $request->masa_kerja;
        $dosen->status_nidn_nidk = $request->status_nidn_nidk;
        $dosen->status_pegawai = $request->status_pegawai;
        $dosen->jabfung = $request->jabfung;
        $dosen->tmt_jabfung_terakhir = $request->tmt_jabfung_terakhir;
        $dosen->target_kenaikan_jabfung = $request->target_kenaikan_jabfung;
        $dosen->tmt_masuk_itera = $request->tmt_masuk_itera;
        $dosen->tmt = $request->tmt;
        $dosen->pekerti = $request->pekerti;
        $dosen->serdos = $request->serdos;
        $dosen->status_dosen = $request->status_dosen;
        $dosen->sk_pns = $request->sk_pns;
        $dosen->sk_cpns = $request->sk_cpns;
        $dosen->sk_tubel = $request->sk_tubel;
        $dosen->sk_perpanjangan_tubel = $request->sk_perpanjangan_tubel;
        $dosen->sk_jabfung = $request->sk_jabfung;
        $dosen->sk_pengaktifan = $request->sk_pengaktifan;
        $dosen->sk_pengaktifan_kembali = $request->sk_pengaktifan_kembali;

        if ($request->hasFile('sk_pns')) {
            $sk_pns = $request->file('sk_pns');
            $file_name = time() . '_SK_PNS_' . $dosen->nama . '.' . $sk_pns->getClientOriginalExtension();
            $dosen->sk_pns = $file_name;
            $dosen->update();
            $sk_pns->move('../public/assets/sk_pns/', $file_name);
        }

        if ($request->hasFile('sk_cpns')) {
            $sk_cpns = $request->file('sk_cpns');
            $file_name = time() . '_SK_CPNS' . $dosen->nama . '.' . $sk_cpns->getClientOriginalExtension();
            $dosen->sk_cpns = $file_name;
            $dosen->update();
            $sk_cpns->move('../public/assets/sk_cpns/', $file_name);
        }

        if ($request->hasFile('sk_tubel')) {
            $sk_tubel = $request->file('sk_tubel');
            $file_name = time() . '_SK_Tubel' . $dosen->nama . '.' . $sk_tubel->getClientOriginalExtension();
            $dosen->sk_tubel = $file_name;
            $dosen->update();
            $sk_tubel->move('../public/assets/sk_tubel/', $file_name);
        }

        if ($request->hasFile('sk_perpanjangan_tubel')) {
            $sk_perpanjangan_tubel = $request->file('sk_perpanjangan_tubel');
            $file_name = time() . '_SK_Perpanjangan_Tubel' . $dosen->nama . '.' . $sk_perpanjangan_tubel->getClientOriginalExtension();
            $dosen->sk_perpanjangan_tubel = $file_name;
            $dosen->update();
            $sk_perpanjangan_tubel->move('../public/assets/sk_perpanjangan_tubel/', $file_name);
        }

        if ($request->hasFile('sk_jabfung')) {
            $sk_jabfung = $request->file('sk_jabfung');
            $file_name = time() . '_SK_Jabfung' . $dosen->nama . '.' . $sk_jabfung->getClientOriginalExtension();
            $dosen->sk_jabfung = $file_name;
            $dosen->update();
            $sk_jabfung->move('../public/assets/sk_jabfung/', $file_name);
        }

        if ($request->hasFile('sk_pengaktifan')) {
            $sk_pengaktifan = $request->file('sk_pengaktifan');
            $file_name = time() . '_SK_Pengaktifan' . $dosen->nama . '.' . $sk_pengaktifan->getClientOriginalExtension();
            $dosen->sk_pengaktifan = $file_name;
            $dosen->update();
            $sk_pengaktifan->move('../public/assets/sk_pengaktifan/', $file_name);
        }

        if ($request->hasFile('sk_pengaktifan_kembali')) {
            $sk_pengaktifan_kembali = $request->file('sk_pengaktifan_kembali');
            $file_name = time() . '_SK_Pengaktifan_Kembali' . $dosen->nama . '.' . $sk_pengaktifan_kembali->getClientOriginalExtension();
            $dosen->sk_pengaktifan_kembali = $file_name;
            $dosen->update();
            $sk_pengaktifan_kembali->move('../public/assets/sk_pengaktifan_kembali/', $file_name);
        }
        // dd($dosen);
        $dosen->save();

        return redirect()->route('superadmin.dosen.index')->with('success_create_data', 'Data berhasil ditambahkan');
    }

    public function show($id)
    {
        $dosen = Dosen::find($id);
        return view('admin.dosen.show', compact('dosen'));
    }

    public function edit($id)
    {
        $dosen = Dosen::find($id);
        $prodi = Prodi::all();
        return view('admin.dosen.edit', compact('dosen', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nip_nrk' => 'required',
            'tgl_lahir' => 'required',
            'umur' => 'required',
            'pendidikan' => 'required',
            'masa_kerja' => 'required',
            'status_nidn_nidk' => 'required',
            'status_pegawai' => 'required',
            'jabfung' => 'required',
            'tmt_jabfung_terakhir' => 'required',
            'target_kenaikan_jabfung' => 'required',
            'tmt_masuk_itera' => 'required',
            'pekerti' => 'required',
            'serdos' => 'required',
            'status_dosen' => 'required',
            'sk_pns' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_cpns' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_tubel' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_perpanjangan_tubel' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_jabfung' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_pengaktifan' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
            'sk_pengaktifan_kembali' => 'mimes:pdf,doc,docx,ppt,pptx|max:2048',
        ]);

        $dosen = Dosen::find($id);
        $dosen->prodi_id = $request->prodi_id;
        $dosen->nama = $request->nama;
        $dosen->nip_nrk = $request->nip_nrk;
        $dosen->tgl_lahir = $request->tgl_lahir;
        $dosen->umur = $request->umur;
        $dosen->pendidikan = $request->pendidikan;
        $dosen->masa_kerja = $request->masa_kerja;
        $dosen->status_nidn_nidk = $request->status_nidn_nidk;
        $dosen->status_pegawai = $request->status_pegawai;
        $dosen->jabfung = $request->jabfung;
        $dosen->tmt_jabfung_terakhir = $request->tmt_jabfung_terakhir;
        $dosen->target_kenaikan_jabfung = $request->target_kenaikan_jabfung;
        $dosen->tmt_masuk_itera = $request->tmt_masuk_itera;
        $dosen->tmt = $request->tmt;
        $dosen->pekerti = $request->pekerti;
        $dosen->serdos = $request->serdos;
        $dosen->status_dosen = $request->status_dosen;
        $dosen->sk_pns = $request->sk_pns;
        $dosen->sk_cpns = $request->sk_cpns;
        $dosen->sk_tubel = $request->sk_tubel;
        $dosen->sk_perpanjangan_tubel = $request->sk_perpanjangan_tubel;
        $dosen->sk_jabfung = $request->sk_jabfung;
        $dosen->sk_pengaktifan = $request->sk_pengaktifan;
        $dosen->sk_pengaktifan_kembali = $request->sk_pengaktifan_kembali;

        if ($request->hasFile('sk_pns')) {
            $sk_pns = $request->file('sk_pns');
            $file_name = time() . '_SK_PNS_' . $dosen->nama . '.' . $sk_pns->getClientOriginalExtension();
            $dosen->sk_pns = $file_name;
            $dosen->update();
            $sk_pns->move('../public/assets/sk_pns/', $file_name);
        }

        if ($request->hasFile('sk_cpns')) {
            $sk_cpns = $request->file('sk_cpns');
            $file_name = time() . '_SK_CPNS' . $dosen->nama . '.' . $sk_cpns->getClientOriginalExtension();
            $dosen->sk_cpns = $file_name;
            $dosen->update();
            $sk_cpns->move('../public/assets/sk_cpns/', $file_name);
        }

        if ($request->hasFile('sk_tubel')) {
            $sk_tubel = $request->file('sk_tubel');
            $file_name = time() . '_SK_Tubel' . $dosen->nama . '.' . $sk_tubel->getClientOriginalExtension();
            $dosen->sk_tubel = $file_name;
            $dosen->update();
            $sk_tubel->move('../public/assets/sk_tubel/', $file_name);
        }

        if ($request->hasFile('sk_perpanjangan_tubel')) {
            $sk_perpanjangan_tubel = $request->file('sk_perpanjangan_tubel');
            $file_name = time() . '_SK_Perpanjangan_Tubel' . $dosen->nama . '.' . $sk_perpanjangan_tubel->getClientOriginalExtension();
            $dosen->sk_perpanjangan_tubel = $file_name;
            $dosen->update();
            $sk_perpanjangan_tubel->move('../public/assets/sk_perpanjangan_tubel/', $file_name);
        }

        if ($request->hasFile('sk_jabfung')) {
            $sk_jabfung = $request->file('sk_jabfung');
            $file_name = time() . '_SK_Jabfung' . $dosen->nama . '.' . $sk_jabfung->getClientOriginalExtension();
            $dosen->sk_jabfung = $file_name;
            $dosen->update();
            $sk_jabfung->move('../public/assets/sk_jabfung/', $file_name);
        }

        if ($request->hasFile('sk_pengaktifan')) {
            $sk_pengaktifan = $request->file('sk_pengaktifan');
            $file_name = time() . '_SK_Pengaktifan' . $dosen->nama . '.' . $sk_pengaktifan->getClientOriginalExtension();
            $dosen->sk_pengaktifan = $file_name;
            $dosen->update();
            $sk_pengaktifan->move('../public/assets/sk_pengaktifan/', $file_name);
        }

        if ($request->hasFile('sk_pengaktifan_kembali')) {
            $sk_pengaktifan_kembali = $request->file('sk_pengaktifan_kembali');
            $file_name = time() . '_SK_Pengaktifan_Kembali' . $dosen->nama . '.' . $sk_pengaktifan_kembali->getClientOriginalExtension();
            $dosen->sk_pengaktifan_kembali = $file_name;
            $dosen->update();
            $sk_pengaktifan_kembali->move('../public/assets/sk_pengaktifan_kembali/', $file_name);
        }
        $dosen->save();

        return redirect()->route('superadmin.dosen.index')->with('success_edit_data', 'Data berhasil diubah');
    }

    public function destroy($id)
    {
        $dosen = Dosen::find($id);
        $dosen->delete();
        return redirect()->route('superadmin.dosen.index')->with('success_delete_data', 'Data berhasil dihapus');
    }
}

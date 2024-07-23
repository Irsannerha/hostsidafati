<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prestasi;
use App\Exports\PrestasiExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Auth;
use App\Models\Prodi;

class PrestasiController extends Controller
{
    public function index()
    {
        $prestasi = Prestasi::all();
        return view('admin.prestasi.index', compact('prestasi'));
    }

    public function create()
    {
        $prodi = Prodi::all();
        return view('admin.prestasi.create', compact('prodi'));
    }

    public function show($id)
    {
        $prestasi = Prestasi::find($id);
        return view('admin.prestasi.show', compact('prestasi'));
    }

    public function edit($id)
    {
        $prestasi = Prestasi::find($id);
        $prodi = Prodi::all();
        return view('admin.prestasi.edit', compact('prestasi', 'prodi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama_tim' => 'required',
            'nama_mahasiswa' => 'required',
            'nim' => 'required',
            'kontak' => 'required',
            'jenis_prestasi' => 'required',
            'jumlah_peserta' => 'required',
            'kategori_olahraga' => 'required',
            'tahun_kegiatan' => 'required',
            'url_penyelenggara' => 'required',
            'nama_penyelenggara' => 'required',
            'tgl_kegiatan' => 'required',
            'tingkat_kejuaraan' => 'required',
            'judul_karya' => 'required',
            'anggota_karya' => 'required',
        ]);

        $prestasi = Prestasi::find($id);
        $prestasi->prodi_id = $request->prodi_id;
        $prestasi->nama_tim = $request->nama_tim;
        $prestasi->nama_mahasiswa = $request->nama_mahasiswa;
        $prestasi->nim = $request->nim;
        $prestasi->kontak = $request->kontak;
        $prestasi->jenis_prestasi = $request->jenis_prestasi;
        $prestasi->jumlah_peserta = $request->jumlah_peserta;
        $prestasi->kategori_olahraga = $request->kategori_olahraga;
        $prestasi->tahun_kegiatan = $request->tahun_kegiatan;
        $prestasi->url_penyelenggara = $request->url_penyelenggara;
        $prestasi->nama_penyelenggara = $request->nama_penyelenggara;
        $prestasi->tgl_kegiatan = $request->tgl_kegiatan;
        $prestasi->tingkat_kejuaraan = $request->tingkat_kejuaraan;
        $prestasi->judul_karya = $request->judul_karya;
        $prestasi->anggota_karya = $request->anggota_karya;
        // $prestasi->foto = $request->foto;
        // if ($request->hasFile('foto')) {
        //     $foto = $request->file('foto');
        //     $file_name = time() . '_Foto_' . $prestasi->nim . '.' . $foto->getClientOriginalExtension();
        //     $prestasi->foto = $file_name;
        //     $prestasi->update();
        //     $foto->move('../public/assets/foto/', $file_name);
        // }
        $prestasi->save();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.prestasi.index')->with('success_edit_data', 'Data berhasil diubah');
        } else if (Auth::user()->role == 'kemahasiswaan') {
            return redirect()->route('kemahasiswaan.prestasi.index')->with('success_edit_data', 'Data berhasil diubah');
        }
}
    public function destroy($id)
    {
        $prestasi = Prestasi::find($id);
        $prestasi->delete();

        if (Auth::user()->role == 'superadmin') {
            return redirect()->route('superadmin.prestasi.index')->with('success_delete_data', 'Data berhasil dihapus');
        } else if (Auth::user()->role == 'kemahasiswaan') {
            return redirect()->route('kemahasiswaan.prestasi.index')->with('success_delete_data', 'Data berhasil dihapus');
        }
    }
    
    public function getChartData()
    {
        $prestasiData = Prestasi::with('prodi')->get();
    
        // Get unique prodi names
        $labels = $prestasiData->map(function($item) {
            return $item->prodi->prodi; 
        })->unique()->values();
    
        // Group by prodi and count the number of prestasi per prodi
        $prestasiCountByProdi = $prestasiData->groupBy('prodi.prodi')->map(function($group) {
            return $group->count();
        });
    
        return response()->json([
            'labels' => $labels,
            'prestasiCount' => $labels->map(function($label) use ($prestasiCountByProdi) {
                return $prestasiCountByProdi->get($label, 0);
            }),
        ]);
    }
    

    public function export() 
    {
        return Excel::download(new PrestasiExport, 'prestasi.xlsx');
    }
}
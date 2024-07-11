<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prodi;
use App\Models\Prestasi;
use App\Models\Kegiatan;
use App\Models\FormTA;
use App\Models\FormKP;
use App\Models\FormKHS;
use App\Models\FormLegal;
use App\Models\FormSTM;
use App\Models\FormWcr;
use App\Models\FormRekom;
use App\Models\FormBukrim;

class HomeController extends Controller
{
    public function index()
    {
        return view('client.index');
    }

    public function data()
    {
        return view('client.data');
    }

    public function kegiatan()
    {
        $kegiatan = Kegiatan::all();
        $prodi = Prodi::all();
        return view('client.kegiatan', compact('prodi', 'kegiatan'));
    }

    public function UploadKegiatan(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'email' => 'required',
            'nama_kegiatan' => 'required',
            'tgl_kegiatan' => 'required',
            'mulai_kegiatan' => 'required',
            'akhir_kegiatan' => 'required',
            'tempat_pelaksanaan' => 'required',
            'jumlah_peserta' => 'required',
            'penanggung_jawab' => 'required',
            'nama_pemohon' => 'required',
            'no_hp' => 'required',
            'surat_izin' => 'required|mimes:pdf|max:2048',
        ]);

        $kegiatan = new Kegiatan;
        $kegiatan->prodi_id = $request->prodi_id;
        $kegiatan->email = $request->email;
        $kegiatan->nama_kegiatan = $request->nama_kegiatan;
        $kegiatan->tgl_kegiatan = $request->tgl_kegiatan;
        $kegiatan->mulai_kegiatan = $request->mulai_kegiatan;
        $kegiatan->akhir_kegiatan = $request->akhir_kegiatan;
        $kegiatan->tempat_pelaksanaan = $request->tempat_pelaksanaan;
        $kegiatan->jumlah_peserta = $request->jumlah_peserta;
        $kegiatan->penanggung_jawab = $request->penanggung_jawab;
        $kegiatan->nama_pemohon = $request->nama_pemohon;
        $kegiatan->no_hp = $request->no_hp;
        $kegiatan->surat_izin = $request->surat_izin;
        if ($request->hasFile('surat_izin')) {
            $surat_izin = $request->file('surat_izin');
            $file_name = date('d-m-Y', strtotime('+7 hours')) . '_Surat_Izin_' . $kegiatan->nama_kegiatan . '.' . $surat_izin->getClientOriginalExtension();
            $kegiatan->surat_izin = $file_name;
            $kegiatan->update();
            $surat_izin->move('../public/assets/surat_izin/', $file_name);
        }

        $kegiatan->save();
        // dd($kegiatan);

        return back()->with('success_create_data', 'Selamat! Data Pengajuan Kegiatanmu Berhasil');
    }

    public function kontak()
    {
        return view('client.kontak');
    }

    public function pengajuan()
    {
        $formta = FormTA::all();
        $formkp = FormKP::all();
        $formkhs = FormKHS::all();
        $formlegal = FormLegal::all();
        $formstm = FormSTM::all();
        $formwcr = FormWcr::all();
        $formrekom = FormRekom::all();
        $formbukrim = FormBukrim::all();
        $prodi = Prodi::all();
        return view('client.pengajuan', compact('formta', 'formkp', 'formkhs', 'formlegal', 'formstm', 'formwcr', 'formrekom', 'formbukrim', 'prodi'));
    }

    public function prestasi()
    {
        $prodi = Prodi::all();
        return view('client.prestasi', compact('prodi'));
    }

    public function UploadPrestasi(Request $request)
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
            'foto.*' => 'required|mimes:jpg,jpeg,png|max:2048',
            // Perhatikan bahwa Anda memerlukan setidaknya 3 foto
            'foto' => 'required|array|min:3',
        ]);

        $prestasi = new Prestasi;
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

        if ($request->hasFile('foto')) {
            $fotoPaths = [];
            foreach ($request->file('foto') as $key => $foto) {
                $file_name = date('d-m-Y', strtotime('+7 hours')) . '_Foto_' . ($key + 1) . '_' . $prestasi->nim . '.' . $foto->getClientOriginalExtension();
                $fotoPaths[] = $file_name;
                $foto->move(public_path('assets/foto/'), $file_name);
            }
            $prestasi->foto = json_encode($fotoPaths); // menyimpan nama file sebagai string JSON
        }

        $prestasi->save();

        return back()->with('success_create_data', 'Selamat! Data Prestasimu Berhasil Ditambah');
    }


    public function tentang()
    {
        return view('client.tentang');
    }

    // public function formta()
    // {
    //     $formta = FormTA::all();
    //     $prodi = Prodi::all();
    //     return view('client.form-ta', compact('formta', 'prodi'));
    // }

    // public function UploadFormTA (Request $request)
    // {
    //     $request->validate([
    //         'prodi_id' => 'required',
    //         'nama' => 'required',
    //         'nim' => 'required',
    //         'keperluan' => 'required',
    //         'instansi' => 'required',
    //         'alamat_instansi' => 'required',
    //         'tjp' => 'nullable',
    //         'pelaksanaan' => 'required',
    //         'waktu_mulai_pelaksanaan' => 'required',
    //         'waktu_akhir_pelaksanaan' => 'required',
    //         'no_hp' => 'required',
    //         'email' => 'required',
    //         'nama_pembimbing_satu' => 'required',
    //         'nama_pembimbing_dua' => 'required',
    //         'judul' => 'required',
    //     ]);

    //     $formta = new FormTA;
    //     $formta->prodi_id = $request->prodi_id;
    //     $formta->nama = $request->nama;
    //     $formta->nim = $request->nim;
    //     $formta->keperluan = $request->keperluan;
    //     $formta->instansi = $request->instansi;
    //     $formta->alamat_instansi = $request->alamat_instansi;
    //     $formta->tjp = $request->tjp;
    //     $formta->pelaksanaan = $request->pelaksanaan;
    //     $formta->waktu_mulai_pelaksanaan = $request->waktu_mulai_pelaksanaan;
    //     $formta->waktu_akhir_pelaksanaan = $request->waktu_akhir_pelaksanaan;
    //     $formta->no_hp = $request->no_hp;
    //     $formta->email = $request->email;
    //     $formta->nama_pembimbing_satu = $request->nama_pembimbing_satu;
    //     $formta->nama_pembimbing_dua = $request->nama_pembimbing_dua;
    //     $formta->judul = $request->judul;
    //     $formta->save();

    //     return back()->with('success_create_data', 'Selamat! Data Pengajuan Tugas Akhirmu Berhasil');
    // }

    // public function formkp()
    // {
    //     $formkp = FormKP::all();
    //     $prodi = Prodi::all();
    //     return view('client.form-kp', compact('formkp', 'prodi'));
    // }

    // public function UploadFormKP (Request $request)
    // {
    //     $request -> validate([
    //         'prodi_id' => 'required',
    //         'nama' => 'required',
    //         'nim' => 'required',
    //         'instansi' => 'required',
    //         'alamat_instansi' => 'required',
    //         'tjp' => 'nullable',
    //         'waktu_mulai_pelaksanaan' => 'required',
    //         'waktu_akhir_pelaksanaan' => 'required',
    //         'no_hp_mhs' => 'required',
    //         'email' => 'required',
    //     ]);

    //     $formkp = new FormKP;
    //     $formkp->prodi_id = $request->prodi_id;
    //     $formkp->nama = $request->nama;
    //     $formkp->nim = $request->nim;
    //     $formkp->instansi = $request->instansi;
    //     $formkp->alamat_instansi = $request->alamat_instansi;
    //     $formkp->tjp = $request->tjp;
    //     $formkp->waktu_mulai_pelaksanaan = $request->waktu_mulai_pelaksanaan;
    //     $formkp->waktu_akhir_pelaksanaan = $request->waktu_akhir_pelaksanaan;
    //     $formkp->no_hp_mhs = $request->no_hp_mhs;
    //     $formkp->email = $request->email;
    //     $formkp->save();

    //     return back()->with('success_create_data', 'Selamat! Data Pengajuan Kerja Praktekmu Berhasil');
    // }


    // public function formkhs()
    // {
    //     $formkhs = FormKHS::all();
    //     $prodi = Prodi::all();
    //     return view('client.form-khs', compact('formkhs', 'prodi'));
    // }

    // public function UploadFormKHS (Request $request)
    // {
    //     $request->validate([
    //         'prodi_id' => 'required',
    //         'nama' => 'required',
    //         'nim' => 'required',
    //         'no_hp_mhs' => 'required',
    //         'email' => 'required',
    //         'keperluan' => 'required',
    //         'jumlah' => 'required',
    //     ]);

    //     $formkhs = new FormKHS;
    //     $formkhs->prodi_id = $request->prodi_id;
    //     $formkhs->nama = $request->nama;
    //     $formkhs->nim = $request->nim;
    //     $formkhs->no_hp_mhs = $request->no_hp_mhs;
    //     $formkhs->email = $request->email;
    //     $formkhs->keperluan = $request->keperluan;
    //     $formkhs->jumlah = $request->jumlah;
    //     $formkhs->save();

    //     return back()->with('success_create_data', 'Selamat! Data Pengajuan KHS/Transkrip/Dokumenmu Berhasil');
    // }

    public function formlegal()
    {
        $formlegal = FormLegal::all();
        $prodi = Prodi::all();
        return view('client.form-legal', compact('formlegal', 'prodi'));
    }

    public function UploadFormLegal(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'no_hp_mhs' => 'required',
            'email' => 'required',
            'keperluan' => 'required',
            'jumlah_legal' => 'required',
        ]);

        $formlegal = new FormLegal;
        $formlegal->prodi_id = $request->prodi_id;
        $formlegal->nama = $request->nama;
        $formlegal->nim = $request->nim;
        $formlegal->no_hp_mhs = $request->no_hp_mhs;
        $formlegal->email = $request->email;
        $formlegal->keperluan = $request->keperluan;
        $formlegal->jumlah_legal = $request->jumlah_legal;
        $formlegal->save();

        return back()->with('success_create_data', 'Selamat! Data Pengajuan Legalisirmu Berhasil');
    }

    public function formstm()
    {
        $formstm = FormSTM::all();
        $prodi = Prodi::all();
        return view('client.form-stm', compact('formstm', 'prodi'));
    }

    public function UploadFormSTM(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'nullable',
            'instansi' => 'required',
            'tgl_bls' => 'required',
            'tgl_mulai_pelaksanaan' => 'required',
            'tgl_akhir_pelaksanaan' => 'required',
            'jenis_surat_tugas' => 'required',
        ]);

        $formstm = new FormSTM;
        $formstm->prodi_id = $request->prodi_id;
        $formstm->nama = $request->nama;
        $formstm->nim = $request->nim;
        $formstm->instansi = $request->instansi;
        $formstm->tgl_bls = $request->tgl_bls;
        $formstm->tgl_mulai_pelaksanaan = $request->tgl_mulai_pelaksanaan;
        $formstm->tgl_akhir_pelaksanaan = $request->tgl_akhir_pelaksanaan;
        $formstm->jenis_surat_tugas = $request->jenis_surat_tugas;
        $formstm->save();

        return back()->with('success_create_data', 'Selamat! Data Pengajuan Surat Tugasmu Berhasil');
    }

    public function formwcr()
    {
        $formwcr = FormWcr::all();
        $prodi = Prodi::all();
        return view('client.form-wcr', compact('formwcr', 'prodi'));
    }

    public function UploadFormWcr(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
        ]);

        $formwcr = new FormWcr;
        $formwcr->prodi_id = $request->prodi_id;
        $formwcr->nama = $request->nama;
        $formwcr->nim = $request->nim;
        $formwcr->instansi = $request->instansi;
        $formwcr->alamat_instansi = $request->alamat_instansi;
        $formwcr->save();

        return back()->with('success_create_data', 'Selamat! Data Pengajuan Wawancaramu Berhasil');
    }

    public function formrekom()
    {
        $formrekom = FormRekom::all();
        $prodi = Prodi::all();
        return view('client.form-rekom', compact('formrekom', 'prodi'));
    }

    public function UploadFormRekom(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'no_hp_mhs' => 'required',
            'instansi' => 'required',
            'alamat_instansi' => 'required',
            'jerekom' => 'required',
            'deskripsi' => 'required',
        ]);

        $formrekom = new FormRekom;
        $formrekom->prodi_id = $request->prodi_id;
        $formrekom->nama = $request->nama;
        $formrekom->nim = $request->nim;
        $formrekom->no_hp_mhs = $request->no_hp_mhs;
        $formrekom->instansi = $request->instansi;
        $formrekom->alamat_instansi = $request->alamat_instansi;
        $formrekom->jerekom = $request->jerekom;
        $formrekom->deskripsi = $request->deskripsi;
        $formrekom->save();

        return back()->with('success_create_data', 'Selamat! Data Pengajuan Rekomendasimu Berhasil');
    }

    public function formbukrim()
    {
        $formbukrim = FormBukrim::all();
        $prodi = Prodi::all();
        return view('client.form-bukrim', compact('formbukrim', 'prodi'));
    }

    public function UploadFormBukrim(Request $request)
    {
        $request->validate([
            'prodi_id' => 'required',
            'nama_dok' => 'required',
            'nama' => 'required',
            'nim' => 'required',
            'jenis_berkas' => 'required',
            'jumlah_dok' => 'required',
        ]);

        $formbukrim = new FormBukrim;
        $formbukrim->prodi_id = $request->prodi_id;
        $formbukrim->nama_dok = $request->nama_dok;
        $formbukrim->nama = $request->nama;
        $formbukrim->nim = $request->nim;
        $formbukrim->jenis_berkas = $request->jenis_berkas;
        $formbukrim->jumlah_dok = $request->jumlah_dok;
        $formbukrim->save();

        return back()->with('success_create_data', 'Selamat! Data Pengajuan Bukti Penerimaan Berkasmu Berhasil');
    }

}

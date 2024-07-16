<?php

namespace App\Http\Controllers\Dosen;


use App\Http\Controllers\Controller;
use App\Models\FormTA;
use App\Models\Prodi;
use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardDosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $dosen = Dosen::where('email', $user->email)->first();
        $mahasiswa = Mahasiswa::where('id_dosen_wali', $dosen->nip_nrk)->get();
        
        $formta = collect(); // Inisialisasi koleksi kosong untuk menyimpan data FormTA

        foreach ($mahasiswa as $mhs) {
            $formtaMahasiswa = FormTA::where('nim', $mhs->nim)
                ->where('status', 'diproses')
                ->where('dosen_wali', false)
                ->get();
            $formta = $formta->merge($formtaMahasiswa); // Menggabungkan data FormTA ke koleksi
        }

        $prodi = Prodi::all();
        return view('dosen.dashboard', compact('formta', 'prodi'));
        // return $formta;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

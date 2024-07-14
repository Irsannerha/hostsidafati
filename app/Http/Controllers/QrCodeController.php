<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    public function show()
    {
        // $data = "Nama : Bendry Lakburlawal\nNIM : 121140111\nAlamat : Surabaya\nTanggal : 12-11-2024\nPengajuan TA";
        // return view('mahasiswa.data', compact('data'));
    }

}

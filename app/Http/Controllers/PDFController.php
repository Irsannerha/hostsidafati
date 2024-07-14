<?php

namespace App\Http\Controllers;

use PDF;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = "Nama : Henry Carngie\nNIM : 121140054\nAlamat : Kulon\nTanggal : 12-11-2024\nPengajuan TA";
        $qrCode = base64_encode(QrCode::format('svg')->size(300)->generate($data));

        $pdf = PDF::loadView('pdf.pengajuanTA', ['data' => $data, 'qrCode' => $qrCode]);
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        return $pdf->stream('qrcode.pdf');
        // return view('pdf.pengajuanTA', compact('data', 'qrCode'));
    }

}

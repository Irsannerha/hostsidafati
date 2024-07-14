<head>
    <title>Permohonan Cuti Akademik</title>
    <style>
        .container {
            margin: 0 auto;
            font-size: 14px;
        }

        .header {
            margin-bottom: 20px;
        }

        .footer {
            position: absolute;
            bottom: -10;
        }

        .content {
            margin-bottom: 10px;
        }

        .content p {
            margin: 5px 0;
        }

        .signature {
            margin-top: 20px;
            position: absolute;
            right: 40;
        }

        table {
            border-collapse: collapse;
            width: 80%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            text-align: center;
        }

        th {
            font-weight: normal;
        }

        td {
            width: 200px;
        }

        .qrcode {
            width: 80px;
            height: 80px;
            margin: 10px auto;
        }

        .line {
            margin-bottom: 5px;
            clear: both;
        }

        .label,
        .separator,
        .value {
            display: inline-block;
        }

        .label {
            width: 90px;
        }

        .identitas {
            font-weight: bold;
        }

        .separator {
            text-align: center;
            width: 10px;
        }

        .value {
            width: calc(100% - 130px);
            text-align: justify;
        }

        .long {
            max-width: 70%;
            vertical-align: top;
        }

        .section2 .label {
            width: 150px;
            /* Adjust as needed for the second section */
        }
    </style>
</head>
<x-pdf-app>
    <main class="container">
        <div class="header">
            <div class="line">
                <span class="label">Nomor</span>
                <span class="separator">:</span>
                <span class="value"></span>
            </div>
            <div class="line">
                <span class="label">Lampiran</span>
                <span class="separator">:</span>
                <span class="value">1 (satu) berkas</span>
            </div>
            <div class="line">
                <span class="label">Hal</span>
                <span class="separator">:</span>
                <span class="value">Permohonan Cuti Akademik</span>
            </div>
        </div>
        <div class="content">
            <p>Yth. Rektor Institut Teknologi Sumatera</p>
            <p>u.p. Wakil Rektor Bidang Akademik dan Kemahasiswaan</p>
            <p>di</p>
            <p>Institut Teknologi Sumatera</p>
            <br>

            <div class="section2">
                <div class="line">Saya yang bertanda tangan di bawah ini:</div>
                <div class="line">
                    <span class="label identitas">Nama</span>
                    <span class="separator">:</span>
                    <span class="value">Bendr</span>
                </div>
                <div class="line">
                    <span class="label identitas">NIM</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label identitas">Fakultas/Prodi</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label identitas long">Alamat Lengkap</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line">
                    <span class="label identitas long">Alasan Cuti Akademik</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line">Dengan ini mengajukan cuti akademik pada Semester Ganjil/Genap* Tahun
                    Akademik 20....
                    / 20....</div>
            </div>
        </div>
        <table>
            <thead>
                <tr>
                    <th colspan="3">Disetujui oleh</th>
                </tr>
                <tr>
                    <th>Dosen wali</th>
                    <th>Koordinator Prodi</th>
                    <th>Dekan</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"></td>
                    <td><img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"></td>
                    <td><img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"></td>
                </tr>
                <tr>
                    <td>Prof. Dr. Bendry Lakburlawal, S.Kom, M.Eng, M.Sc, M.Th</td>
                    <td>...........</td>
                    <td>...........</td>
                </tr>
            </tbody>
        </table>
        <div class="content">
            <p>Bersama ini saya lampirkan persyaratan sebagai berikut:</p>
            <p>1. Fotokopi identitas diri (KTP/KTM)</p>
            <p>2. Bukti lunas pembayaran sampai dengan semester terakhir dilegalisasi oleh Unit Keuangan</p>
            <p>3. KHS semester terakhir dan Transkrip Nilai sampai dengan semester terakhir dilegalisasi Fakultas
            </p>
            <p>4. Surat bebas pinjam Perpustakaan</p>
            <br>
            <p>Demikian permohonan ini saya sampaikan. Atas perhatian dan perkenan Bapak/Ibu, saya ucapkan terima
                kasih.</p>
        </div>
        <div class="signature">
            <p>Lampung Selatan, .................................................</p>
            <p>Mahasiswa yang mengajukan,</p>
            <br><br><br>
            <p>..............................................................</p>
            <p>NIM .........................................................</p>
        </div>
        <div class="footer">
            <p>Catatan: <i>*coret salah satu</i></p>
        </div>
    </main>
</x-pdf-app>

<head>
    <title>Surat Pengajuan Pengantar Kerja Praktik</title>
    <style>
        @page {
            /* create space for header */

            margin: 172px 60px 80px 60px !important;

            /* create space for footer */
        }

        .container {
            margin: 0 auto;
        }

        .header {
            margin-bottom: 30px;
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            font-size: 18px;
        }

        .content {
            margin-bottom: 10px;
            font-size: 16px;
        }

        .content .syarat {
            margin: 10px 0px 0px 20px;
        }

        .content p {
            margin-bottom: 5px;
        }

        .date {
            text-align: right;
            margin-top: 10px;
        }

        .qrcode {
            width: 80px;
            height: 80px;
            margin: 10px auto;
        }

        .line {
            margin-bottom: 15px;
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

        .separator {
            text-align: center;
            width: 10px;
        }

        .value {
            width: calc(100% - 130px);
            text-align: justify;
        }

        .long {
            max-width: 68%;
            vertical-align: top;
        }

        .section2 .label {
            width: 180px;
            /* Adjust as needed for the second section */
        }

        table {
            width: 100%;
            margin-top: 20px;
            font-size: 16px;
        }

        th {
            width: 45%;
            text-align: left !important;
            font-weight: normal;
        }

        th,
        td {
            padding-left: 5px;
        }

        th:first-child,
        td:first-child {
            padding-left: 0px !important;
        }

        .qrcode {
            margin: 5px 15px;
        }
    </style>
</head>
<x-pdf-app>
    <main class="container">
        <div class="header">
            FORM PENGAJUAN SURAT PENGANTAR KERJA PRAKTIK
        </div>
        <div class="content">
            <div class="section2">
                <div class="line">
                    <span class="label long">Nama Lengkap</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line">
                    <span class="label">NIM</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label">Program Studi</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label long">Alamat Lengkap</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line">
                    <span class="label">No. Telepon</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label">Email</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label long">Nama Instansi</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line">
                    <span class="label long">Nama Pimpinan Instansi</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line">
                    <span class="label">Waktu Pelaksanaan</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label long">Alamat Instansi</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line">
                    <span class="label">No. Telepon Instansi</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
            </div>
            <div class="content">
                <div>Sebagai bahan pertimbangan, saya lampirkan persyaratan yang ditetapkan : </div>
                <div class="syarat">
                    <p>1. Surat pengantar dari program studi;</p>
                    <p>2. Transkrip Nilai</p>
                </div>
            </div>

        </div>
        <div class="date">Lampung, Selasa, 31 Desember 2029</div>
        <table>
            <thead>
                <tr>
                    <th>Mengetahui,</th>
                    <th colspan="2">Menyetujui,</th>
                </tr>
                <tr>
                    <th>Dosen Wali</th>
                    <th>Koordinator KP Prodi</th>
                    <th>Mahasiswa Ybs,</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"></td>
                    <td><img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"></td>
                    <td><img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"></td>
                </tr>
                <tr class="name">
                    <td>Dr. Eng. Feerzet Achmad Bendry Lakburlawal, S.T., M.T.</td>
                    <td>Dr. Eng. Feerzet Achmad, S.T., M.T.</td>
                    <td>Dr. Eng. Feerzet Achmad, S.T., M.T.</td>

                </tr>
                <tr class="no-id">
                    <td>NIP/NRK. 1975041720171091</td>
                    <td>NIP/NRK. 1975041720171091</td>
                    <td>NIM. 121140111111 </td>
                </tr>
            </tbody>
        </table>
    </main>
</x-pdf-app>
<head>
    <title>Permohonan Cuti Akademik</title>
    <style>
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
        }

        th:first-child,
        th:last-child {
            width: 230px;
            text-align: left;
            font-weight: normal;
        }

        .qrcode {
            margin: 5px 15px;
        }
    </style>
</head>
<x-pdf-app>
    <main class="container">
        <div class="header">
            FORM PENGAJUAN SURAT REKOMENDASI
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
                    <span class="label">No. Telepon/HP</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label">Email</span>
                    <span class="separator">:</span>
                    <span class="value"></span>
                </div>
                <div class="line">
                    <span class="label long">Prestasi bidang Akademik & Non Akademik yang pernah
                        dicapai</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line">
                    <span class="label long">Program yang akan diikuti</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
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
                    <th colspan="4">Mengetahui</th>
                </tr>
                <tr>
                    <th>Dosen wali</th>
                    <th></th>
                    <th></th>
                    <th>Mahasiswa Ybs,</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"></td>
                    <td></td>
                    <td></td>
                    <td><img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code"></td>
                </tr>
                <tr>
                    <td>Bendry Lakburlawal, svdvdvsdv dsbddvf dbsdfds</td>
                    <td></td>
                    <td></td>
                    <td>Rin Takahashri dfasvasv advas vvsvas</td>
                </tr>
                <tr>
                    <td>NIP/NRK. 1211401111132425354</td>
                    <td></td>
                    <td></td>
                    <td>NIM. 121140111111 </td>
                </tr>
            </tbody>
        </table>
    </main>
</x-pdf-app>

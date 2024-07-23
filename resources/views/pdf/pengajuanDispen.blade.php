<head>
    <title>Permohonan Dispensasi</title>
    <style>
        .container {
            margin: 0 auto !important;
            font-size: 16px;
            line-height: 1.3;
        }

        .header {
            margin-bottom: 10px;
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
            font-size: 18px;
        }

        .content {
            margin-bottom: 10px;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 98%;
            position: relative;
        }

        .signature {
            border: none !important;
            width: 100%;
            margin-top: 8px !important;
        }

        .head,
        .data {
            border: 1px solid black;
            font-size: 14px;
        }

        .data {
            padding: 5px auto !important;
            text-align: center;
        }

        .qrcode {
            width: 80px;
            height: 80px;
            margin: 5px auto 5px 10px;
        }

        .line {
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

        .date {
            text-align: right;
            margin-top: 10px;
        }

        .title {
            border: 1px solid black;
            padding-left: 2px;
            font-size: 14px;
        }
    </style>
</head>
<x-pdf-app>
    <main class="container">
        <div class="header">
            PERMOHONAN DISPENSASI KULIAH
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
                    <span class="label long">Dosen Wali</span>
                    <span class="separator long">:</span>
                    <span class="value long"></span>
                </div>
                <div class="line" style="margin-top: 5px">
                    <p>Mata kuliah yang ditinggalkan</p>
                </div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th class="head" style="width: 40px;">No</th>
                                <th class="head">Mata kuliah</th>
                                <th class="head" style="width: 100px;">Hari</th>
                                <th class="head" style="width: 150px;">Jam</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="data">1</td>
                                <td class="data">Pemrograman Website Bla bla bla</td>
                                <td class="data">Kamis</td>
                                <td class="data">13:45 - 14:30</td>
                            </tr>
                            <tr>
                                <td class="data">1</td>
                                <td class="data">Pemrograman Website Bla bla bla</td>
                                <td class="data">Kamis</td>
                                <td class="data">13:45 - 14:30</td>
                            </tr>
                            <tr>
                                <td class="data">1</td>
                                <td class="data">Pemrograman Website Bla bla bla</td>
                                <td class="data">Kamis</td>
                                <td class="data">13:45 - 14:30</td>
                            </tr>
                            <tr>
                                <td class="data">1</td>
                                <td class="data">Pemrograman Website Bla bla bla</td>
                                <td class="data">Kamis</td>
                                <td class="data">13:45 - 14:30</td>
                            </tr>
                            <tr>
                                <td class="data">1</td>
                                <td class="data">Pemrograman Website Bla bla bla</td>
                                <td class="data">Kamis</td>
                                <td class="data">13:45 - 14:30</td>
                            </tr>
                            <tr>
                                <td class="data">1</td>
                                <td class="data">Pemrograman Website Bla bla bla</td>
                                <td class="data">Kamis</td>
                                <td class="data">13:45 - 14:30</td>
                            </tr>
                            <tr>
                                <td class="data">1</td>
                                <td class="data">Pemrograman Website Bla bla bla</td>
                                <td class="data">Kamis</td>
                                <td class="data">13:45 - 14:30</td>
                            </tr>
                            <tr>
                                <td class="data">1</td>
                                <td class="data">Pemrograman Website Bla bla bla</td>
                                <td class="data">Kamis</td>
                                <td class="data">13:45 - 14:30</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="line" style="margin-top: 8px">
                    <p>Durasi pengajuan dispensasi : Tanggal, 30 Desember 2024 s/d 30 Januari 2025</p>
                </div>
                <div class="line" style="margin-top: 8px">
                    <p>Alasan : Lorem, ipsum dolor sit amet consectetur adipisicing elit. Minima velit saepe sequi error
                        dolores voluptas sint deleniti consectetur vel ab rem tempore praesentium, explicabo eveniet
                        voluptate non ut et nulla!</p>
                </div>
            </div>
        </div>
        <div class="content">
            <p>Sebagai bahan pertimbangan, saya lampirkan persyaratan yang ditetapkan :</p>
            <p style="margin-left: 60px;">1. Surat pernyataan tulis tangan.</p>
            <p style="margin-left: 60px;">2. Surat undangan, jika ada</p>
        </div>
        <div class="date">Lampung, Selasa, 31 Desember 2029</div>
        <table class="signature">
            <thead>
                <tr>
                    <th style="font-weight: normal;" colspan="4">Mengetahui,</th>
                </tr>
                <tr>
                    <th style="text-align: left; font-weight: normal;">Koor. Program Studi</th>
                    <th></th>
                    <th></th>
                    <th style="text-align: left; font-weight: normal;">Dosen Wali,</th>
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
                    <td>NIP. 1211401111132425354</td>
                    <td></td>
                    <td></td>
                    <td>NIP. 121140111111 </td>
                </tr>
            </tbody>
        </table>

    </main>
</x-pdf-app>
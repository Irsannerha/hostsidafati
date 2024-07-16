<head>
    <title>Permohonana Surat Pengantar Kerja Praktek 2</title>
    <style>
        .container {
            margin: 0 auto;
            font-size: 16px;
            line-height: 1.5;
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

        .signature {
            margin-top: 20px;
            position: absolute;
            right: 40;
        }

        table {
            border: 1px solid black;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid black;
            text-align: center;
            padding: 5px 0;
        }

        th:not(th:first-child),
        td:not(td:first-child) {
            width: 100px;
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

        .date {
            position: absolute;
            right: 0;
            top: -4;
        }
    </style>
</head>
<x-pdf-app>
    <main class="container">
        <div class="header">
            <div class="line">
                <span class="label">Lampiran</span>
                <span class="separator">:</span>
                <span class="value">-</span>
            </div>
            <div class="line">
                <span class="label">Perihal</span>
                <span class="separator">:</span>
                <span class="value">Pengantar Kerja Praktik</span>
            </div>
        </div>
        <p class="date">Lampung Selatan, Selasa 31 Desember 2030</p>
        <div class="content">
            <p>Yth.</p>
            <p>Dekan Fakultas Teknologi Industri</p>
            <p>Institut Teknologi Sumatera</p>
            <br>

            <div class="section2">
                <div class="line">Dengan Hormat,</div>
                <div class="line">Berdasarkan petunjuk pelaksanaan Mata Kuliah Kerja Praktik, bahwa dalam pengajuan
                    kegitatan Kerja Praktik, mahasiswa diwajibkan memenuhi persyaratan Kerja Praktik, Maka bersamaan
                    dengan surat ini kami menyampaikan bahwa di bawah ini :</div>
                <div>
                    <table>
                        <thead>
                            <tr>
                                <th class="nomor">NO</th>
                                <th>NAMA</th>
                                <th>NIM</th>
                                <th>PRODI</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Bendry Lakburlawal</td>
                                <td>121140111</td>
                                <td>Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Bendry Lakburlawal</td>
                                <td>121140111</td>
                                <td>Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Bendry Lakburlawal</td>
                                <td>121140111</td>
                                <td>Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Bendry Lakburlawal</td>
                                <td>121140111</td>
                                <td>Teknik Informatika</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Bendry Lakburlawal</td>
                                <td>121140111</td>
                                <td>Teknik Informatika</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="content">
            <p>Dinyatakan sudah <strong>MEMENUHI SYARAT</strong> untuk melaksanakan Mata Kuliah Kerja Praktik. Demikian
                surat ini kami
                sampaikan agar
                dapat diperguakan sebagaimana mestinya.
                Atas perhatian dan kerjasama yang baik, kami ucapkan terima kasih.</p>
        </div>
        <div class="signature">
            <p>Koordinator Program Studi</p>
            <img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code">
            <p>Stevy Canny Louhenapessy, S.T., M.T.</p>
            <p>NIP/NRK. 199105132022031006</p>
        </div>
    </main>
</x-pdf-app>
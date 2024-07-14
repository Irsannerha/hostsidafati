<head>
    <title>Pengantar Rekomendasi Dekan</title>
    <style>
        .container {
            margin: 0 auto;
            font-size: 16px;
        }

        .header {
            margin-bottom: 20px;
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
            right: 0;
        }

        .qrcode {
            width: 80px;
            height: 80px;
            margin: 10px 15px;
        }

        .line {
            margin-bottom: 7px;
            clear: both;
            text-align: justify;
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
            margin-left: 20px;
            margin-top: 15px;
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
            top: 0;
        }

        .line-height {
            line-height: 20px;
            margin-top: 10px;
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
                <span class="value">Pengantar Rekomendasi Dekan</span>
            </div>
            <p class="date">Lampung Selatan, Selasa 31 Desember 2030</p>
        </div>
        <div class="content">
            <p>Yth. Dekan</p>
            <p>Institut Teknologi Sumatera</p>
            <br>

            <div class="section2">
                <div class="line">
                    <p>Dengan hormat,</p>
                    <p class="line-height">Sehubungan dengan akan diadakannya Program
                        <span>.....</span> dengan
                        ini menyatakan bahwa
                        mahasiswa berikut merupakan mahasiswa Program Studi <span>....</span>, Fakultas Teknologi
                        Industri Institut Teknologi Sumatera (ITERA)
                    </p>
                </div>
                <div class="identitas">
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
                        <span class="label">Semester</span>
                        <span class="separator">:</span>
                        <span class="value"></span>
                    </div>
                    <div class="line">
                        <span class="label">IPK</span>
                        <span class="separator">:</span>
                        <span class="value"></span>
                    </div>
                </div>
                <div class="line">
                    <p class="line-height">
                        dengan ini kami memohon kepada Dekan Fakultas Teknologi Industri, Institut Teknologi Sumatera
                        (ITERA) untuk dibuatkannya surat rekomendasi dari Fakultas untuk mahasiswa tersebut yang akan
                        mengikuti Program <span>.....</span>
                    </p>
                    <p style="margin-top: 20px">Demikian Surat Pengantar ini kami buat, atas perhatian dan kerjasamannya
                        kami
                        ucapkan
                        terimakasih.</p>
                </div>
            </div>
        </div>

        <div class="signature">
            <p>Koordinator Program Studi</p>
            <img class="qrcode" src="data:image/svg+xml;base64,{{ $qrCode }}" alt="QR Code">
            <p>Agus adfs vsdfgs fdsbd vfdsvd dgfbdf bgdfgb bfd</p>
            <p>NIP/NRK 1343353443353353254553</p>
        </div>
    </main>
</x-pdf-app>

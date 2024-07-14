<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pdf.css">
</head>

<body>
    <header class="header-container">
        <div class="flex-container">
            <img class="logo" src="img/Logo_ITERA.png" alt="Logo ITERA" />
            <div class="text-container">
                <p class="kementerian">
                    KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI
                </p>
                <p class="itera">
                    INSTITUT TEKNOLOGI SUMATERA
                </p>
                <p class="alamat">
                    Jalan Terusan Ryacudu Way Hui, Kecamatan Jati Agung,
                    Lampung Selatan 35365
                </p>
                <p class="telepon">Telepon: (0721) 8030188</p>
                <p class="email">
                    Email:
                    <a class="situs" href="mailto:pusat@itera.ac.id">
                        pusat@itera.ac.id
                    </a>
                    , Website:
                    <a class="text-blue-600 underline" href="http://itera.ac.id">
                        http://itera.ac.id
                    </a>
                </p>
            </div>
        </div>
    </header>
    <footer class="footer-container">
        <div class="bar bar-black"></div>
        <div class="bar bar-red"></div>
        <div class="bar bar-yellow"></div>
    </footer>
    <div>
        {{$slot}}
    </div>
</body>

</html>

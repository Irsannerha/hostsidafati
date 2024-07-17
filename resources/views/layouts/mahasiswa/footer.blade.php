<style>
    .footer-wrap {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .footer-wrap small {
        margin-top: 10px;
        /* Sesuaikan jarak sesuai kebutuhan */
    }
</style>
<div class="main-container">
    <div class="xs-pd-20-10 pd-ltr-20">
        <div class="footer-wrap pd-20 mb-20 card-box font-weight-bold">
            <div style="text-align: center;">Holistic Administration and Resource Management System </div>
            <small class="text-dark">© <span id="year"></span> HARMONY. All Rights Reserved</small>
        </div>
        <script>
            document.getElementById("year").innerHTML = new Date().getFullYear();
        </script>
    </div>
</div>

<!-- welcome modal start -->
<!-- <div class="welcome-modal btn" data-bgcolor="#d2d6de">
    <button class="welcome-modal-close">
        <i class="bi bi-x-lg"></i>
    </button>
    <iframe class="w-100 border-0" src="https://embed.lottiefiles.com/animation/31548"></iframe>
    <div class="text-center">
        <h3 class="h5 weight-500 text-center mb-2 text-dark">
            Halo, <span class="font-weight-bold">Bendry</span> Selamat Datang di HARMONY
            <span role="img" aria-label="gratitude">❤️</span>
        </h3>
    </div>

    <p class="font-14 text-center mb-1 d-none d-md-block">
        Sistem Informasi ini dibuat untuk memenuhi Tugas Akhir Skripsi saya yang berjudul "HARMONY - Holistic
        Administration and Resource Management System"
        Semoga sistem ini dapat membantu dalam pengelolaan data di Fakultas Teknologi Industri, Institut Teknologi
        Sumatera.
        Terima kasih untuk Bapak dan Ibu semua atas kerjasamanya dalam membantu penelitian saya dan kurang lebihnya saya
        mohon maaf, jika masih banyak kekurangan dalam pembuatan sistem ini.
        Salam Hangat dari saya, Irsan Romardi Harahap NIM 120140043.
    </p>
    <hr>
    <small class="small-font text-dark">Bandar Lampung, 3 April 2024</small>
</div> -->
<!-- <button class="welcome-modal-btn">
Halo 👋 Bendry
</button> -->
<!-- welcome modal end -->
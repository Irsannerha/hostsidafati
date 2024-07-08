function updateDateTime() {
    var currentDate = new Date();
    var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

    var hours = currentDate.getHours();
    var minutes = currentDate.getMinutes();
    var seconds = currentDate.getSeconds();

    var formattedTime = hours.toString().padStart(2, '0') + ':' +
                        minutes.toString().padStart(2, '0') + ':' +
                        seconds.toString().padStart(2, '0');

    var formattedDate = days[currentDate.getDay()] + ', ' +
                        currentDate.getDate() + ' ' +
                        months[currentDate.getMonth()] + ' ' +
                        currentDate.getFullYear() + '  •  ' +
                        'Minggu ke ' + Math.ceil(currentDate.getDate() / 7);

    var greeting;
    if (hours >= 6 && hours < 12) {
        greeting = 'Selamat Pagi';
    } else if (hours >= 12 && hours < 15) {
        greeting = 'Selamat Siang';
    } else if (hours >= 15 && hours < 18) {
        greeting = 'Selamat Sore';
    } else {
        greeting = 'Selamat Malam';
    }

    // Cek apakah pengguna sudah login sebelumnya menggunakan local storage
    var loggedInBefore = localStorage.getItem('loggedIn');
    if (!loggedInBefore) {
        // Jika pengguna belum login sebelumnya, simpan status login dan beri waktu jeda sebelum tampilkan pesan swal
        localStorage.setItem('loggedIn', 'true');
        setTimeout(function() {
            swal({
                position: 'center',
                type: 'success',
                title: greeting + '! Selamat datang kembali di HARMONY!',
                showConfirmButton: false,
                timer: 4000
            });
        }, 3000); // Jeda waktu 3 detik
    }

    const dateElement = document.getElementById('currentDateTime')
    if (dateElement) {
        dateElement.textContent = formattedTime + '  •  ' + formattedDate + '  •  ' + greeting;
    }
}

// Panggil fungsi updateDateTime() setiap detik
setInterval(updateDateTime, 1000);

// Panggil fungsi untuk pertama kali saat halaman dimuat
updateDateTime();

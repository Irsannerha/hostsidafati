  // Simpan elemen dalam variabel
  var customElement = document.querySelector('.back-to-top');

  // Fungsi untuk menampilkan elemen
  function showElement() {
  customElement.classList.add('back-to-top');
  }

  // Fungsi untuk menyembunyikan elemen
  function hideElement() {
  customElement.classList.remove('back-to-top');
  }

  // Event listener untuk menangkap scroll
  window.addEventListener('scroll', function() {
  // Jika pengguna scroll ke atas, tampilkan elemen
  if (window.scrollY > 0) {
      showElement();
  } else {
      // Jika pengguna scroll ke bawah, sembunyikan elemen
      hideElement();
  }
  });
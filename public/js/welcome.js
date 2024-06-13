// Fungsi untuk menampilkan kategori yang dipilih
function tampilkanKategori(kategori) {
    // Semua kategori bawang
    var kategoriBawang = document.querySelectorAll('.kategori-bawang');

    // Sembunyikan semua kategori bawang
    kategoriBawang.forEach(function(element) {
        element.style.display = 'none';
    });

    // Tampilkan kategori yang dipilih
    var kategoriYangDipilih = document.getElementById(kategori);
    kategoriYangDipilih.style.display = 'block';
}

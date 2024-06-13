<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panen Bawang</title>
    <link rel="stylesheet" href="css/welcome.css">
    <link rel="stylesheet" href="js/welcome.js">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet">
</head>
<body>
    <!--bar-->
    <header>
        <img class="logo" src="images/2.png" alt="logo">
        <nav class="nav_links">
            <a href="welcome.blade.php">Beranda</a>
            <a href="login.blade.php">Kategori</a>
            <a href="login.blade.php">Keranjang</a>
        </nav>
        <div class="login">
            <a href="login.blade.php">Get Started</a>
        </div>
    </header>

    <!--Hal 1-->
    <main class="hal1">
        <p>Berasal dari 20++ lahan petani Probolinggo, Nganjuk, dan Brebes dengan Harga Eceran & Grosir Terbaik!</p>
        <img src="images/gambarAwal.png" alt="gambar depan">
        <div class="belanja-sekarang">
            <a href="login.blade.php">Belanja Sekarang</a>
        </div>
    </main>

    <!--Hal 2-->
    <main class="hal2">
        <p class="awal-hal2">3 Kota Penghasil Bawang Tebaik di Indonesia</p>
        <div class="konten-hal2">
            <div class="isi probolinggo">
                <p class="kota">Probolinggo</p>
                <img src="images/petani.jpg" alt="">
                <p class="desk-hal2">Bawang Merah Probolinggo memiliki warna yang lebih gelap, gendut, kadar air yang rendah, dengan rasa yang lebih pedas</p>
                <a href= "login.blade.php" class="read_more pro_read">Read More >>></a>
            </div>
            <div class="isi brebes">
                <p class="kota">Brebes</p>
                <img src="images/petani.jpg" alt="">
                <p class="desk-hal2">Bawang Merah Brebes memiliki warna yang lebih terang, bentuk bulat, kadar air yang rendah, rasa manis, sedikit lebih keras, dengan umur panen 80-90 hari tanam</p>
                <a href= "login.blade.php" class="read_more">Read More >>></a>
            </div>
            <div class="isi nganjuk">
                <p class="kota">Nganjuk</p>
                <img src="images/petani.jpg" alt="">
                <p class="desk-hal2">Bawang Merah Nganjuk memiliki warna yang lebih gelap, bentuk lonjong, kadar air yang tinggi, rasa yang agak tawar, dan umur panen 100-110 hari tanam</p>
                <a href= "login.blade.php" class="read_more">Read More >>></a>
            </div>
        </div>
    </main>

    <!--kategori bawang-->
    <main id="hal-3">
        <p class="awal-hal3">Kategori untuk Anda</p>
        <ul class="kategori">
            <li class="tebal"><label onclick="tampilkanKategori('bawangMerah')">Bawang Merah</label></li>
            <li class="cerah"><label onclick="tampilkanKategori('bawangPutih')">Bawang Putih</label></li>
            <li class="medium"><label onclick="tampilkanKategori('bawangBombay')">Bawang Bombay</label></li>
        </ul>
        <div class="kategori-bawang" id="bawangMerah">
            <div class="eceran">
                <p class="tim-bawang">Tim Eceran</p>
                <div class="konten-hal3">
                    <div class="isi-hal3">
                        <img src="images/tangan.jpg" alt="">
                        <p class="bawang">Bawang Merah </p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Proboliggo</p>
                    </div>
                    <div class="isi-hal3">
                        <img src="images/bamerbrebes.jpg" alt="">
                        <p class="bawang">Bawang Merah</p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Brebes</p>
                    </div>
                    <div class="isi-hal3">
                        <img src="images/bamernganjuk.jpg" alt="">
                        <p class="bawang">Bawang Merah</p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Nganjuk</p>
                    </div>
                </div>
            </div>

            <div class="grosir">
                <p class="tim-bawang">Tim Grosir</p>
                <div class="konten-hal3">
                    <div class="isi-hal3">
                        <img src="images/bamerGrosirProbolinggo.jpeg" alt="">
                        <p class="bawang">Bawang Merah </p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Proboliggo</p>
                    </div>
                    <div class="isi-hal3">
                        <img src="images/bamerGrosirBrebes.jpg" alt="">
                        <p class="bawang">Bawang Merah</p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Brebes</p>
                    </div>
                    <div class="isi-hal3">
                        <img src="images/bamerGrosirNganjuk.jpg" alt="">
                        <p class="bawang">Bawang Merah</p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Nganjuk</p>
                    </div>
                </div>
            </div>
        </div>

        <!--Bawang putih-->
        <div class="kategori-bawang" id="bawangPutih" style="display: none;">
            <div class="eceran">
                <p class="tim-bawang">Tim Eceran</p>
                <div class="konten-hal3">
                    <div class="isi-hal3">
                        <img src="images/bp2.jpg" alt="">
                        <p class="bawang">Bawang Putih </p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Brebes</p>
                    </div>
                </div>
            </div>

            <div class="grosir">
                <p class="tim-bawang">Tim Grosir</p>
                <div class="konten-hal3">
                    <div class="isi-hal3">
                        <img src="images/grosir.jpg" alt="">
                        <p class="bawang">Bawang Putih </p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Brebes</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="kategori-bawang" id="bawangBombay" style="display: none;">
            <div class="eceran">
                <p class="tim-bawang">Tim Eceran</p>
                <div class="konten-hal3">
                    <div class="isi-hal3">
                        <img src="images/bawang bombay.jpg" alt="">
                        <p class="bawang">Bawang Bombay</p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Probolinggo</p>
                    </div>
                </div>
            </div>

            <div class="grosir">
                <p class="tim-bawang">Tim Grosir</p>
                <div class="konten-hal3">
                    <div class="isi-hal3">
                        <img src="images/grosir_bombay.webp" alt="">
                        <p class="bawang">Bawang Bombay </p>
                        <b class="harga">Rp 28.000</b>
                        <p class="kota-beli">Proboliggo</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--hal 4-->
    <main>
        <div class="bundling">
            <p class="awal-hal4">Bundling Lebih Murah!</p>
            <div class="isihal4">
                <div class="backhal4">
                    <div class="konten-hal4">
                        <p class="kategori_bundling">Bawang Putih + Bawang Merah</p>
                        <img src="images/merah putih.jpe" alt="marah-putih">                       
                        <p class="diskon">Diskon 3%</p>
                        <div class="infolengkap">
                            <a href="login.blade.php">Informasi Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="backhal4">
                    <div class="konten-hal4">
                        <p class="kategori_bundling">Bawang Putih + Bawang Bombay</p>
                        <img src="images/putihBombay.jpg" alt="marah-putih">                       
                        <p class="diskon">Diskon 3%</p>
                        <div class="infolengkap">
                            <a href="login.blade.php">Informasi Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!--hal 5-->
    <main class="alasan">
        <p class="awal-hal5">Kenapa Harus Memilih Pawang?</p>
        <div class="wrap-boxes">
            <div class="kelas1">
                <div class="boxes cerah kiri">
                    <h3>20+</h3>
                    <P>Mitra petani</P>
                </div>
                <div class="boxes tebal panjang">
                    <h3>30+</h3>
                    <P>Mitra driver lokal</P>
                </div>
                <div class="boxes medium kanan">
                    <h3>10+</h3>
                    <P>Mitra ekspedisi luar daerah</P>
                </div>
            </div>
            <div class="kelas2">
                <div class="boxes medium kiri">
                    <h3>1-72 jam</h3>
                    <P>Pengiriman ke pelanggan</P>
                </div>
                <div class="boxes cerah panjang">
                    <h3>100+</h3>
                    <P>Pelanggan yang setia</P>
                </div>
                <div class="boxes tebal kanan">
                    <h3>500+</h3>
                    <P>Ulasan kepuasan</P>
                </div>
            </div>
        </div>
    </main>

    <!--hal 6-->
    <main class="hal-6">
        <div class="isi-hal6">
            <div class="wrap-hal6">
                <img src="images/PENUHISTOK.png" alt="">
        </div>
    </main>

    <!--footer-->
    <footer>
        <img class="gambarFooter" src="images/2.png" alt="">
        <div class="tentang-footer">
            <div class="isi-footer">
                <div class="konten-footer">
                    <a href="login.blade.php">Tentang</a>
                    <a href="login.blade.php">Produk</a>
                    <a href="https://wa.me/6281235650928">Contact Us</a>
                </div>
                <p class="jalan">Jl. Mulyorejo Tengah no 45, Surabaya, Jawa Timur, Indonesia</p>
                <p class="hak-cipta">Hak Cipta Bawang 2024</p>
            </div>
        </div>
    </footer> 
    
    <script src="js/welcome.js"></script>
</body>
</html>

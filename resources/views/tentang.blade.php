<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Pawang</title>
    <link rel="stylesheet" href="css/tentang.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
</head>
<body>
    <header>
        <a href="/beranda"><img class="logo" src="images/2.png" alt="logo"></a>
        <nav class="nav_links">
            <a href="/beranda">Beranda</a>
            <div class="drop_down">
                <a href="#">Kategori <i class="fa fa-caret-down"></i></a>
                <div class="drowdown_content">
                    <a href="bawangmerah.blade.php">Bawang Merah</a>
                    <a href="bawangputih.blade.php">Bawang Putih</a>
                    <a href="bawangbombay.blade.php">Bawang Bombay</a>
                    <a href="/bundling_merahputih">Bundling Bawang Merah + Bawang Putih</a>
                    <a href="/bundling_bombayputih">Bundling Bawang Bombay + Bawang Putih</a>
                </div>
            </div>
            <a href="/cart">Keranjang</a>
            <a href="order">Pesanan</a>
        </nav>

        <div class="drop_down">
            <a href="#"><i class="fa-solid fa-bars"></i></i></a>
            <div class="drowdown_content">
                <a href="{{ route('edit_profil') }}">Akun</a>
                <a href="welcome.blade.php">Log Out</a>
            </div>
        </div>
    </header>

    <main>
        <h3>Tentang Pawang (Panen Bawang)</h3>
        <hr>
        <div class="konten">
            <div class="tulisan">
                <p>Pawang atau Panen Bawang adalah sebuah <i>platform</i> untuk menjual hasil perbawangan 
                    petani yang berasal dari Nganjuk, Probolinggo, dan Brebes. Di mana daerah-daerah ini adalah top 10
                    daerah penghasil perbawangan terbaik di Indonesia.</p>
                <p>Semenjak berdiri pada 2023, Pawang telah berhasil bekerja sama dengan 20++ petani
                    dari 3 daerah tersebut. Kami juga melakukan seleksi petani agar bawang yang dihasilkan 
                    petani dan yang dijual oleh Pawang bisa terjamin kualitasnya. 
                </p>
                <p>Selain itu, Pawang bermitra dengan 30++ <i>driver</i> lokal dan 10++ ekspedisi luar kota. 
                    Jumlah mitra ini masih dalam penambahan seiring bertambahnya pesanan dari pelanggan. Namun,
                    kami berfokus pada <i>customer satisfation</i> sehingga waktu pengiriman diestimasikan 
                    antara 1-72 jam menyesuaikan jarak.
                </p>
            </div>
            <div class="gambar">
                <div class="gambar1">
                    <img src="images/pabrik1.jpeg" alt="">
                    <img src="images/grosir.jpg" alt="">
                </div>
                <div class="gambar2">
                    <img src="images/grosir_bombay.webp" alt="">
                    <img src="images/pikul bawang.jpg" alt="">
                </div>
            </div>
        </div>
    </main>

       <!--footer-->
       <footer>
        <img class= "gambarFooter" src="images/2.png" alt="">
        <div class="tentang-footer">
            <div class="isi-footer">
                <div class="konten-footer">
                    <a href="tentang.blade.php">Tentang</a>
                    <a href="beranda.blade.php#hal-3">Produk</a>
                    <a href="https://wa.me/6281235650928">Contact Us</a>
                </div>
                <p class="jalan">Jl. Mulyorejo Tengah no 45, Surabaya, Jawa Timur, Indonesia</p>
                <p class="hak-cipta">Hak Cipta Pawang 2024</p>
            </div>
        </div>
    </footer> 
</body>
</html>
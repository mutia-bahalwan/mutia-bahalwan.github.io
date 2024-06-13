<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Probolinggo</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <style>
        *{
            font-family: 'Poppins';
        }

        html, body{
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #c23f4f; 
            color: white;
            padding: 20px; 
            display: flex;
            justify-content: space-between; 
            align-items: center;
            margin: 0;
        }

        .logo {
            width: 150px;
            height: auto;
            margin-left: 30px; 
        }

        .nav_links{
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .nav_links a {
            color: white; 
            text-decoration: none; 
            margin-right: 10px; 
            margin-left: 10px;
            transition: color 0.3s; 
            padding-left: 30px;
            font-size: 18px;
        }

        .nav_links a:hover {
            color: lightgray;
        }

        .drop_down {
            position: relative; 
        }

        .drop_down .drowdown_content {
            display: none; 
            position: absolute;
            background-color: #c23f4f; 
            min-width: 160px; 
            z-index: 1; 
            right: 0;
        }
        .drop_down:hover .drowdown_content {
            display: block;
        }

        .drop_down .drowdown_content a {
            color: white;
            padding: 12px 16px;
            text-decoration: none; 
            display: block; 
            font-size: 15px;
        }
        .drop_down .drowdown_content a:hover {
            background-color: white;
            color: black;
        }

        .fa-bars{
            font-size: 20px;
            color: white;
            margin-right: 30px;
        }

        h1{
            display: flex;
            justify-content: center;
            color: #c23f4f;
        }

        .teks_probo{
            margin: 0;
            padding: 0;
        }

        .teks_probo::first-letter{
            font-size: 3em;
            line-height: 0.5;
        }

        .gambar{
            height: 250px;
            width: 400px;
            object-fit: cover;
            margin-right: 20px;
        }

        .teks_1{
            display: flex;
            padding: 20px;
            margin-right: 30px;
            text-align: justify;
        }

        .bombay{
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
        .gambar_bombay{
            width: 600px;
            height: 160px;
            object-fit: cover;
        }

        .teks_bombay{
            color: black;
            max-width: 600px;
        }

        hr{
            border-color: #c23f4f;
            max-width: 700px;
        }

        footer {
            background: #BD6261;
            border-radius: 50px 50px 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
        }

        .gambarFooter{
            width: 150px;
            margin-bottom: 10px;
        }

        .tentang-footer{
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .konten-footer, .jalan, .hak-cipta {
            margin-bottom: 10px;
        }

        .konten-footer a{
            text-decoration: none;
            margin-left: 15px;
        }

        .konten-footer a, .jalan, .hak-cipta {
            color: white;
        }

        .konten-footer a:hover {
            opacity: 0.3;
        }
    </style>
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

    <h1><i> Fun Facts&nbsp;</i> Bawang Probolinggo</h1>
    <div class="teks_1">
        <img class="gambar" src="images/probo_merah.webp" alt="">
        <div class="kontainer_text">
            <h3>Sentra Produksi Bawang Merah Jawa Timur</h3>
            <p class="teks_probo">Kabupaten Probolinggo merupakan salah satu sentra produksi bawang merah di Jawa Timur. 
                Pada tahun 2022, Probolinggo menghasilkan 582.388 kuintal bawang merah dari
                area panen seluas 9.038 hektare</p>
        </div>
    </div>

    <div class="teks_1">
        <img class="gambar" src="images/pasarinduk.jpeg" alt="">
        <div class="kontainer_text">
            <h3>Pasar Induk Bawang</h3>
        <p class="teks_probo">Pemasaran bawang merah di Kabupaten Probolinggo terpusat di pasar induk bawang merah yang berada di Kecamatan Dringu. 
            Pasar induk bawang merah di Kecamatan Dringu merupakan sentra perdagangan bawang merah terbesar di Kabupaten Probolinggo.</p>
         </div>
    </div>
        

    <div class="teks_1">
        <img class="gambar" src="images/ekspor bawang.jpg" alt="">
        <div class="kontainer_text">
            <h3>Pasar Mancanegara</h3>
            <p class="teks_probo">Bawang merah Probolinggo diekspor ke mancanegara, khususnya ke negara-negara Asia. 
                Bawang merah asal Kecamatan Dringu Kabupaten Probolinggo diminati oleh Thailand. 
                Dalam setahun, bawang merah Probolinggo bisa diekspor ke Thailand tiga kali. 
            </p>
        </div>
    </div>

    <hr>
    <div class="bombay">
        <div class="bombay1">
            <h3 class="isi_bobmay judul_bombay">Bawang Bombay Probolinggo</h3>
            <img class="gambar_bombay" src="images/bombayy.jpeg-large" alt="">
            <p class="teks_bombay teks_probo">Bawang Bombay Probolinggo dikenal sebagai salah satu 
                produk unggulan daerah Probolinggo. Keunggulan bawang Bombay Probolinggo 
                antara lain adalah rasa yang khas dan manis, ukuran yang besar, serta kualitas yang baik. 
                Bawang Bombay Probolinggo sering menjadi pilihan bagi banyak orang karena dapat digunakan 
                dalam berbagai masakan untuk memberikan cita rasa yang khas dan lezat.</p>
        </div>
    </div>
    <hr>
    <br>
    <!--tombol kota-->
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

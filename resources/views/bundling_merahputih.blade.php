<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beli Bawang Merah</title>
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

        .awal-hal3 {
            font-size: 30px;
            font-weight: 500;
            margin-top: 30px;
            margin-bottom: 30px;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .konten-hal3 {
            display: flex;
            justify-content: center;
        }

        .isi-hal3 {
            margin-right: 30px;
            border: 1px solid #BD6261;
            height: 280px;
            max-width: 200px;
            border-radius: 10px;
            transition: .7s;
            position: relative;
            display: flex;
            flex-direction: column;
        }

        .tambahkan{
            background-color: white;
            color: #BD6261;
            border: 1px solid #BD6261;
            border-radius: 10px;
            width: 100px;  
            margin-left: 50px;
            font-size: 12px;
            transition: .3;
        }

        .tambahkan:hover{
            color: white;
            background-color: #BD6261;
        }

        .bawang, .harga {
            margin-left: 20px;
            font-size: 14px;
            margin-bottom: 0;
        }

        .kg{
            font-weight: 300;
            color: grey;
        }

        .isi-hal3 img {
            height: 150px;
            width: 200px;
            object-fit: cover;
            border-radius: 10px 10px 0 0;
        }

        .isi-hal3:hover{
            transform: scale(1.1);
        }

        .kota-beli {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
            color: grey;
        }

        .tim-bawang {
            justify-content: center;
            display: flex;
            margin-bottom: 20px;
            font-weight: 500;
            color: #c23f4f;
            font-weight: 600;
            font-size: 20px;
        }

        .deskripsi{
            justify-content: center;
            text-align: left;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 10px;
        }

        .desk1{
            margin-bottom: 0;
            color: grey;
        }

        hr{
            border: 1px solid #BD6261;
            width: 70px;
        }

        ul{
            margin: 0;
        }

        .deskripsi li {
            font-size: 15px;
        }
        footer {
            background: #BD6261;
            border-radius: 50px 50px 0 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 20px;
            margin-top: 20px;
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
                    <a href="/bawangmerah">Bawang Merah</a>
                    <a href="/bawangputih">Bawang Putih</a>
                    <a href="/bawangbombay">Bawang Bombay</a>
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

    <div class="kategori-bawang" id="bawangMerah">
        <div class="eceran">
            <p class="tim-bawang">Bundling Bawang Bombay + Putih</p>
            <div class="konten-hal3">
                @foreach($products as $product)
                <div class="isi-hal3">
                    <img src="{{ asset('uploads/'.$product->photo) }}" alt="{{ $product->product_name }}">
                    <p class="bawang">{{ $product->product_name }}</p>
                    <b class="harga">Rp {{ number_format($product->price, 0, ',', '.') }}<span class="kg">/1kg</span></b>
                    <p class="kota-beli">{{ $product->product_description }}</p>
                    <!-- Formulir di dalam tombol "Tambahkan" -->
                    <form action="{{ route('cart.store', ['productId' =>  $product->id]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="product_name" value="{{ $product->product_name }}">
                        <input type="hidden" name="product_description" value="{{ $product->product_description }}">
                        <input type="hidden" name="photo" value="{{ $product->photo }}">
                        <input type="hidden" name="price" value="{{ $product->price }}">
                        <input type="hidden" name="jenis" value="{{ $product->jenis }}">
                        <button type="submit" class="tambahkan">Tambahkan</button>
                    </form>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function fetchProductData(productjenis) {
            return fetch(`/data/${productjenis}`)
                .then(response => response.json());
        }
        
        // Fungsi untuk mengambil dan menampilkan data produk eceran
        function fetchProductBundling() {
            fetchProductData('Bundling')
                .then(data => {
                    const products = data.products;
        
                    // Mendapatkan kontainer untuk produk eceran
                    const productEceranContainer = document.getElementById('productBundling');
        
                    // Menghapus semua elemen di dalam kontainer
                    productEceranContainer.innerHTML = '';
        
                    // Menambahkan setiap produk eceran ke dalam kontainer
                    products.forEach(product => {
                        const productElement = `
                            <div class="isi-hal3">
                                <img src="images/${product.photo}" alt="">
                                <p class="bawang">${product.product_name}</p>
                                <b class="harga">Rp ${product.price}<span class="kg">/1kg</span></b>
                                <p class="kota-beli">${product.city}</p>
                                <button type="button" class="tambahkan">Tambahkan</button>
                            </div>
                        `;
                        productEceranContainer.innerHTML += productElement;
                    });
                })
                .catch(error => console.error('Error fetching product data:', error));
        }
        
        // Panggil fungsi untuk menampilkan data produk saat halaman dimuat
        window.onload = () => {
            fetchProductBundling();
        };
        
    </script>

    <div class="deskripsi">
        <p class="desk1">Deskripsi</p>
        <hr>
        <ul>
            <li>Bawang merah yang dijual murni berasal dari Probolinggo, Brebes, dan Nganjuk</li>
            <li>Bawang putih yang dijual murni berasal dari Brebes</li>
            <li>Setiap produk bundling diskon 3%</li>
            <li>Pembelian berupa eceran dengan minimal pembelian 1kg</li>
        </ul>
    </div>

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
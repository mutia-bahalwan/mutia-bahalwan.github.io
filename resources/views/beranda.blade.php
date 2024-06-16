<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda</title>
    <link rel="stylesheet" href="css/beranda.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<body>
    <!--bar-->
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

    <!--Hal 1-->
    <main class="hal1">
        <p>Berasal dari 20++ lahan petani Probolinggo, Nganjuk, dan Brebes dengan Harga Eceran & Grosir Terbaik!</p>
        <img src="images/gambarAwal.png" alt="gambar depan">
        <div class="belanja-sekarang">
            <a href="#hal-3">Belanja Sekarang</a>
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
                <a href= "desc_probolinggo.blade.php" class="read_more pro_read">Read More >>></a>
            </div>
            <div class="isi brebes">
                <p class="kota">Brebes</p>
                <img src="images/petani.jpg" alt="">
                <p class="desk-hal2">Bawang Merah Brebes memiliki warna yang lebih terang, bentuk bulat, kadar air yang rendah, rasa manis, sedikit lebih keras, dengan umur panen 80-90 hari tanam</p>
                <a href= "desc_brebes.blade.php" class="read_more">Read More >>></a>
            </div>
            <div class="isi nganjuk">
                <p class="kota">Nganjuk</p>
                <img src="images/petani.jpg" alt="">
                <p class="desk-hal2">Bawang Merah Nganjuk memiliki warna yang lebih gelap, bentuk lonjong, kadar air yang tinggi, rasa yang agak tawar, dan umur panen 100-110 hari tanam</p>
                <a href= "desc_nganjuk.blade.php" class="read_more">Read More >>></a>
            </div>
        </div>
    </main>

    <!--kategori bawang-->
    <main id="hal-3">
        <p id="awal-hal3" class="awal-hal3">Kategori untuk Anda</p>
        <ul class="kategori">
            <li class="tebal"><label onclick="tampilkanKategori('bawangMerah')">Bawang Merah</label></li>
            <li class="cerah"><label onclick="tampilkanKategori('bawangPutih')">Bawang Putih</label></li>
            <li class="medium"><label onclick="tampilkanKategori('bawangBombay')">Bawang Bombay</label></li>
        </ul>
        <div class="kategori-bawang" id="bawangMerah">
            <div class="eceran">
                <p class="tim-bawang">Tim Eceran</p>
                <div class="konten-hal3" id="productEceran">
                    @if(isset($products['Bawang Merah']['Eceran']) && count($products['Bawang Merah']['Eceran']) > 0)
                    @foreach($products['Bawang Merah']['Eceran'] as $product)
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
                    @else
                        <p>Bawang Merah Eceran kosong</p>
                    @endif
                </div>
            </div>
            
            <div class="grosir">
                <p class="tim-bawang">Tim Grosir</p>
                <div class="konten-hal3" id="productGrosir">
                    @if(isset($products['Bawang Merah']['Grosir']) && count($products['Bawang Merah']['Grosir']) > 0)
                    @foreach($products['Bawang Merah']['Grosir'] as $product)
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
                    @else
                        <p>Bawang Merah Grosir kosong</p>
                    @endif
                </div>
            </div>
        </div>

        <!--Bawang putih-->
        <div class="kategori-bawang" id="bawangPutih" style="display: none;">
            <div class="eceran">
                <p class="tim-bawang">Tim Eceran</p>
                <div class="konten-hal3" id="productEceran">
                    @if(isset($products['Bawang Putih']['Eceran']) && count($products['Bawang Putih']['Eceran']) > 0)
                    @foreach($products['Bawang Putih']['Eceran'] as $product)
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
                    @else
                        <p>Bawang Putih Eceran kosong</p>
                    @endif
                </div>
            </div>
            
            <div class="grosir">
                <p class="tim-bawang">Tim Grosir</p>
                <div class="konten-hal3" id="productGrosir">
                    @if(isset($products['Bawang Putih']['Grosir']) && count($products['Bawang Putih']['Grosir']) > 0)
                    @foreach($products['Bawang Putih']['Grosir'] as $product)
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
                    @else
                        <p>Bawang Putih Grosir kosong</p>
                    @endif
                </div>
            </div>
        </div>   

        <div class="kategori-bawang" id="bawangBombay" style="display: none;">
            <div class="eceran">
                <p class="tim-bawang">Tim Eceran</p>
                <div class="konten-hal3" id="productEceran">
                    @if(isset($products['Bawang Bombay']['Eceran']) && count($products['Bawang Bombay']['Eceran']) > 0)
                    @foreach($products['Bawang Bombay']['Eceran'] as $product)
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
                    @else
                        <p>Bawang Bombay Eceran kosong</p>
                    @endif
                </div>
            </div>
            
            <div class="grosir">
                <p class="tim-bawang">Tim Grosir</p>
                <div class="konten-hal3" id="productGrosir">
                    @if(isset($products['Bawang Bombay']['Grosir']) && count($products['Bawang Bombay']['Grosir']) > 0)
                    @foreach($products['Bawang Bombay']['Grosir'] as $product)
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
                    @else
                        <p>Bawang Bombay Grosir kosong</p>
                    @endif
                </div>
            </div>
        </div>
    </main>
    <!--hal 4-->
    <main class="hal-4">
        <div class="bundling">
            <p class="awal-hal4">Bundling Lebih Murah!</p>
            <div class="isihal4">
                <div class="backhal4">
                    <div class="konten-hal4">
                        <p class="kategori_bundling">Bawang Putih + Bawang Merah</p>
                        <img src="images/merah putih.jpe" alt="marah-putih">                       
                        <p class="diskon">Diskon 3%</p>
                        <div class="infolengkap">
                            <a href="bundling_merahputih">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="backhal4">
                    <div class="konten-hal4">
                        <p class="kategori_bundling">Bawang Putih + Bawang Bombay</p>
                        <img src="images/putihBombay.jpg" alt="marah-putih">                       
                        <p class="diskon">Diskon 3%</p>
                        <div class="infolengkap">
                            <a href="bundling_bombayputih">Selengkapnya</a>
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
        <img class= "gambarFooter" src="images/2.png" alt="">
        <div class="tentang-footer">
            <div class="isi-footer">
                <div class="konten-footer">
                    <a href="tentang.blade.php">Tentang</a>
                    <a href="/beranda#hal-3">Produk</a>
                    <a href="https://wa.me/6281235650928">Contact Us</a>
                </div>
                <p class="jalan">Jl. Mulyorejo Tengah no 45, Surabaya, Jawa Timur, Indonesia</p>
                <p class="hak-cipta">Hak Cipta Pawang 2024</p>
            </div>
        </div>
    </footer> 
    
    <script src="js/welcome.js"></script>
    <script>
        function fetchProductData(productjenis) {
            return fetch(`/data/${productjenis}`)
                .then(response => response.json());
        }

// Fungsi untuk mengambil dan menampilkan data produk eceran
function fetchProductEceran() {
    fetchProductData('Eceran')
        .then(data => {
            const products = data.products; // Mengambil array produk dari objek data

            // Mendapatkan kontainer untuk produk eceran
            const productEceranContainer = document.getElementById('productEceran');

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


        // Fungsi untuk mengambil dan menampilkan data produk grosir
        function fetchProductGrosir() {
            fetchProductData('Grosir')
                .then(products => {
                    // Mendapatkan kontainer untuk produk grosir
                    const productGrosirContainer = document.getElementById('productGrosir');

                    // Menghapus semua elemen di dalam kontainer
                    productGrosirContainer.innerHTML = '';

                    // Menambahkan setiap produk grosir ke dalam kontainer
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
                        productGrosirContainer.innerHTML += productElement;
                    });
                })
                .catch(error => console.error('Error fetching product data:', error));
        }

        // Panggil fungsi untuk menampilkan data produk saat halaman dimuat
        window.onload = () => {
            fetchProductEceran();
            fetchProductGrosir();
        };
        
    </script>
</body>
</html>

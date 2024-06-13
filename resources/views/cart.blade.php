<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            font-family: 'Poppins';
        }

        html, body {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
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

        .nav_links {
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

        .fa-bars {
            font-size: 20px;
            color: white;
            margin-right: 30px;
        }

        .container {
            flex: 1;
            margin-top: 20px;
            margin-bottom: 100px; /* Meningkatkan jarak agar footer tidak tumpang tindih */
        }
        
        /* Menambahkan gaya untuk tabel */
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f3f4f6;
        }

        .table-striped th {
            color: black;
        }

        .keranjang{
            font-weight: 500;
            font-size: 25px;
            text-align: center;
            margin-top: 30px;
        }

    .alert {
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        border: 1px solid transparent;
        border-radius: 0.25rem;
        text-align: center;
    }

    .alert-success {
        color: #155724;
        background-color: #d4edda;
        border-color: #c3e6cb;
    }

    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }

    /* Gaya untuk total pembelian */
    #total-pembelian {
        font-size: 1rem;
        font-weight: bold;
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
        @php
        function rupiah($number) {
            return 'Rp' . number_format($number, 0, ',', '.');
        }
    @endphp
    </header>

    <div class="keranjang">Keranjang Belanja</div>
    <hr>
    <!-- Menampilkan pesan sukses -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Menampilkan pesan error -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"><input type="checkbox" id="select-all"></th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Price</th>
                    <th scope="col">Jenis</th>
                    <th scope="col">Jumlah Pembelian</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userCart as $product)
                <tr>
                    <td><input type="checkbox" class="product-checkbox" value="{{ $product->id }}" data-jumlah="{{ $product->jumlah_pembelian }}" data-price="{{ $product->price }}"></td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->product_description }}</td>
                    <td><img src="{{ asset('uploads/' . $product->photo) }}" alt="{{ $product->product_name }}" style="width: 50px;"></td>
                    <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                    <td>{{ $product->jenis }}</td>
                    <td>
                        <!-- Form untuk memperbarui jumlah pembelian -->
                        <form action="{{ route('cart.update', ['id' => $product->id]) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="number" name="jumlah_pembelian" value="{{ $product->jumlah_pembelian }}" min="1">
                            <button type="submit" class="btn btn-secondary btn-sm">Update jumlah</button>
                        </form>c
                    </td>
                    <td>
                        <!-- Tombol Hapus -->
                        <form action="{{ route('cart.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>                      
        </table>
        <div class="d-flex justify-content-center">
            <p>Total: Rp. <span id="total-pembelian">0</span></p>
        </div>
        <!-- Tombol untuk melakukan pemesanan -->
        <form action="{{ route('order.store') }}" method="POST">
            @csrf
            <div id="selected-products"></div> <!-- Tempat untuk menyimpan produk terpilih -->
            <div class="d-flex justify-content-center">
                <button id="order-button" type="submit" class="btn btn-secondary" disabled>Pesan</button>
            </div>
        </form>
    </div>                  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Fungsi untuk menghitung total pembelian
        function calculateTotal() {
            const checkedCheckboxes = document.querySelectorAll('.product-checkbox:checked');
            let total = 0;
    
            checkedCheckboxes.forEach(function(checkbox) {
                const jumlah_pembelian = parseInt(checkbox.getAttribute('data-jumlah'));
                const price = parseInt(checkbox.getAttribute('data-price'));
                total += jumlah_pembelian * price;
            });
    
            const formattedTotal = total.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' });
            document.getElementById('total-pembelian').textContent = formattedTotal;
        }
    
        document.getElementById('select-all').addEventListener('change', function() {
            const productCheckboxes = document.querySelectorAll('.product-checkbox');
            productCheckboxes.forEach((checkbox) => {
                checkbox.checked = this.checked;
            });
            calculateTotal();
            handleCheckboxChange();
        });
    
        function handleCheckboxChange() {
            const selectedProductsContainer = document.getElementById('selected-products');
            selectedProductsContainer.innerHTML = ''; 
    
            const checkedCheckboxes = document.querySelectorAll('.product-checkbox:checked');
            checkedCheckboxes.forEach(function(checkbox) {
                const productId = checkbox.value;
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'product_id[]';
                input.value = productId;
                selectedProductsContainer.appendChild(input);
            });
    
            const orderButton = document.getElementById('order-button');
            if (checkedCheckboxes.length > 0) {
                orderButton.disabled = false;
            } else {
                orderButton.disabled = true;
            }
        }
    
        const productCheckboxes = document.querySelectorAll('.product-checkbox');
        productCheckboxes.forEach((checkbox) => {
            checkbox.addEventListener('change', function() {
                calculateTotal();
                handleCheckboxChange();
            });
        });
    
        calculateTotal();
        handleCheckboxChange();
    </script>
    
    
</body>
</html>
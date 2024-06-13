<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
            font-size: 14px;
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
        
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f3f4f6;
        }

        .table-striped th {
            color: black;
        }

        .keranjang {
            font-weight: 500;
            font-size: 25px;
            text-align: center;
            margin-top: 30px;
        }

        .status-badge {
            border: 1px solid #ccc; 
            border-radius: 20px; 
            padding: 5px 10px; 
            background-color: #f2f2f2; 
            display: inline-block;
            font-size: 12px;
            width: 120px;
            text-align: center;
        }

        .table {
            text-align: center;
        }

        .upload {
            width: 200px;
        }

        .hidden-row {
            display: none;
        }

        .toggle-details {
            color: #c23f4f;
            border: none;
            background: none;
            cursor: pointer;
            font-size: 1.2em;
        }

        .toggle-details:hover{
            color: #a4535c
        }
        .btn-upload {
            background-color: #c23f4f;
            border-color: #c23f4f;
            color: white;
        }

        .btn-upload:hover {
            background-color: #a32d3d;
            border-color: #a32d3d;
        }
    </style>
</head>
<body>
    <header>
        <a href="beranda.blade.php"><img class="logo" src="images/2.png" alt="logo"></a>
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

    <div class="keranjang">Produk yang Telah Anda Beli</div>
    <hr>
    <div class="container">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th></th> <!-- Kolom untuk tombol expand/collapse -->
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Total harga</th>
                    <th>Tanggal Pesan</th>
                    <th>Status</th>
                    <th>Bukti Pembayaran</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>
                            <button class="btn btn-link toggle-details" data-order-id="{{ $order->id }}" style="background-color: #c23f4f; color: white;"><i class="fa fa-plus"></i></button>
                        </td>
                        <td colspan="7" style="font-weight: bold; color: #c23f4f;">Pembelian: {{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }} | Total: {{ rupiah($order->total_price) }}</td>

                    </tr>
                    <tr class="hidden-row" data-order-id="{{ $order->id }}">
                        <td></td> <!-- Kolom kosong untuk tombol expand/collapse -->
                        <td>{{ $order->orderDetails->first()->product->product_name }}</td>
                        <td>{{ $order->orderDetails->first()->quantity }}</td>
                        <td>{{ $order->orderDetails->first()->product->product_description }} ({{ $order->orderDetails->first()->product->jenis }})</td>
                        <td>Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($order->created_at)->format('Y-m-d H:i:s') }}</td>
                        <td><span class="status-badge">{{ $order->status }}</span></td>
                        <td class="upload">
                            @if ($order->bukti_pembayaran)
                                <p>Bukti Pembayaran diunggah pada {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
                            @else
                                <form action="{{ route('upload_bukti') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
                                    <div class="input-group mb-3">
                                        <input type="file" name="bukti_pembayaran" accept="image/*" class="form-control">
                                        <button type="submit" class="btn btn-primary btn-sm btn-upload">Unggah</button>
                                    </div>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @php $first = true; @endphp
                    @foreach ($order->orderDetails as $orderDetail)
                        @if (!$first)
                            <tr class="hidden-row" data-order-id="{{ $order->id }}">
                                <td></td> <!-- Kolom kosong untuk tombol expand/collapse -->
                                <td>{{ $orderDetail->product->product_name }}</td>
                                <td>{{ $orderDetail->quantity }}</td>
                                <td>{{ $orderDetail->product->product_description }} ({{ $orderDetail->product->jenis }})</td>
                                <td>Rp {{ number_format($orderDetail->subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @else
                            @php $first = false; @endphp
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    

    <script>
        document.querySelectorAll('.toggle-details').forEach(button => {
            button.addEventListener('click', function() {
                const orderId = this.getAttribute('data-order-id');
                const icon = this.querySelector('i');

                document.querySelectorAll(`.hidden-row[data-order-id="${orderId}"]`).forEach(row => {
                    if (row.style.display === 'none' || row.style.display === '') {
                        row.style.display = 'table-row';
                        icon.classList.remove('fa-plus');
                        icon.classList.add('fa-minus');
                    } else {
                        row.style.display = 'none';
                        icon.classList.remove('fa-minus');
                        icon.classList.add('fa-plus');
                    }
                });
            });
        });
    </script>
</body>
</html>

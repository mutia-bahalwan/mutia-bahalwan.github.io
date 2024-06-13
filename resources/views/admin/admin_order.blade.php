<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Order</title>
    <style>
        /* CSS untuk mempercantik tampilan */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            text-align: center;
            font-size: 12px;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #f0f0f0;
            font-weight: bold;
        }

        .status-dropdown {
            width: 120px;
        }

        .img-thumbnail {
            width: 100px;
            height: auto;
        }

        .vertical{
            font-size: 14px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="d-flex flex-row">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary  vertical"  style="width: 280px; height: 100vh">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="images/3.png" alt="" style="width: 50px">
                <span class="fs-4 px-2">Pawang</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li>
                    <a href="admin_dashboard" class="nav-link link-body-emphasis">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="admin_order" class="nav-link link-body-emphasis  active">
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin_product" class="nav-link link-body-emphasis">
                        Products
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <strong>Admin</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" style="">
                    <li><a class="dropdown-item" href="welcome.blade.php">Sign out</a></li>
                </ul>
            </div>
        </div>
    <div class="container">
        <h1 class="mt-4">Admin Order</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Deskripsi</th>
                    <th>Tanggal Pesan</th>
                    <th>Alamat Pengiriman</th>
                    <th>Total Harga</th>
                    <th>Bukti Bayar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @php
                    use Illuminate\Support\Facades\Storage;
                @endphp
                @foreach ($orders as $order)
                    @foreach ($order->orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $orderDetail->product->product_name }}</td>
                            <td>{{ $orderDetail->quantity }}</td>
                            <td>{{ $orderDetail->product->product_description }}</td>
                            <td>{{ $order->created_at->format('d-m-Y') }}</td>
                            <td>{{ $order->shipping_address }}</td>
                            <td>{{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td class="upload">
                                @if ($order->bukti_pembayaran)
                                    <a href="{{ asset($order->bukti_pembayaran) }}" download >
                                        <p>Bukti Pembayaran diunggah pada {{ $order->created_at->format('Y-m-d H:i:s') }}</p>
                                    </a>
                                @else
                                    <form action="{{ route('upload_bukti') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" name="order_id" value="{{ $order->id }}">
                                        <div class="input-group mb-3">
                                            <input type="file" name="bukti_pembayaran" accept="image/*" class="form-control">
                                            <button type="submit" class="btn btn-primary btn-sm">Unggah</button>
                                        </div>
                                    </form>
                                @endif
                            </td>
                                                      
                            <td>
                                <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="status-dropdown form-control" onchange="this.form.submit()" style="font-size: 12px;">
                                        <option value="Pesanan Dibuat" {{ $order->status == 'Pesanan Dibuat' ? 'selected' : '' }}>Pesanan Dibuat</option>
                                        <option value="Dalam Proses" {{ $order->status == 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                                        <option value="Dikirim" {{ $order->status == 'Dikirim' ? 'selected' : '' }}>Dikirim</option>
                                        <option value="Selesai" {{ $order->status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                                    </select>
                                </form>
                            </td>                            
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

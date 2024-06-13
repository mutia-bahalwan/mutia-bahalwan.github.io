<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin_dashboard.css">
    <title>Admin Dashboard</title>
    <style>
        /* CSS untuk pempercantikan tampilan */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            margin-top: 20px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .card {
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #f0f0f0;
        }

        .overview {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 20px;
            background-color: rgba(128, 128, 128, 0.1);
        }

        .overview p {
            color: #6c757d;
            margin: 0;
        }

        .vertical{
            font-size: 14px;
            text-align: left;
        }
    </style>
</head>
<body>
<div class="d-flex flex-row">
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary vertical" style="width: 280px; height: 100vh">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            <img src="images/3.png" alt="" style="width: 50px">
            <span class="fs-4 px-2">Pawang</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="admin_dashboard" class="nav-link link-body-emphasis active">
                    Dashboard
                </a>
            </li>
            <li>
                <a href="admin_order" class="nav-link link-body-emphasis">
                    Orders
                </a>
            </li>
            <li>
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


    <!-- Counter -->
    <div class="container">
        <div class="card">
            <h3 class="text-center mb-4">Jumlah Sumber Daya</h3>
            <div class="overview">
                <p>Total Products: <span id="productCount"></span></p>
                <p>Total Users: <span id="userCount"></span></p>
                <p>Total Purchases: <span id="purchaseCount"></span></p>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fungsi untuk mengambil data produk, pengguna, dan pembelian dari backend
        function fetchData() {
            fetch('/data')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('productCount').innerText = data.productCount;
                    document.getElementById('userCount').innerText = data.userCount;
                    document.getElementById('purchaseCount').innerText = data.purchaseCount;
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    
        // Panggil fungsi fetchData saat halaman dimuat
        window.onload = function() {
            fetchData();
        };
    </script>
    

</body>
</html>

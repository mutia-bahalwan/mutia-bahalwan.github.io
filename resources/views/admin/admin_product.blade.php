<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin Dashboard</title>
    <style>
        .vertical-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: rgb(212, 202, 202);
            width: 80%;
            padding: 20px;
        }
        <?php
        use App\Models\Product;
        $products = Product::paginate(10);
        ?>

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
                <li>
                    <a href="admin_dashboard" class="nav-link link-body-emphasis">
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="admin_order" class="nav-link link-body-emphasis">
                        Orders
                    </a>
                </li>
                <li class="nav-item">
                    <a href="admin_product" class="nav-link link-body-emphasis active">
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
        <div class="container my-4">
            <h2>Products</h2>
            <form action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
                @csrf
                <div class="row g-3">
                    <div class="col">
                        <input type="text" class="form-control" name="product_name" placeholder="Product Name" required>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="product_description" placeholder="Product Description" required>
                    </div>
                    <div class="col">
                        <input type="file" class="form-control" name="photo" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="price" placeholder="Price" step="0.01" required>
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="quantity" placeholder="Quantity" required>
                    </div>
                    <div class="col">
                      <input type="text" class="form-control" name="kode" placeholder="Kode" required>
                  </div>
                  <div class="col">
                      <input type="text" class="form-control" name="jenis" placeholder="Jenis" required>
                  </div>
                  <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </div>
                </div>
            </form>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Kode</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Description</th>
                        <th scope="col">Photo</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Jenis</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->kode }}</td>
                            <td>{{ $product->product_name }}</td>
                            <td>{{ $product->product_description }}</td>
                            <td><img src="{{ asset('uploads/' . $product->photo) }}" alt="{{ $product->product_name }}" style="width: 50px;"></td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->jenis }}</td>
                            <td>
                                <form action="{{ route('admin.product.destroy', $product->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>

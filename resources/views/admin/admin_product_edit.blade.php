<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Product</h1>
        <form action="{{ route('admin.product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label for="kode">Kode:</label>
            <input type="text" id="kode" name="kode" value="{{ $product->kode }}" required>
            <label for="product_name">Product Name:</label>
            <input type="text" id="product_name" name="product_name" value="{{ $product->product_name }}" required>
            <label for="product_description">Product Description:</label>
            <textarea id="product_description" name="product_description" rows="5" required>{{ $product->product_description }}</textarea>
            <label for="photo">Product Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="{{ $product->price }}" required>
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" required>
            <label for="jenis">Jenis:</label>
            <input type="text" id="jenis" name="jenis" value="{{ $product->jenis }}" required>
            <button type="submit">Update Product</button>
        </form>
    </div>
</body>
</html>

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(20);
        return view('admin.admin_product', compact('products'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'kode' => 'required|string', 
            'jenis' => 'required|string', 
        ]);

        // Handle file upload
        $imageName = time().'.'.$request->photo->extension();  
        $request->photo->move(public_path('uploads'), $imageName);

        // Create a new product
        Product::create([
            'product_name' => $request->product_name,
            'product_description' => $request->product_description,
            'photo' => $imageName,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'kode' => $request->kode,
            'jenis' => $request->jenis,
        ]);

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.admin_product_edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'kode' => 'required|string', 
            'jenis' => 'required|string', 
        ]);

        $product = Product::findOrFail($id);

        // Handle file upload
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('uploads'), $imageName);
            $product->photo = $imageName;
        }

        $product->product_name = $request->product;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->kode = $request->kode;
        $product->jenis = $request->jenis;
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product berhasil diupdate.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.product.index')->with('success', 'Product berhasil dihapus.');
    }

    public function showBawangMerahPage()
    {
        $eceranProducts = Product::where('jenis', 'Eceran')->where('product_name', 'Bawang Merah')->get();
        $grosirProducts = Product::where('jenis', 'Grosir')->where('product_name', 'Bawang Merah')->get();
        $products = [
            'Eceran' => $eceranProducts,
            'Grosir' => $grosirProducts,
        ];
        return view('bawangmerah', ['products' => $products]);
    }

    public function showBawangPutihPage()
    {
        
        $eceranProducts = Product::where('jenis', 'Eceran')->where('product_name', 'Bawang Putih')->get();
        $grosirProducts = Product::where('jenis', 'Grosir')->where('product_name', 'Bawang Putih')->get();
        $products = [
            'Eceran' => $eceranProducts,
            'Grosir' => $grosirProducts,
        ];
        return view('bawangmerah', ['products' => $products]);
    }

    public function showBawangBombayPage()
    {
        $eceranProducts = Product::where('jenis', 'Eceran')->where('product_name', 'Bawang Bombay')->get();
        $grosirProducts = Product::where('jenis', 'Grosir')->where('product_name', 'Bawang Bombay')->get();
        $products = [
            'Eceran' => $eceranProducts,
            'Grosir' => $grosirProducts,
        ];
        return view('bawangmerah', ['products' => $products]);
    }
    public function showBundlingBombayPutihPage()
    {
        $products = Product::where('jenis', 'Bundling')->where('product_name', 'Bawang Bombay + Putih')->get();
        // dd($products);
        return view('bundling_bombayputih', ['products' => $products]);
    }

    public function showBundlingMerahPutihPage()
    {
        $products = Product::where('jenis', 'Bundling')->where('product_name', 'Bawang Merah + Putih')->get();
        // dd($products);
        return view('bundling_merahputih', ['products' => $products]);
    }

    public function showBerandaPage()
    {
        // Mendapatkan data produk bawang merah dari model
        $bawangMerahEceran = Product::where('jenis', 'Eceran')->where('product_name', 'Bawang Merah')->get();
        $bawangMerahGrosir = Product::where('jenis', 'Grosir')->where('product_name', 'Bawang Merah')->get();

        // Mendapatkan data produk bawang putih dari model
        $bawangPutihEceran = Product::where('jenis', 'Eceran')->where('product_name', 'Bawang Putih')->get();
        $bawangPutihGrosir = Product::where('jenis', 'Grosir')->where('product_name', 'Bawang Putih')->get();

        // Mendapatkan data produk bawang bombay dari model
        $bawangBombayEceran = Product::where('jenis', 'Eceran')->where('product_name', 'Bawang Bombay')->get();
        $bawangBombayGrosir = Product::where('jenis', 'Grosir')->where('product_name', 'Bawang Bombay')->get();

        $products = [
            'Bawang Merah' => [
                'Eceran' => isset($bawangMerahEceran) ? $bawangMerahEceran : [],
                'Grosir' => isset($bawangMerahGrosir) ? $bawangMerahGrosir : [],
            ],
            'Bawang Putih' => [
                'Eceran' => isset($bawangPutihEceran) ? $bawangPutihEceran : [],
                'Grosir' => isset($bawangPutihGrosir) ? $bawangPutihGrosir : [],
            ],
            'Bawang Bombay' => [
                'Eceran' => isset($bawangBombayEceran) ? $bawangBombayEceran : [],
                'Grosir' => isset($bawangBombayGrosir) ? $bawangBombayGrosir : [],
            ],
        ];
        return view('beranda', ['products' => $products]);
    }

    public function getDataByProduct($productjenis)
    {      
        // Konversi ke huruf kecil untuk perbandingan case-insensitive
        $productjenis = strtolower($productjenis);
        
        if ($productjenis === 'eceran' || $productjenis === 'grosir') {
            // Ambil data produk berdasarkan jenis (eceran atau grosir)
            $products = Product::where('jenis', ucfirst($productjenis))->get();
            // Debugging
            dd($products);
            // Mengembalikan data produk dalam format JSON
            return response()->json([
                'products' => $products
            ]);
        } else {
            // Jika kode produk tidak valid, kembalikan respons kosong atau sesuaikan dengan kebutuhan Anda
            return response()->json([
                'message' => 'Invalid product code'
            ], 404); // Contoh respons HTTP 404 untuk kode produk yang tidak valid
        }
    }
    
    

    public function getData()
    {
        $productCount = Product::count();
        $userCount = User::count();
        $purchaseCount = Order::count();

        return response()->json([
            'productCount' => $productCount,
            'userCount' => $userCount,
            'purchaseCount' => $purchaseCount
        ]);
    }

}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    // Menampilkan halaman keranjang belanja
    public function index()
    {
        // Ambil semua item dari keranjang
        $userCart = Cart::where('user_id', auth()->id())->get();
        // Tampilkan halaman keranjang dengan data item
        return view('cart', compact('userCart'));
    }

    // Menambahkan item ke keranjang belanja
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_id' => 'required|exists:products,id',
            'product_description' => 'required',
            'photo' => 'required',
            'price' => 'required|numeric|min:0',
            'jenis' => 'required',
        ]);
    
        // Dapatkan produk berdasarkan ID
        $product = Product::findOrFail($request->product_id);
       
        // Tentukan jumlah pembelian berdasarkan jenis produk
        if ($product->jenis == 'Eceran') {
            $jumlah_pembelian = 1; // Jumlah pembelian untuk produk eceran
        } elseif ($product->jenis == 'Grosir') {
            $jumlah_pembelian = 20; // Jumlah pembelian untuk produk bundling
        } else {
            // Default jika jenis produk tidak dikenali
            $jumlah_pembelian = 1;
        }
    
        // Periksa apakah produk dengan jenis yang sama sudah ada dalam keranjang
        $cartItem = Cart::where('user_id', auth()->id())
                        ->where('product_id', $product->id)
                        ->where('jenis', $product->jenis)
                        ->first();
    
        if ($cartItem) {
            // Jika produk sudah ada dalam keranjang, tambahkan jumlah pembelian
            $cartItem->jumlah_pembelian += $jumlah_pembelian;
            $cartItem->save();
            session()->flash('success', 'Produk berhasil ditambahkan ke keranjang!');
        } else {
            // Jika produk belum ada dalam keranjang, tambahkan produk baru ke keranjang
            $cart = new Cart();
            $cart->product_id = $product->id;
            $cart->user_id = auth()->id(); 
            $cart->jumlah_pembelian = $jumlah_pembelian;
            $cart->photo = $product->photo;
            $cart->price = $product->price;
            $cart->jenis = $product->jenis;
            $cart->product_name = $product->product_name;
            $cart->product_description = $product->product_description;
            $cart->save();
            session()->flash('success', 'Produk berhasil ditambahkan ke keranjang!');
        }
    
        return redirect()->back();
    }

    // Proses pembelian item dari keranjang belanja
    public function process(Request $request)
    {
        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Check if the user has an address
        if (empty($user->address)) {
            return redirect()->back()->with('error', 'Alamat pengiriman harus diisi.');
        }

        // Ambil semua item dari keranjang pengguna
        $cartItems = Cart::where('user_id', $user->id)->get();

        // Kalkulasi total harga
        $totalPrice = $cartItems->sum(function ($item) {
            return $item->price * $item->jumlah_pembelian;
        });

        // Buat entri pesanan baru
        $order = new Order();
        $order->user_id = $user->id;
        $order->shipping_address = $user->address;
        $order->total_price = $totalPrice;
        $order->status = 'Menunggu pembayaran';
        $order->save();

        // Hapus semua item dari keranjang setelah proses pembelian
        Cart::where('user_id', $user->id)->delete();

        // Redirect kembali ke halaman keranjang dengan pesan sukses
        return redirect()->back()->with('success', 'Pesanan Anda telah diproses.');
    }

    // Menghapus item dari keranjang belanja
    public function destroy($id)
    {
        // Temukan item keranjang belanja berdasarkan ID
        $cartItem = Cart::findOrFail($id);

        // Hapus item jika ditemukan
        if ($cartItem) {
            $cartItem->delete();
            return redirect('/cart')->with('success', 'Item berhasil dihapus dari keranjang.');
        }

        // Redirect kembali ke halaman keranjang belanja dengan pesan error jika item tidak ditemukan
        return redirect('/cart')->with('error', 'Item tidak ditemukan dalam keranjang.');
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'jumlah_pembelian' => 'required|numeric|min:1',
        ]);

        // Cari item keranjang berdasarkan ID
        $cartItem = Cart::findOrFail($id);

        // Perbarui jumlah pembelian
        $cartItem->jumlah_pembelian = $request->jumlah_pembelian;
        $cartItem->save();

        // Redirect kembali ke halaman keranjang dengan pesan sukses
        return redirect('/cart')->with('success', 'Jumlah pembelian berhasil diperbarui.');
    }
}

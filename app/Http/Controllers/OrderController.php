<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Log; // Tambahkan ini

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderByDesc('created_at')->where('user_id', auth()->id())->get();
        return view('order', compact('orders')); 
    }

    public function store(Request $request)
    {
        $selectedProductIds = $request->input('product_id');

        if (empty($selectedProductIds)) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada produk yang dipilih.');
        }

        $user = auth()->user();
        if (empty($user->address)) {
            return redirect()->route('cart.index')->with('error', 'Alamat harus diisi terlebih dahulu.');
        }
    
        $totalPrice = 0;
        $orderDetails = [];

        Log::info('Selected product IDs: ', $selectedProductIds); // Debug statement

        foreach ($selectedProductIds as $cartId) {
            $cartItem = Cart::find($cartId); // Cari item keranjang berdasarkan ID keranjang
            
            if ($cartItem) {
                $product = Product::find($cartItem->product_id); // Cari produk berdasarkan product_id di item keranjang
                
                if ($product) {
                    $jumlahPembelian = $cartItem->jumlah_pembelian;
                    $price = $product->price;
                    $subtotal = $jumlahPembelian * $price;
                    $totalPrice += $subtotal;
        
                    $orderDetails[] = [
                        'product_id' => $product->id, // Gunakan ID produk dari tabel products
                        'quantity' => $jumlahPembelian,
                        'price_per_item' => $price,
                        'subtotal' => $subtotal,
                    ];
        
                    $product->quantity -= $jumlahPembelian;
                    $product->save();
                } else {
                    // Pernyataan debug
                    Log::info("Produk tidak ditemukan untuk ID produk di item keranjang: {$cartItem->product_id}");
                }
            } else {
                // Pernyataan debug
                Log::info("Item keranjang tidak ditemukan untuk ID: $cartId");
            }
        }
    
        if ($totalPrice == 0) {
            return redirect()->route('cart.index')->with('error', 'Tidak ada produk yang valid untuk dipesan');
        }

        $order = new Order();
        $order->user_id = auth()->user()->id;
        $order->shipping_address = auth()->user()->address;
        $order->total_price = $totalPrice;
        $order->status = 'Menunggu pembayaran';
        $order->save();

        foreach ($orderDetails as $detail) {
            $orderDetail = new OrderDetail();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $detail['product_id'];
            $orderDetail->quantity = $detail['quantity'];
            $orderDetail->price_per_item = $detail['price_per_item'];
            $orderDetail->subtotal = $detail['subtotal'];
            $orderDetail->save();
            
            // Menghapus produk dari keranjang
            Cart::where('product_id', $detail['product_id'])->delete();
        }

        return redirect()->route('cart.index')->with('success', 'Produk berhasil dipesanan');
    }

    public function uploadBukti(Request $request)
    {
        $request->validate([
            'bukti_pembayaran' => 'required|file|max:2048', // Validasi file yang diunggah
        ]);
    
        // Dapatkan order yang sesuai berdasarkan ID atau informasi yang diperlukan dari permintaan
        $orderId = $request->input('order_id'); // Sesuaikan dengan cara Anda mendapatkan ID pesanan
        $order = Order::find($orderId);
    
        if (!$order) {
            return redirect()->back()->with('error', 'Pesanan tidak ditemukan.');
        }
    
        // Simpan file bukti pembayaran
        $file = $request->file('bukti_pembayaran');
        $path = $file->store('bukti_pembayaran');
    
        // Tambahkan path bukti pembayaran ke order
        $order->bukti_pembayaran = $path;
        $order->status = 'Menunggu konfirmasi pembayaran';
        $order->save();
    
        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diunggah.');
    }
    

}

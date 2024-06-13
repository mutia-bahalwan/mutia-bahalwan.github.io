<?php

use App\Http\Controllers\AlamatController;
use App\Http\Controllers\EditProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\ForgetPasswordController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/welcome.blade.php', function () {
    return view('welcome'); 
});

Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');

Route::get('/bundling_bombayputih', function () {
    return view('bundling_bombayputih'); 
});

Route::get('/bundling_merahputih', function () {
    return view('bundling_merahputih'); 
});

Route::get('/desc_brebes.blade.php', function () {
    return view('desc_brebes'); 
});

Route::get('/desc_probolinggo.blade.php', function () {
    return view('desc_probolinggo'); 
});

Route::get('/desc_nganjuk.blade.php', function () {
    return view('desc_nganjuk'); 
});

Route::get('/tentang.blade.php', function () {
    return view('tentang'); 
});

Route::get('login.blade.php', function () {
    return view('login'); 
});

Route::get('/signup.blade.php', function () {
    return view('signup'); 
});

Route::get('/admin_dashboard', function () {
    return view('admin.admin_dashboard'); 
});

Route::get('/admin_customer', function () {
    return view('admin.admin_customer'); 
});

// Route::get('/edit_profil', function () {
//     return view('edit_profil'); 
// });

// Route::get('/forget_password', function () {
//     return view('forget_password'); 
// });


Route::get('/login', [LoginController::class,'index']) ->name('login');
Route::post('/login-proses', [LoginController::class,'login_proses']) ->name('login-proses');

Route::get('/signup', [LoginController::class,'signup']) ->name('signup');
Route::post('/signup-proses', [LoginController::class,'signup_proses']) ->name('signup-proses');

Route::get('/email_forgetPassword', [ForgetPasswordController::class,'index1'])->name('email_forgetPassword');
Route::post('/email-forgetPassword', [ForgetPasswordController::class,'email_forgetPassword'])->name('email-forgetPassword');

Route::get('/forget_password', [ForgetPasswordController::class,'forget_password']) ->name('forget_password');
Route::post('/reset_password', [ForgetPasswordController::class,'reset_password']) ->name('reset_password');

Route::get('/alamat', [AlamatController::class,'alamat']) ->name('alamat');
Route::post('/add-alamat', [AlamatController::class,'add_alamat'])
     ->name('add-alamat')
     ->middleware('auth');

Route::get('/edit_profil', [EditProfileController::class,'edit']) ->name('edit_profil');
Route::patch('/update-profil', [EditProfileController::class,'update']) ->name('update-profil');

Route::get('/admin_dashboard', [HomeController::class, 'admin_dashboard'])->name('admin_dashboard');
Route::get('/admin_product', [HomeController::class, 'admin_product'])->name('admin_product');
// Route::get('/admin_order', [HomeController::class, 'admin_order'])->name('admin_order');

//add product to chart
// Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/process', [CartController::class, 'process'])->name('cart.process');
Route::patch('/cart/{id}', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::post('/cart/add/{productId}', [CartController::class, 'store'])->name('cart.store');


Route::get('/order', [OrderController::class, 'index'])->name('order.index');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::post('/upload-bukti', [OrderController::class, 'uploadBukti'])->name('upload_bukti');

Route::get('/admin.admin_product', [ProductController::class, 'index'])->name('admin.product.index');
Route::post('/admin_product/store', [ProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin_product/{id}/edit', [ProductController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin_product/{id}', [ProductController::class, 'update'])->name('admin.product.update');
Route::delete('/admin_product/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');
Route::get('/data', [ProductController::class, 'getData']);
Route::get('/data/{productjenis}', [ProductController::class, 'getDataByProduct']);
Route::get('/admin_order', [AdminOrderController::class, 'index'])->name('admin.orders.index');
Route::patch('/admin_order/{id}/update-status', [AdminOrderController::class, 'updateStatus'])->name('admin.order.updateStatus');

Route::get('/bawangbombay', [ProductController::class, 'showBawangBombayPage']);
Route::get('/bawangmerah', [ProductController::class, 'showBawangMerahPage']);
Route::get('/bawangputih', [ProductController::class, 'showBawangPutihPage']);
Route::get('/bundling_merahputih', [ProductController::class, 'showBundlingMerahPutihPage']);
Route::get('/bundling_bombayputih', [ProductController::class, 'showBundlingBombayPutihPage']);
Route::get('/beranda', [ProductController::class, 'showBerandaPage']);




// Route::get('/cart.blade.php', function () {
//     return view('cart');
// });

// Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add_to_cart');
// Route::post('/add_to_cart', [ProductController::class, 'addToCart'])->name('add_to_cart');
// Route::patch('update-cart', [ProductController::class, 'update'])->name('update_cart');
// Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove_from_cart');





<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ForgetPasswordController extends Controller
{
    public function index1()
    {
        return view("email_forgetPassword");
    }
    
    public function email_forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
        ]);
    
        // Simpan email ke dalam sesi
        session(['reset_email' => $request->email]);
    
        // Check if the email already exists in the password_resets table
        $existingReset = DB::table('password_resets')->where('email', $request->email)->first();
    
        // Jika email sudah ada, perbarui created_at, jika tidak, masukkan entri baru
        if ($existingReset) {
            DB::table('password_resets')->where('email', $request->email)->update([
                'created_at' => Carbon::now(),
            ]);
        } else {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'created_at' => Carbon::now(),
            ]);
        }
    
        // Redirect to the password reset page
        return redirect()->route('forget_password');
    }
    
    
    public function forget_password(){
        return view("forget_password");
    }

    public function reset_password(Request $request)
    {
        // Validasi input
        $request->validate([
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
        ], [
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal harus 8 karakter',
            'password_confirmation.required' => 'Konfirmasi Password Baru harus diisi',
            'password_confirmation.same' => 'Konfirmasi Password Baru tidak cocok dengan Password Baru',
        ]);
        
        // Ambil email dari sesi
        $email = session('reset_email');
        
        // Cari pengguna berdasarkan email
        $user = User::where('email', $email)->first();
    
        if (!$user) {
            return redirect()->route('forget_password')->with('failed', 'Email tidak ditemukan.');
        }
    
        // Ubah password pengguna
        $user->password = Hash::make($request->password);
    
        // Simpan perubahan
        $user->save();
    
        // Log informasi
        Log::info('Password telah direset untuk pengguna dengan email: ' . $email);
    
        // Redirect dengan pesan sukses
        return redirect()->route('forget_password')->with('success', 'Password Anda telah direset!');
    } 
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view("login");
    }

    public function login_proses(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users,email',
        'password' => 'required',
    ], [
        'email.required' => 'Email harus diisi',
        'email.exists' => 'Email tidak terdaftar',
        'password.required' => 'Password harus diisi',
    ]);

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Password cocok, lakukan tindakan sesuai kebutuhan
        $user = Auth::user();

        if ($user->email === 'admin@gmail.com') {
            // Jika login sebagai admin, redirect ke admin_dashboard
            return redirect()->route('admin_dashboard')->with('success', 'Login berhasil');
        } else {
            // Jika login sebagai pengguna biasa, redirect ke beranda
            return redirect('/beranda')->with('success', 'Login berhasil');
        }
    } else {
        return redirect()->route('login')->with('failed', 'Email atau password salah');
    }
}

    public function signup_proses(Request $request){
       $request->validate([
        'name'=>'required',
        'email'=>'required|email|unique:users,email',
        'kontak'=>'required|validKontak|unique:users,kontak',
        'password'=>'required|min:8'
       ]);
    
       $data['name'] =$request->name;
       $data['email'] =$request->email;
       $data['kontak'] =$request->kontak;
       $data['password'] = Hash::make($request->password); 
    
       User::create($data);
    
       return redirect()->route('login')->with('success','Pendaftaran berhasil');
    }
    
}

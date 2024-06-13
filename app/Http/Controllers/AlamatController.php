<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AlamatController extends Controller
{
    public function alamat(){
        return view("alamat");
    }

    public function add_alamat(Request $request){
        $request->validate([
            'address' => 'required|string',
        ], [
            'address.required' => 'Alamat harus diisi',
        ]);
        $user = Auth::user();

        $user->address = $request->address;
        $user->save();

        // Setelah pendaftaran, langsung redirect ke halaman login
        return redirect()->route('beranda')->with('success','Pendaftaran berhasil');
    
    }    
}

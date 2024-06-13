<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class EditProfileController extends Controller
{
    public function edit()
    {
        // Mengambil data pengguna dari database
        $user = auth()->user();

        // Menampilkan tampilan edit profil dengan data pengguna
        return view('edit_profil', compact('user'));
    }

    public function update(Request $request)
    {
        Log::info('Update method called');
        error_log('Update method called');
    
        $user = Auth::user();
    
        // Memastikan nama kolom yang benar di database
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'kontak' => 'required|string|max:255|unique:users,kontak,' . $user->id,
            'address' => 'required|string|max:255',
        ], [
            'address.required' => 'Alamat harus diisi',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput()->with('failed', 'Profil gagal diperbarui!');
        } else {
            Log::info('Original User: ' . json_encode($user->toArray()));
        
            $user->name = $request->name;
            $user->email = $request->email;
            $user->kontak = $request->kontak;
            $user->address = $request->address;
        
            Log::info('Updated User: ' . json_encode($user->toArray()));
            Log::info('User changes: ' . json_encode($user->getDirty()));
        
            $user->save();
        
            return redirect()->route('edit_profil')->with('success', 'Profil berhasil diperbarui!');
        }
    }    
}


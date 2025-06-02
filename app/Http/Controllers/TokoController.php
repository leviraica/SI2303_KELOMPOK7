<?php

namespace App\Http\Controllers;

use App\Models\Toko;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TokoController extends Controller
{
    // Menampilkan form edit profil

    public function index(){
        // isi disini
        $toko=Toko::all();
        return view('users.index', compact('users')); 
    }
    public function create(){
        // isi disini
        return view(view: 'toko.create');
    }
    public function edit(Toko $toko)
    {
        $toko = Toko::findOrFail($id);
        return view('toko.edit', compact('toko'));
    }

    // Update profil toko
    public function update(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);
        
        $request->validate([
            'nama_toko' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:tokos,email,'.$toko->id,
            'alamat' => 'required|string',
            'telepon' => 'required|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'notifikasi_email' => 'boolean',
            'notifikasi_sms' => 'boolean',
        ]);

        $data = $request->except('logo');
    
        $toko->update($data);
        
        return redirect()->route('toko.edit', $toko->id)
            ->with('success', 'Profil toko berhasil diperbarui');
    }

    // Menampilkan form ganti password
    public function editPassword(Toko $toko)
    {
        $toko = Toko::findOrFail($id);
        return view('toko.edit-password', compact('toko'));
    }

    // Update password
    public function updatePassword(Request $request, $id)
    {
        $toko = Toko::findOrFail($id);
        
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        // Verifikasi password saat ini
        if (!Hash::check($request->current_password, $toko->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini tidak sesuai']);
        }

        // Update password
        $toko->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('toko.edit', $toko->id)
            ->with('success', 'Password berhasil diubah');
    }
}
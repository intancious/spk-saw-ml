<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        return view('Admin.pages.profile.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = Auth::user(); // Ambil pengguna yang sedang login
        // dd($user);
        // Update username dan password jika ada
        $user->update([
            'username' => $request->input('username'),
            'password' => $request->filled('password') ? Hash::make($request->input('password')) : $user->password,
        ]);

        // Redirect setelah berhasil
        return redirect()->route('profile.edit')->with('success', 'Profil berhasil diperbarui!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        return view('auth.login');
        // echo "Hello World";
    }

    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ], [
            'username.required' => 'Username Wajib Diisi',
            'password.required' => 'Password Wajib Diisi'
        ]);

        // Info login
        $credentials = $request->only('username', 'password');

        // Coba login
        if (Auth::attempt($credentials)) {
            // Redirect berdasarkan role pengguna
            switch (Auth::user()->role) {
                case 'admin':
                    return redirect('/admin/super')->with('success', 'Berhasil Login!');
                case 'user':
                    return redirect('/admin/user')->with('success', 'Berhasil Login!');
                default:
                    return redirect('/')->withErrors(['error' => 'Role tidak dikenali.']);
            }
        } else {
            // Jika login gagal
            return redirect()->route('login')->withErrors(['login' => 'Login Gagal, Silahkan Coba Lagi'])->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('');
    }
}

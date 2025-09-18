<?php
namespace App\Http\Controllers;

use App\Models\CustomUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('login');
    }

    // Proses login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Mencari pengguna berdasarkan username
        $user = CustomUser::where('username', $request->username)->first();

        // Verifikasi password
        if ($user && Hash::check($request->password, $user->password)) {
            // Login pengguna
            Auth::login($user);  // Menggunakan Auth::login langsung
            return redirect()->route('dashboard')->with('success', 'Login berhasil!');
        }

        return back()->withErrors(['username' => 'Username atau password salah.'])->withInput();
    }

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

<?php
namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Validasi input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Coba login
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            return redirect()->route('dashboard'); // Redirect ke dashboard setelah login
        }

        // Jika gagal, kembalikan dengan error
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

     // ✅ Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // ✅ Proses registrasi user baru
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // 🔐 Enkripsi password
        ]);

        Auth::login($user); // (Opsional) login otomatis setelah registrasi
        return redirect()->route('dashboard')->with('success', 'Registrasi berhasil.');
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('status', 'Anda telah berhasil logout.');
    }
}

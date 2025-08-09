<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email wajib diisi!',
            'email.email' => 'Masukkan email yang valid!',
            'email.unique' => 'Email ini sudah terdaftar!',
            'email.unique' => 'Email sudah terdaftar',
            'password.min' => 'Password harus memiliki minimal 8 karakter',
            'password.required' => 'Password wajib diisi!',
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            return redirect('/');
        }

        return back()->with('failed', 'Email atau Password Salah');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:8'],
        ], [
            'name.required' => 'Nama harus diisi',
            'password.min' => 'Password harus memiliki minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Masukkan email yang valid!',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi!',
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect('/');   
    }

    // public function deleteAccount(Request $request)
    // {
    //     $request->validate([
    //         'password' => 'required',
    //     ], [
    //         'password.required' => 'Password wajib diisi untuk konfirmasi penghapusan akun!',
    //     ]);

    //     $user = Auth::user();

    //     if (!Hash::check($request->password, $user->password)) {
    //         return back()->withErrors(['password' => 'Password yang dimasukkan salah!']);
    //     }

    //     // Hapus user dari database menggunakan User::destroy()
    //     $userId = $user->id;

    //     // Logout sebelum menghapus akun
    //     Auth::logout();
    //     $request->session()->invalidate();
    //     $request->session()->regenerateToken();

    //     // Hapus user dari database setelah logout
    //     User::destroy($userId);

    //     return redirect()->route('login')->with('success', 'Akun Anda telah berhasil dihapus.');
    // }
}

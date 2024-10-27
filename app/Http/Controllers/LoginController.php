<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models;
class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }
    public function login_proses(){
        // memvalidasi input yang dimasukkan user 
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // mengambil inputan user
        $email = request('email');
        $password = request('password');
        // mengecek kecocokan data antara yang dimasukkan user dan yang ada di database
        $user = \App\Models\User::where('email', $email)->first();
        if (!$user || !\Hash::check($password, $user->password)) {
            return redirect()->back()->with('error', 'Email atau password salah');
        }
        // proses login
        auth()->login($user);
        // setelah login berhasil akan diarahkan ke halaman buku.index
        return redirect()->route('buku.index');
    }
    public function logout(){
        // proses logout, menghapus session user dan diarahkan ke halaman login.index
        auth()->logout();
        return redirect()->route('login');
    }
    public function register(){
        return view('auth.register');
    }
    public function register_proses(Request $request){
        // memvalidasi input yang dimasukkan user 
        $request->validate([
            'name' =>'required',
            'email' =>'required|email|unique:users',
            'password' => 'required',
        ]);
        // membuat user baru
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
        ];
        try {
            $user = \App\Models\User::create($data);
            // Jika berhasil, tampilkan data user
        } catch (\Exception $e) {
            // Jika terjadi kesalahan, log kesalahan dan kembalikan error
            \Log::error('Error creating user: ' . $e->getMessage());
            return back()->withErrors(['message' => 'Terjadi kesalahan saat mendaftar.']);
        }
        // setelah pendaftaran berhasil, diarahkan ke halaman login.index
        return redirect()->route('login');
    }

}

<?php

namespace App\Http\Controllers;
use App\Http\Controllers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }
    public function login_proses(){
        // memvalidasi input yang dimasukkan user 
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
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
        auth()->logout();
        return redirect()->route('login');
    }
}

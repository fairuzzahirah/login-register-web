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
        // Validasi inputan
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Ambil data user
        $email = request('email');
        $password = request('password');

        // Cek kecocokan data user
        $user = \App\Models\User::where('email', $email)->first();
        if (!$user || !\Hash::check($password, $user->password)) {
            return redirect()->back()->with('error', 'Email atau password salah');
        }

        // Login user
        auth()->login($user);

        // Redirect ke halaman dashboard
        return redirect()->route('buku.index');
    }
}

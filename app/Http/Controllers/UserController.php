<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Ambil semua data user dari database
        $users = User::all();

        // Kirimkan data ke view
        return view('userlist', compact('users'));
    }
}

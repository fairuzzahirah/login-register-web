<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Controllers;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index() {
        $data_buku = Buku::all()->sortByDesc('id');

        $data_buku = Buku::orderBy('id', 'desc')->get();
        $jumlah_buku = $data_buku->count(); 
        $total_harga = $data_buku->sum('harga');
    
        return view('index', compact('data_buku', 'jumlah_buku', 'total_harga'));
    }
    public function destroy($id){
        $buku = Buku::findOrFail($id); 
        $buku->delete(); 

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus');
    }

}

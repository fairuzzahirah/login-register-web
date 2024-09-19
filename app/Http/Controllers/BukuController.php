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
        $buku = Buku::find($id); 
        $buku->delete(); 

        return redirect('/buku');
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){

        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->save();

        return redirect('/buku')->with('success', 'Buku berhasil ditambahkan');
    }
    public function edit($id)
    {
        $buku = Buku::find($id);
        return view('edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->status = $request->status;
        $buku->save();

        return redirect('/buku')->with('success', 'Buku berhasil diupdate');
    }

}

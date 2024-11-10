<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Http\Controllers\BukuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
    
{
    public function __construct()
    {
        $this->middleware('admin');
    } 
    public function destroy($id){
        $buku = Buku::find($id); 
        $buku->delete(); 

        return redirect('/buku');
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request)
    {
        // Validation rules
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'tgl_terbit' => 'required|date',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image
        ]);

    
        // Handle photo upload if it exists
        if ($request->hasFile('photo')) {
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('photo')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('photo')->storeAs('public', $filenameSimpan);

        }

        // Create and save the Buku record
        $buku = new Buku();
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->photo = $filenameSimpan ?? null;
        $buku->save();
    
        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
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

        return redirect('/buku')->with('success', 
        'Buku berhasil diupdate');
    }
}

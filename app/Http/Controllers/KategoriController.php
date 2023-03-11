<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        $kategori = Kategori::get();

        return view('kategori/index', ['kategori' => $kategori]);
    }

    public function tambah(){
        return view('kategori.form');
    }

    public function simpan(Request $request){
        Kategori::create(['nama'=>$request->nama]);
        return redirect()->route('kategori');
    }

    // Menampilkan Halaman Edit
    public function edit($id, Request $request){
        $kategori = Kategori::find($id)->first();

        return view('kategori.form',['kategori'=>$kategori]);
    }

    public function update($id, Request $request){
        Kategori::find($id)->update(['nama'=> $request->nama]);
        return redirect()->route('kategori');
    }

    public function hapus($id){
        Kategori::find($id)->delete();

        return redirect()->route('kategori');
    }
}

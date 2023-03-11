<?php

namespace App\Http\Controllers;

use App\Models\Kuesioner;
use Illuminate\Http\Request;

class KuesionerController extends Controller
{
    public function index(){
        $kuesioner = Kuesioner::get();

        return view('kuesioner.index',['kuesioner'=>$kuesioner]);
    }

    public function tambah(){
        return view('kuesioner.form');
    }

    public function simpan(Request $request){
        Kuesioner::create([
            'pertanyaan' => $request->pertanyaan,
            'gender'=>$request->gender
        ]);
        return redirect()->route('kuesioner');
    }

    public function edit($id, Request $request){
        $kuesioner = Kuesioner::find($id)->first();
        return view('kuesioner.form',['kuesioner'=>$kuesioner]);
    }

    public function update($id, Request $request){
        Kuesioner::find($id)->update([
            'pertanyaan' => $request->pertanyaan,
            'gender'=> $request->gender
        ]);
            return redirect()->route('kuesioner');
    }

    public function hapus($id){
        Kuesioner::find($id)->delete();
        return redirect()->route('kuesioner');
    }
}

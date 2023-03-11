@extends('layouts.app')
@section('title','Form Kategori')
@section('contents')

    <form action="{{ isset($kategori) ? route('kategori.tambah.update',$kategori->id): route('kategori.tambah.simpan') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($barang) ?'Form Edit Kategori' : 'Form Tambah Kategori' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nama">Nama Kategori</label>
                            <input type="text" class="form-control" name="nama" id="nama" value="{{ isset($kategori) ? $kategori->nama : '' }}">
                        </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kategori') }}" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div> 
    </form>
@endsection
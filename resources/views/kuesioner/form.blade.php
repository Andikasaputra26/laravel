@extends('layouts.app')
@section('title','Form Kuesioner')
@section('contents')

    <form action="{{ isset($kuesioner) ? route('kuesioner.tambah.update',$kuesioner->id): route('kuesioner.tambah.simpan') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ isset($kuesioner) ?'Form Edit Kuesioner' : 'Form Tambah Kuesioner' }}</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="pertnyaan">Pertanyaan</label>
                            <input type="text" class="form-control" name="pertanyaan" id="pertanyaan" value="{{ isset($kuesioner) ? $kuesioner->pertanyaan : '' }}">
                        </div>
    
                        {{-- <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control" name="nama_barang" id="nama_barang"value="{{ isset($barang) ? $barang->nama_barang : '' }}">
                        </div> --}}
    
                        <div class="form-group">
                            <label for="gender">Jawaban</label>
                            <select class="form-control" name="gender" id="gender">
                                <option value="{{ isset($kuesioner) ? $kuesioner->gender : '' }}" selected disabled hidden>-- Pilih Kategori --</option>
                                {{-- @foreach ($kategori as $row)
                                    <option value="{{ $row->id }}" {{ isset($barang) ? ($barang->id_kategori = $row->id ? 'selected' : '' ): ''}} >{{ $row->nama }}</option>
                                @endforeach --}}
                                <option value="ya">Ya</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kuesioner') }}" class="btn btn-warning">Kembali</a>
                    </div>
                </div>
            </div>
        </div> 
    </form>
@endsection
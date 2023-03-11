@extends('layouts.app')
@section('title','Data Kuesioner')
    
@section('contents')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kuesioner</h6>
    </div>
    <div class="card-body">
        @if (auth()->user()->level == 'Admin')
        <a href="{{ route('kuesioner.tambah') }}" class="btn btn-primary mb-3">Tambah Kuesioner</a>
            
        @endif
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        @if (auth()->user()->level == 'Admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($kuesioner as $row)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $row->pertanyaan }}</td>
                            <td>{{ $row->gender }}</td>
                            @if (auth()->user()->level == 'Admin')
                            <td>
                                <a href="{{ route('kuesioner.edit',$row->id) }}" class="btn btn-warning">Edit</a>
                                <a href="{{ route('kuesioner.hapus',$row->id) }}" class="btn btn-danger">Hapus</a>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KuesionerController;

// Halaman Registrasi
Route::controller(AuthController::class)->group(function(){
    Route::get('register','register')->name('register');
    Route::post('register','registerSimpan')->name('register.simpan');
   
    Route::get('login','login')->name('login');
    Route::post('login','loginAksi')->name('login.aksi');

    Route::get('logout','logout')->middleware('auth')->name('logout');
});

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function(){
    Route::get('dashboard',function(){
        return view('dashboard');
    })->name('dashboard');

    Route::controller(BarangController::class)->prefix('barang')->group(function(){
        Route::get('','index')->name('barang');
        Route::get('tambah','tambah')->name('barang.tambah');
        Route::post('tambah','simpan')->name('barang.tambah.simpan');
        Route::get('edit/{id}','edit')->name('barang.edit');
        Route::post('edit/{id}','update')->name('barang.tambah.update');
        Route::get('hapus/{id}','hapus')->name('barang.hapus');
    });

    Route::controller(KategoriController::class)->prefix('kategori')->group(function(){
        Route::get('','index')->name('kategori');
        Route::get('tambah','tambah')->name('kategori.tambah');
        Route::post('tambah','simpan')->name('kategori.tambah.simpan');
        Route::get('edit/{id}','edit')->name('kategori.edit');
        Route::post('edit/{id}','update')->name('kategori.tambah.update');
        Route::get('hapus/{id}','hapus')->name('kategori.hapus');
    });

    Route::controller(KuesionerController::class)->prefix('kuesioner')->group(function(){
        Route::get('','index')->name('kuesioner');
        Route::get('tambah','tambah')->name('kuesioner.tambah');
        Route::post('tambah','simpan')->name('kuesioner.tambah.simpan');
        Route::get('edit/{id}','edit')->name('kuesioner.edit');
        Route::post('edit/{id}','update')->name('kuesioner.tambah.update');
        Route::get('hapus/{id}','hapus')->name('kuesioner.hapus');

    });
});
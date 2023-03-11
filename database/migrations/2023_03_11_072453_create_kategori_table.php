<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->timestamps();
        });

        // Menghapus kolom kategori_barang
        Schema::table('barang',function(Blueprint $table){
            // Menghapus kolom kategori_barang
            $table->dropColumn('kategori_barang');
            // Mengganti kolom
            $table->foreignId('id_kategori')->nullable()->references('id')->on('kategori');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori');
    }
};

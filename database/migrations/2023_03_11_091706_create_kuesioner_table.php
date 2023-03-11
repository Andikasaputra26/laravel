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
        Schema::create('kuesioner', function (Blueprint $table) {
            $table->id();
            $table->string('pertanyaan');
            $table->string('gender');
            $table->timestamps();
        });
        // Menghapus kolom 
        Schema::table('kusioner',function(Blueprint $table){
            // Menghapus kolom kategori_barang
            $table->dropColumn('gender');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kuesioner');
    }
};

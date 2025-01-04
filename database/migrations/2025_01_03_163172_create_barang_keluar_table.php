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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
    $table->string('kode_barang');
    $table->integer('quantity');
    $table->string('destination');
    $table->date('tanggal_keluar');
    $table->timestamps();

    $table->foreign('kode_barang')->references('kode_barang')->on('stok_barangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};

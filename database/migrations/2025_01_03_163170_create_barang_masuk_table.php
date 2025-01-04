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
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang');
            $table->integer('quantity');
            $table->string('origin');
            $table->date('tanggal_masuk');
            $table->timestamps();

            $table->foreign('kode_barang')->references('kode_barang')->on('stok_barangs');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }

//     public function down()
// {
//     Schema::table('stok_barangs', function (Blueprint $table) {
//         $table->dropColumn('tanggal_masuk');
//     });
// }
};

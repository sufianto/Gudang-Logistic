<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stok_barangs', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->date('tanggal_masuk')->nullable();
            // $table->date('tanggal_masuk')->default(DB::raw('CURRENT_DATE'));
            $table->integer('stok');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    // public function down(): void
    // {
    //     Schema::dropIfExists('stok_barangs');
    // }
    public function down()
{
    Schema::table('stok_barangs', function (Blueprint $table) {
        $table->dropColumn('stok');
        $table->dropColumn('tanggal_masuk');
    });
}
};

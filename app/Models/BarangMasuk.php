<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model {
    protected $fillable = ['kode_barang', 'quantity', 'origin', 'tanggal_masuk'];

    public function stokBarang() {
        return $this->belongsTo(StokBarang::class, 'kode_barang', 'kode_barang');
    }
//     public function stok()
// {
//     return $this->belongsTo(StokBarang::class, 'kode_barang', 'kode_barang');
// }
}

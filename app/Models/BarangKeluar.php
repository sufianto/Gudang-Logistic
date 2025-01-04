<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model {
    protected $fillable = ['kode_barang', 'quantity', 'destination', 'tanggal_keluar'];

    public function stokBarang() {
        return $this->belongsTo(StokBarang::class, 'kode_barang', 'kode_barang');
    }

    // use HasFactory;

    // protected $fillable = ['kode_barang', 'quantity', 'destination', 'tanggal_keluar'];

    // protected static function boot()
    // {
    //     parent::boot();

    //     // Kurangi stok setelah barang keluar disimpan
    //     static::created(function ($barangKeluar) {
    //         $stok = StokBarang::where('kode_barang', $barangKeluar->kode_barang)->first();
            
    //         if ($stok) {
    //             $stok->quantity -= $barangKeluar->quantity;
    //             $stok->save();
    //         }
    //     });
    // }
    protected static function boot()
{
    parent::boot();

    // Kurangi stok setelah barang keluar disimpan
    static::created(function ($barangKeluar) {
        $stok = StokBarang::where('kode_barang', $barangKeluar->kode_barang)->first();

        if ($stok) {
            // Correct column name: 'stok', not 'quantity'
            $stok->stok -= $barangKeluar->quantity; // Using 'stok' to update
            $stok->save();
        }
    });
}
}


<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StokBarang extends Model {
    protected $fillable = ['kode_barang', 'nama_barang', 'stok'];

    public function barangMasuk() {
        return $this->hasMany(BarangMasuk::class, 'kode_barang', 'kode_barang');
    }

    public function barangKeluar() {
        return $this->hasMany(BarangKeluar::class, 'kode_barang', 'kode_barang');
    }

    protected $attributes = [
        'tanggal_masuk' => null,
    ];
    
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            if (!$model->tanggal_masuk) {
                $model->tanggal_masuk = now()->toDateString();
            }
        });
    }

}


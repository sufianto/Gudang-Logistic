<?php

// BarangController.php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BarangMasuk;
use App\Models\BarangKeluar;
use App\Models\StokBarang;

class BarangController extends Controller
{
    // Daftar Barang Masuk
    public function daftarBarangMasuk() {
        $barangMasuk = BarangMasuk::all();
        return view('barang-masuk.daftar', compact('barangMasuk'));
    }

    // Form Pencatatan Barang Masuk
    public function formBarangMasuk() {
        $stokBarangs = StokBarang::all();
        return view('barang-masuk.form', compact('stokBarangs'));
    }

    public function simpanBarangMasuk(Request $request) {
        $request->validate([
            'kode_barang' => 'required',
            'quantity' => 'required',
            'origin' => 'required',
            'tanggal_masuk' => 'required|date',
        ]);
    
        // Cek apakah kode_barang ada di stok_barangs
        $stok = StokBarang::where('kode_barang', $request->kode_barang)->first();
    
        if (!$stok) {
            return redirect()->back()->with('error', 'Kode Barang tidak ditemukan di Stok!');
        }
    
        // Membuat entri BarangMasuk
        $barangMasuk = BarangMasuk::create($request->all());
    
        // Update stok di stok_barangs dan masukkan tanggal_masuk
        $stok->stok += $barangMasuk->quantity;
        $stok->tanggal_masuk = $request->tanggal_masuk; // Menambahkan tanggal_masuk dari form
        $stok->save();
    
        return redirect()->route('barang-masuk.daftar');
    }

    // Daftar Barang Keluar
    public function daftarBarangKeluar() {
        $barangKeluar = BarangKeluar::all();
        return view('barang-keluar.daftar', compact('barangKeluar'));
    }

    // // Form Pencatatan Barang Keluar
    // public function formBarangKeluar() {
    //     return view('barang-keluar.form');
    // }
    public function formBarangKeluar() {
        $stokBarangs = StokBarang::all();  // Ambil data stok barang
        return view('barang-keluar.form', compact('stokBarangs'));
    }

    // Simpan Barang Keluar
    public function simpanBarangKeluar(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required',
            'quantity' => 'required|integer|min:1',
            'destination' => 'required',
            'tanggal_keluar' => 'required|date',
        ]);
    
        // Get the stock for the specified item
        $stok = StokBarang::where('kode_barang', $request->kode_barang)->first();
    
        // Check if stock is available and enough for the requested quantity
        if (!$stok || $stok->stok < $request->quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }
    
        // Create the BarangKeluar entry
        BarangKeluar::create($request->all());
    
        // Update stock after the item is successfully recorded
        $stok->stok -= $request->quantity; // Use the correct 'stok' column here
        $stok->save();
    
        return redirect()->route('barang-keluar.daftar')->with('success', 'Barang Keluar berhasil dicatat dan stok diperbarui');
    }
    
    

   










// EDIT & UPDATE BARANG MASUK
public function editBarangMasuk($id) {
    $barangMasuk = BarangMasuk::findOrFail($id);
    return view('barang-masuk.edit', compact('barangMasuk'));
}

public function updateBarangMasuk(Request $request, $id) {
    $request->validate([
        'kode_barang' => 'required',
        'quantity' => 'required',
        'origin' => 'required',
        'tanggal_masuk' => 'required',
    ]);

    $barangMasuk = BarangMasuk::findOrFail($id);

    // Ambil data stok yang ada sebelumnya
    $stok = StokBarang::where('kode_barang', $barangMasuk->kode_barang)->first();

    // Hitung perubahan quantity (jika ada perubahan quantity)
    $stok->stok -= $barangMasuk->quantity; // Mengurangi stok berdasarkan quantity barang yang lama
    $stok->stok += $request->quantity;     // Menambahkan stok berdasarkan quantity barang yang baru

    // Update data barang masuk
    $barangMasuk->update($request->all());

    // Simpan stok yang sudah diperbarui
    $stok->save();

    return redirect()->route('barang-masuk.daftar')->with('success', 'Barang Masuk berhasil diperbarui dan stok terupdate');
}


// HAPUS BARANG MASUK
public function hapusBarangMasuk($id) {
      // Ambil data barang masuk yang akan dihapus
      $barangMasuk = BarangMasuk::findOrFail($id);
    
      // Ambil data stok barang berdasarkan kode_barang
      $stok = StokBarang::where('kode_barang', $barangMasuk->kode_barang)->first();
    
      // Simpan stok sebelumnya
      $previousStok = $stok->stok;
    
      // Hapus data barang masuk
      $barangMasuk->delete();
    
      // Kembalikan stok ke nilai sebelumnya
      $stok->stok -= $barangMasuk->quantity; // Mengurangi stok berdasarkan quantity yang sebelumnya
      $stok->save();
    
      return redirect()->route('barang-masuk.daftar')->with('success', 'Barang Masuk berhasil dihapus dan stok terupdate');
    }
    

// EDIT & UPDATE BARANG KELUAR
public function editBarangKeluar($id) {
    $barangKeluar = BarangKeluar::findOrFail($id);
    return view('barang-keluar.edit', compact('barangKeluar'));
}

public function updateBarangKeluar(Request $request, $id) {
    $request->validate([
        'kode_barang' => 'required',
        'quantity' => 'required',
        'destination' => 'required',
        'tanggal_keluar' => 'required',
    ]);

    $barangKeluar = BarangKeluar::findOrFail($id);

    // Ambil data stok yang ada sebelumnya
    $stok = StokBarang::where('kode_barang', $barangKeluar->kode_barang)->first();

    // Hitung perubahan quantity (jika ada perubahan quantity)
    $stok->stok += $barangKeluar->quantity; // Menambahkan stok berdasarkan quantity barang yang lama
    $stok->stok -= $request->quantity;     // Mengurangi stok berdasarkan quantity barang yang baru

    // Update data barang keluar
    $barangKeluar->update($request->all());

    // Simpan stok yang sudah diperbarui
    $stok->save();

    return redirect()->route('barang-keluar.daftar')->with('success', 'Barang Keluar berhasil diperbarui dan stok terupdate');
}


// HAPUS BARANG KELUAR
public function hapusBarangKeluar($id) {
      // Ambil data barang keluar yang akan dihapus
      $barangKeluar = BarangKeluar::findOrFail($id);
    
      // Ambil data stok barang berdasarkan kode_barang
      $stok = StokBarang::where('kode_barang', $barangKeluar->kode_barang)->first();
    
      // Simpan stok sebelumnya
      $previousStok = $stok->stok;
    
      // Hapus data barang keluar
      $barangKeluar->delete();
    
      // Kembalikan stok ke nilai sebelumnya
      $stok->stok += $barangKeluar->quantity; // Menambahkan stok berdasarkan quantity yang sebelumnya
      $stok->save();
    
      return redirect()->route('barang-keluar.daftar')->with('success', 'Barang Keluar berhasil dihapus dan stok terupdate');
    }
    

 // Daftar Stok Barang
 public function daftarStok() {
    $stokBarang = StokBarang::all();
    return view('stok.daftar', compact('stokBarang'));
}

    // Form Pencatatan Stok Barang
    public function formStok() {
        return view('stok.form');
    }
     // Simpan Stok Barang
     public function simpanStok(Request $request)
     {
         $request->validate([
             'kode_barang' => 'required|unique:stok_barangs',
             'stok' => 'required|integer|min:0',
            //  'tanggal_masuk' => 'required|date',
         ]);
 
         StokBarang::create($request->all());
 
         return redirect()->route('stok-barang.daftar')->with('success', 'Stok Barang berhasil ditambahkan');
     }
// EDIT & UPDATE STOK BARANG
public function editStok($id) {
    $stokBarang = StokBarang::findOrFail($id);
    return view('stok.edit', compact('stokBarang'));
}

public function updateStok(Request $request, $id) {
    $request->validate([
        'kode_barang' => 'required',
        'stok' => 'required|integer|min:0',
        // 'tanggal_masuk' => 'required|date',
    ]);

    $stokBarang = StokBarang::findOrFail($id);
    $stokBarang->update($request->all());

    return redirect()->route('stok-barang.daftar')->with('success', 'Stok Barang berhasil diperbarui');
}

 // Hapus Stok Barang
 public function hapusStok($id) {
    $stokBarang = StokBarang::findOrFail($id);
    $stokBarang->delete();

    return redirect()->route('stok-barang.daftar')->with('success', 'Stok Barang berhasil dihapus');
}






// Laporan Barang Masuk
public function formBarangMasukLaporan() {
    return view('barang-masuk.laporan', [
        'judul' => 'Laporan Barang Masuk',
    ]);
}

public function cetakBarangMasuk(Request $request)
{
    // Validasi input tanggal
    $request->validate([
        'tanggal_awal' => 'required|date',
        'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
    ], [
        'tanggal_awal.required' => 'Tanggal Awal harus diisi.',
        'tanggal_akhir.required' => 'Tanggal Akhir harus diisi.',
        'tanggal_akhir.after_or_equal' => 'Tanggal Akhir harus lebih besar atau sama dengan Tanggal Awal.',
    ]);

    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');
    
    // Query Barang Masuk berdasarkan tanggal
    $barangMasuk = BarangMasuk::whereBetween('tanggal_masuk', [$tanggalAwal, $tanggalAkhir])->orderBy('id', 'desc')->get();
    
    return view('barang-masuk.cetak', [
        'judul' => 'Laporan Barang Masuk',
        'tanggalAwal' => $tanggalAwal,
        'tanggalAkhir' => $tanggalAkhir,
        'cetak' => $barangMasuk
    ]);
}

// Laporan Barang Keluar
public function formBarangKeluarLaporan() {
    return view('barang-keluar.laporan', [
        'judul' => 'Laporan Barang Keluar',
    ]);
}

public function cetakBarangKeluar(Request $request)
{
    // Validasi input tanggal
    $request->validate([
        'tanggal_awal' => 'required|date',
        'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
    ], [
        'tanggal_awal.required' => 'Tanggal Awal harus diisi.',
        'tanggal_akhir.required' => 'Tanggal Akhir harus diisi.',
        'tanggal_akhir.after_or_equal' => 'Tanggal Akhir harus lebih besar atau sama dengan Tanggal Awal.',
    ]);

    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');
    
    // Query Barang Keluar berdasarkan tanggal
    $barangKeluar = BarangKeluar::whereBetween('tanggal_keluar', [$tanggalAwal, $tanggalAkhir])->orderBy('id', 'desc')->get();
    
    return view('barang-keluar.cetak', [
        'judul' => 'Laporan Barang Keluar',
        'tanggalAwal' => $tanggalAwal,
        'tanggalAkhir' => $tanggalAkhir,
        'cetak' => $barangKeluar
    ]);
}


// Laporan Stok Barang
public function formStokLaporan() {
    return view('stok.laporan', [
        'judul' => 'Laporan Stok Barang',
    ]);
}

public function cetakStok(Request $request)
{
    // Validasi input tanggal
    $request->validate([
        'tanggal_awal' => 'required|date',
        'tanggal_akhir' => 'required|date|after_or_equal:tanggal_awal',
    ], [
        'tanggal_awal.required' => 'Tanggal Awal harus diisi.',
        'tanggal_akhir.required' => 'Tanggal Akhir harus diisi.',
        'tanggal_akhir.after_or_equal' => 'Tanggal Akhir harus lebih besar atau sama dengan Tanggal Awal.',
    ]);

    $tanggalAwal = $request->input('tanggal_awal');
    $tanggalAkhir = $request->input('tanggal_akhir');
    
    // Query Stok Barang berdasarkan tanggal masuk
    $stokBarang = StokBarang::whereBetween('tanggal_masuk', [$tanggalAwal, $tanggalAkhir])
                            ->orderBy('tanggal_masuk', 'desc')
                            ->get();
    
    return view('stok.cetak', [
        'judul' => 'Laporan Stok Barang',
        'tanggalAwal' => $tanggalAwal,
        'tanggalAkhir' => $tanggalAkhir,
        'cetak' => $stokBarang
    ]);
}


}
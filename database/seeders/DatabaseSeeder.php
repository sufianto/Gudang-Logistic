<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kategori;
use App\Models\StokBarang;



class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
      
        #data user
    User::create([
        'nama' => 'Administrator',
        'email' => 'admin@gmail.com',
        'role' => '1',
        'status' => 1,
        'hp' => '0812345678901',
        'foto' => '20250103224802_677806b22846a.jpg',
        'password' => bcrypt('P@55word'),
        ]);
        #untuk record berikutnya silahkan, beri nilai berbeda pada nilai: nama, email, hp dengan nilai masing-masing anggota kelompok
    User::create([
        'nama' => 'Sopian Aji',
        'email' => 'sopian4ji@gmail.com',
        'role' => '0',
        'status' => 1,
        'hp' => '081234567892',
        'foto' => '20250103224802_677806b22846a.jpg',
        'password' => bcrypt('P@55word'),
        ]);
  
    StokBarang::create([
            'kode_barang' => 'BRG001', 
            'tanggal_masuk' => '2025-01-04', 
            'stok' => 100,
           
        ]);
        StokBarang::create([
            'kode_barang' => 'BRG002', 
            'tanggal_masuk' => '2025-01-04', 
            'stok' => 150,
           
        ]);
 
       
    }
}

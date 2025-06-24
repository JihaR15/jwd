<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['barang_id' => 1, 'kategori_id' => 1, 'barang_kode' => 'FNB001', 'barang_nama' => 'Roti Tawar', 'harga_beli' => 10000, 'harga_jual' => 13000],
            ['barang_id' => 2, 'kategori_id' => 1, 'barang_kode' => 'FNB002', 'barang_nama' => 'Susu UHT', 'harga_beli' => 12000, 'harga_jual' => 15000],
            ['barang_id' => 3, 'kategori_id' => 2, 'barang_kode' => 'BTY001', 'barang_nama' => 'Pelembab Wajah', 'harga_beli' => 25000, 'harga_jual' => 32000],
            ['barang_id' => 4, 'kategori_id' => 2, 'barang_kode' => 'BTY002', 'barang_nama' => 'Minyak Wangi', 'harga_beli' => 50000, 'harga_jual' => 65000],
            ['barang_id' => 5, 'kategori_id' => 3, 'barang_kode' => 'HOME001', 'barang_nama' => 'Sabun Cuci Piring', 'harga_beli' => 8000, 'harga_jual' => 12000],
            ['barang_id' => 6, 'kategori_id' => 3, 'barang_kode' => 'HOME002', 'barang_nama' => 'Kemoceng', 'harga_beli' => 15000, 'harga_jual' => 20000],
            ['barang_id' => 7, 'kategori_id' => 4, 'barang_kode' => 'BABY001', 'barang_nama' => 'Botol Susu', 'harga_beli' => 25000, 'harga_jual' => 30000],
            ['barang_id' => 8, 'kategori_id' => 4, 'barang_kode' => 'BABY002', 'barang_nama' => 'Bedak Bayi', 'harga_beli' => 18000, 'harga_jual' => 25000],
            ['barang_id' => 9, 'kategori_id' => 5, 'barang_kode' => 'ELEC001', 'barang_nama' => 'Setrika', 'harga_beli' => 200000, 'harga_jual' => 250000],
            ['barang_id' => 10, 'kategori_id' => 5, 'barang_kode' => 'ELEC002', 'barang_nama' => 'Rice Cooker', 'harga_beli' => 350000, 'harga_jual' => 450000],
        ];

        DB::table('m_barang')->insert($data);
    }
}

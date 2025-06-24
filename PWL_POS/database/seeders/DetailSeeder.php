<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        $detail_id = 1;

        for ($penjualan_id = 1; $penjualan_id <= 10; $penjualan_id++) {
            for ($i = 0; $i < 3; $i++) { // 3 barang per transaksi
                $barang_id = rand(1, 10); // Barang acak dari 1-10
                $harga = rand(5000, 300000); // Harga random sesuai range barang
                $jumlah = rand(1, 5); // Jumlah barang random 1-5

                $data[] = [
                    'detail_id' => $detail_id++,
                    'penjualan_id' => $penjualan_id,
                    'barang_id' => $barang_id,
                    'harga' => $harga,
                    'jumlah' => $jumlah,
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'penjualan_id' => $i,
                'user_id' => ($i % 2 == 0) ? 2 : 1,  // Alternatif antara user_id 1 dan 2
                'pembeli' => 'Pembeli ' . $i,  // Nama pembeli dinamis
                'penjualan_kode' => 'PJ' . str_pad($i, 4, '0', STR_PAD_LEFT),  // Kode transaksi unik
                'penjualan_tanggal' => now()->subDays(10 - $i),  // Tanggal dinamis dari hari ini ke belakang
            ];
        }

        DB::table('t_penjualan')->insert($data);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 10; $i++) {
            $data[] = [
                'stok_id' => $i,
                'barang_id' => $i,
                'user_id' => ($i % 2 == 0) ? 2 : 1, // Alternatif antara user_id 1 dan 2
                'stok_tanggal' => now()->subDays(10 - $i),
                'stok_jumlah' => rand(20, 60),
            ];
        }

        DB::table('t_stok')->insert($data);
    }
}

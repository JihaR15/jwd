<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'supplier_kode' => 'S001',
                'supplier_nama' => 'PT. Pemandangan Sejuk Sulawesi Utara ',
                'supplier_alamat' => 'Jl. Sam Ratulangi No. 45, Manado',
                'supplier_telepon' => '08111111111',
            ],
            [
                'supplier_kode' => 'S002',
                'supplier_nama' => 'CV. Hitam Legam',
                'supplier_alamat' => 'JJl. Pahlawan No. 75, Malang',
                'supplier_telepon' => '08222222222',
            ],
            [
                'supplier_kode' => 'S003',
                'supplier_nama' => 'UD. Waluyo',
                'supplier_alamat' => 'Jl. Imam Bonjol No. 32, Denpasar',
                'supplier_telepon' => '08333333333',
            ],
        ];

        DB::table('m_supplier')->insert($suppliers);  
    }
}

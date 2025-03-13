<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_id' => 1,
                'supplier_nama' => 'Supplier A',
                'supplier_kode' => 'SUP001',
                'supplier_alamat' => 'Alamat A',
                'supplier_telepon' => '1234567890',
            ],
            [
                'supplier_id' => 2,
                'supplier_nama' => 'Supplier B',
                'supplier_kode' => 'SUP002',
                'supplier_alamat' => 'Alamat B',
                'supplier_telepon' => '0987654321',
            ],
            [
                'supplier_id' => 3,
                'supplier_nama' => 'Supplier C',
                'supplier_kode' => 'SUP003',
                'supplier_alamat' => 'Alamat C',
                'supplier_telepon' => '1122334455',
            ],
        ];

        DB::table('m_supplier')->insert($data);
    }
}

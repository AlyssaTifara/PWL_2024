<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
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
                'nama_barang' => 'BMW M4',
                'barang_kode' => 'BRG001',
                'kategori_id' => 1, // Mobil
                'harga_beli' => 2650000000,
                'harga_jual' => 2700000000,
            ],
            [
                'nama_barang' => 'Hyundai Palisade',
                'barang_kode' => 'BRG002',
                'kategori_id' => 1,
                'harga_beli' => 1000000000,
                'harga_jual' => 1500000000,
            ],
            [
                'nama_barang' => 'Toyota Camry',
                'barang_kode' => 'BRG003',
                'kategori_id' => 1,
                'harga_beli' => 1000000000,
                'harga_jual' => 1200000000,
            ],
            [
                'nama_barang' => 'Ralph Lauren Polo Shirt',
                'barang_kode' => 'BRG004',
                'kategori_id' => 2, // Baju
                'harga_beli' => 1500000,
                'harga_jual' => 1700000,
            ],
            [
                'nama_barang' => 'H&M Polo Shirt',
                'barang_kode' => 'BRG005',
                'kategori_id' => 2,
                'harga_beli' => 500000,
                'harga_jual' => 700000,
            ],
            [
                'nama_barang' => 'Adidas T-Shirt',
                'barang_kode' => 'BRG006',
                'kategori_id' => 2,
                'harga_beli' => 300000,
                'harga_jual' => 400000,
            ],
            [
                'nama_barang' => 'Levis Jeans',
                'barang_kode' => 'BRG007',
                'kategori_id' => 3, // Celana
                'harga_beli' => 2500000,
                'harga_jual' => 2700000,
            ],
            [
                'nama_barang' => 'Ankle Pants',
                'barang_kode' => 'BRG008',
                'kategori_id' => 3,
                'harga_beli' => 800000,
                'harga_jual' => 1000000,
            ],
            [
                'nama_barang' => 'Nike Joggers',
                'barang_kode' => 'BRG009',
                'kategori_id' => 3,
                'harga_beli' => 600000,
                'harga_jual' => 800000,
            ],
            [
                'nama_barang' => 'Yamaha XSR 155',
                'barang_kode' => 'BRG010',
                'kategori_id' => 4, // Motor
                'harga_beli' => 37000000,
                'harga_jual' => 40000000,
            ],
            [
                'nama_barang' => 'Ducati',
                'barang_kode' => 'BRG011',
                'kategori_id' => 4,
                'harga_beli' => 450000,
                'harga_jual' => 500000,
            ],
            [
                'nama_barang' => 'Honda CBR 150',
                'barang_kode' => 'BRG012',
                'kategori_id' => 4,
                'harga_beli' => 30000000,
                'harga_jual' => 35000000,
            ],
            [
                'nama_barang' => 'Garmin Smartwatch',
                'barang_kode' => 'BRG013', // perbaikan penamaan kode
                'kategori_id' => 5, // Olahraga
                'harga_beli' => 5000000,
                'harga_jual' => 4535000,
            ],
            [
                'nama_barang' => 'Nike Air Jordan 4',
                'barang_kode' => 'BRG014',
                'kategori_id' => 5,
                'harga_beli' => 3535000,
                'harga_jual' => 4000000,
            ],
            [
                'nama_barang' => 'Puma Running Shoes',
                'barang_kode' => 'BRG015',
                'kategori_id' => 5,
                'harga_beli' => 1200000,
                'harga_jual' => 1500000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}

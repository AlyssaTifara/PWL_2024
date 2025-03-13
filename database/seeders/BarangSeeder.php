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
                'barang_id' => 1,
                'nama_barang' => 'BMW M4',
                'barang_kode' => 'BRG001',
                'kategori_id' => 1, // Mobil
                'harga_beli' => 2_650_000_000,
                'harga_jual' => 2_700_000_000,
            ],
            [
                'barang_id' => 1,
                'nama_barang' => 'Hyundai Palisade',
                'barang_kode' => 'BRG002',
                'kategori_id' => 1, // Mobil
                'harga_beli' => 1_000_000_000,
                'harga_jual' => 1_500_000_000,
            ],
            [
                'barang_id' => 1,
                'nama_barang' => 'Toyota Camry',
                'barang_kode' => 'BRG003',
                'kategori_id' => 1, // Mobil
                'harga_beli' => 1_000_000_000,
                'harga_jual' => 1_200_000_000,
            ],
            [
                'barang_id' => 2,
                'nama_barang' => 'Ralph Lauren Polo Shirt',
                'barang_kode' => 'BRG004',
                'kategori_id' => 2, // Baju
                'harga_beli' => 1_500_000,
                'harga_jual' => 1_700_000,
            ],
            [
                'barang_id' => 2,
                'nama_barang' => 'H&M Polo Shirt',
                'barang_kode' => 'BRG005',
                'kategori_id' => 2, // Baju
                'harga_beli' => 500_000,
                'harga_jual' => 700_000,
            ],
            [
                'barang_id' => 2,
                'nama_barang' => 'Adidas T-Shirt',
                'barang_kode' => 'BRG006',
                'kategori_id' => 2, // Baju
                'harga_beli' => 300_000,
                'harga_jual' => 400_000,
            ],
            [
                'barang_id' => 3,
                'nama_barang' => 'Levis Jeans',
                'barang_kode' => 'BRG007',
                'kategori_id' => 3, // Celana
                'harga_beli' => 2_500_000,
                'harga_jual' => 2_700_000,
            ],
            [
                'barang_id' => 3,
                'nama_barang' => 'Ankle Pants',
                'barang_kode' => 'BRG008',
                'kategori_id' => 3, // Celana
                'harga_beli' => 800_000,
                'harga_jual' => 1_000_000,
            ],
            [
                'barang_id' => 3,
                'nama_barang' => 'Nike Joggers',
                'barang_kode' => 'BRG009',
                'kategori_id' => 3, // Celana
                'harga_beli' => 600_000,
                'harga_jual' => 800_000,
            ],
            [
                'barang_id' => 4,
                'nama_barang' => 'Yamaha XSR 155',
                'barang_kode' => 'BRG010',
                'kategori_id' => 4, // Motor
                'harga_beli' => 37_000_000,
                'harga_jual' => 40_000_000,
            ],
            [
                'barang_id' => 4,
                'nama_barang' => 'Ducati',
                'barang_kode' => 'BRG011',
                'kategori_id' => 4, // Motor
                'harga_beli' => 450_000,
                'harga_jual' => 500_000,
            ],
            [
                'barang_id' => 4,
                'nama_barang' => 'Honda CBR 150',
                'barang_kode' => 'BRG012',
                'kategori_id' => 4, // Motor
                'harga_beli' => 30_000_000,
                'harga_jual' => 35_000_000,
            ],
            [
                'barang_id' => 5,
                'nama_barang' => 'Garmin Smartwatch',
                'barang_kode' => 'BRG0013',
                'kategori_id' => 5, // Olahraga
                'harga_beli' => 5_000_000,
                'harga_jual' => 4_535_000,
            ],
            [
                'barang_id' => 5,
                'nama_barang' => 'Nike Air Jordan 4',
                'barang_kode' => 'BRG014',
                'kategori_id' => 5, // Olahraga
                'harga_beli' => 3_535_000,
                'harga_jual' => 4_000_000,
            ],
            [
                'barang_id' => 5,
                'nama_barang' => 'Puma Running Shoes',
                'barang_kode' => 'BRG015',
                'kategori_id' => 5, // Olahraga
                'harga_beli' => 1_200_000,
                'harga_jual' => 1_500_000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}

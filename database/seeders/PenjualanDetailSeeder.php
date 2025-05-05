<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['penjualan_id' => 1, 'barang_id' => 1, 'harga' => 2700000000, 'jumlah' => 1],
            ['penjualan_id' => 1, 'barang_id' => 4, 'harga' => 1700000, 'jumlah' => 2],
            ['penjualan_id' => 1, 'barang_id' => 7, 'harga' => 2700000, 'jumlah' => 1],
            
            ['penjualan_id' => 2, 'barang_id' => 10, 'harga' => 40000000, 'jumlah' => 1],
            ['penjualan_id' => 2, 'barang_id' => 13, 'harga' => 4535000, 'jumlah' => 2],
            ['penjualan_id' => 2, 'barang_id' => 1, 'harga' => 2700000000, 'jumlah' => 1],
            
            ['penjualan_id' => 3, 'barang_id' => 4, 'harga' => 1700000, 'jumlah' => 1],
            ['penjualan_id' => 3, 'barang_id' => 7, 'harga' => 2700000, 'jumlah' => 2],
            ['penjualan_id' => 3, 'barang_id' => 10, 'harga' => 40000000, 'jumlah' => 1],
            
            ['penjualan_id' => 4, 'barang_id' => 13, 'harga' => 4535000, 'jumlah' => 2],
            ['penjualan_id' => 4, 'barang_id' => 1, 'harga' => 2700000000, 'jumlah' => 1],
            ['penjualan_id' => 4, 'barang_id' => 4, 'harga' => 1700000, 'jumlah' => 1],
            
            ['penjualan_id' => 5, 'barang_id' => 7, 'harga' => 2700000, 'jumlah' => 2],
            ['penjualan_id' => 5, 'barang_id' => 10, 'harga' => 40000000, 'jumlah' => 1],
            ['penjualan_id' => 5, 'barang_id' => 13, 'harga' => 4535000, 'jumlah' => 1],
            
            ['penjualan_id' => 6, 'barang_id' => 1, 'harga' => 2700000000, 'jumlah' => 1],
            ['penjualan_id' => 6, 'barang_id' => 4, 'harga' => 1700000, 'jumlah' => 1],
            ['penjualan_id' => 6, 'barang_id' => 7, 'harga' => 2700000, 'jumlah' => 2],
            
            ['penjualan_id' => 7, 'barang_id' => 10, 'harga' => 40000000, 'jumlah' => 1],
            ['penjualan_id' => 7, 'barang_id' => 13, 'harga' => 4535000, 'jumlah' => 2],
            ['penjualan_id' => 7, 'barang_id' => 1, 'harga' => 2700000000, 'jumlah' => 1],
            
            ['penjualan_id' => 8, 'barang_id' => 4, 'harga' => 1700000, 'jumlah' => 1],
            ['penjualan_id' => 8, 'barang_id' => 7, 'harga' => 2700000, 'jumlah' => 2],
            ['penjualan_id' => 8, 'barang_id' => 10, 'harga' => 40000000, 'jumlah' => 1],
            
            ['penjualan_id' => 9, 'barang_id' => 13, 'harga' => 4535000, 'jumlah' => 2],
            ['penjualan_id' => 9, 'barang_id' => 1, 'harga' => 2700000000, 'jumlah' => 1],
            ['penjualan_id' => 9, 'barang_id' => 4, 'harga' => 1700000, 'jumlah' => 1],
            
            ['penjualan_id' => 10, 'barang_id' => 7, 'harga' => 2700000, 'jumlah' => 2],
            ['penjualan_id' => 10, 'barang_id' => 10, 'harga' => 40000000, 'jumlah' => 1],
            ['penjualan_id' => 10, 'barang_id' => 13, 'harga' => 4535000, 'jumlah' => 1],
        ];

        DB::table('t_penjualan_detail')->insert($data);
    }
}

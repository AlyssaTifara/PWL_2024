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
    $data = [
    [
    'supplier_id' => 2,
    'barang_id' => 1,
    'user_id' => 1, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 100
    ],
    [
    'supplier_id' => 7,
    'barang_id' => 2,
    'user_id' => 1, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 150
    ],
    [
    'supplier_id' => 1,
    'barang_id' => 3,
    'user_id' => 2, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 200
    ],
    [
    'supplier_id' => 2,
    'barang_id' => 4,
    'user_id' => 2, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 120
    ],
    [
        'supplier_id' => 6,
    'barang_id' => 5,
    'user_id' => 3, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 80
    ],
    [
    'supplier_id' => 9,
    'barang_id' => 6,
    'user_id' => 3, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 90
    ],
    [
    'supplier_id' => 1,
    'barang_id' => 7,
    'user_id' => 1, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 110
    ],
    [
    'supplier_id' => 3,
    'barang_id' => 8,
    'user_id' => 2, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 130
    ],
    [
    'supplier_id' => 4,
    'barang_id' => 9,
    'user_id' => 3, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 160
    ],
    [
    'supplier_id' => 5,
    'barang_id' => 10,
    'user_id' => 1, // Ganti dengan user_id yang valid
    'stok_tanggal' => now(),
    'stok_jumlah' => 180
    ],
    ];
    DB::table('t_stok')->insert($data);
    }
}
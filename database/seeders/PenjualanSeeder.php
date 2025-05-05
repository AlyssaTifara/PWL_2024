<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
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
                'user_id' => 1, // Ganti dengan user_id yang valid
                'pembeli' => 'Tissa',
                'penjualan_kode' => 'PJL001',
                'penjualan_tanggal' => now()
            ],
            [
                'user_id' => 2, // Ganti dengan user_id yang valid
                'pembeli' => 'Reza',
                'penjualan_kode' => 'PJL002',
                'penjualan_tanggal' => now()->addMinutes(15)
            ],
            [
                'user_id' => 3, // Ganti dengan user_id yang valid
                'pembeli' => 'Kepin',
                'penjualan_kode' => 'PJL003',
                'penjualan_tanggal' => now()->addMinutes(20)
            ],
            [
                'user_id' => 1, // Ganti dengan user_id yang valid
                'pembeli' => 'Ale',
                'penjualan_kode' => 'PJL004',
                'penjualan_tanggal' => now()->addMinutes(45)
            ],
            [
                'user_id' => 2, // Ganti dengan user_id yang valid
                'pembeli' => 'Oka',
                'penjualan_kode' => 'PJL005',
                'penjualan_tanggal' => now()->addHour()
            ],
            [
                'user_id' => 3, // Ganti dengan user_id yang valid
                'pembeli' => 'Putri',
                'penjualan_kode' => 'PJL006',
                'penjualan_tanggal' => now()->addHour()->addMinutes(15)
            ],
            [
                'user_id' => 1, // Ganti dengan user_id yang valid
                'pembeli' => 'Reyna',
                'penjualan_kode' => 'PJL007',
                'penjualan_tanggal' => now()->addHour()->addMinutes(50)
            ],
            [
                'user_id' => 2, // Ganti dengan user_id yang valid
                'pembeli' => 'Hani',
                'penjualan_kode' => 'PJL008',
                'penjualan_tanggal' => now()->addHour()->addMinutes(25)
            ],
            [
                'user_id' => 3, // Ganti dengan user_id yang valid
                'pembeli' => 'Rio',
                'penjualan_kode' => 'PJL009',
                'penjualan_tanggal' => now()->addHours(3)
            ],
            [
                'user_id' => 1, // Ganti dengan user_id yang valid
                'pembeli' => 'Dinda',
                'penjualan_kode' => 'PJL010',
                'penjualan_tanggal' => now()->addHours(1)->addMinutes(15)
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}

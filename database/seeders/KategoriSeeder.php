<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
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
                'kategori_id' => 1,
                'kategori_kode' => 'MB',
                'kategori_nama' => 'Mobil'
            ],
            [
                'kategori_id' => 2,
                'kategori_kode' => 'BJ',
                'kategori_nama' => 'Baju'
            ],
            [
                'kategori_id' => 3,
                'kategori_kode' => 'CLN',
                'kategori_nama' => 'Celana'
            ],
            [
                'kategori_id' => 4,
                'kategori_kode' => 'MR',
                'kategori_nama' => 'Motor'
            ],
            [
                'kategori_id' => 5,
                'kategori_kode' => 'OR',
                'kategori_nama' => 'Olahraga'
            ],
        ];
        DB::table('m_kategori')->insert($data);
    }
}

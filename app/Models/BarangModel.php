<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Tymon\JWTAuth\Contracts\JWTSubject;

    
    class BarangModel extends Model
    {
        use HasFactory;
    
        protected $table = 'm_barang';
        protected $primaryKey = 'barang_id';
        protected $fillable = [
            'barang_id',
            'nama_barang',
            'barang_kode',
            'kategori_id',
            'harga_beli',
            'harga_jual',
            'image' // tambahan
        ];
    
        public function kategori():BelongsTo
        {
            return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
        }

        // Tugas
        protected function image(): Attribute
        {
            return Attribute::make(
                get: fn ($image) => $image ? url('/storage/barang/' . $image) : null
            );
        }
    }
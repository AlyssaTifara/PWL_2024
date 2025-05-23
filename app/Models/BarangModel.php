<?php

namespace App\Models;

use App\Models\SupplierModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
    
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
        ];
    
        public function kategori():BelongsTo
        {
            return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');}
    }
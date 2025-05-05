<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierModel extends Model
{
    protected $table = 'm_supplier';

    protected $fillable = ['supplier_kode', 'supplier_nama', 'supplier_alamat'];

   protected $guarded = []; // Tidak ada kolom yang dilindungi

    // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'supplier_id';

    use HasFactory;
}
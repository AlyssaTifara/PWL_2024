<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\UserModel;

class LevelModel extends Model
{
    protected $table = 'm_level';
    protected $fillable = ['level_kode', 'level_nama'];

    protected $guarded = []; // Tidak ada kolom yang dilindungi

    // Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'level_id';
    
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
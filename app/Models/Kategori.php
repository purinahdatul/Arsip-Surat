<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama_kategori',
        'keterangan',
    ];

    // ... (relasi surats() yang mungkin sudah ada)
    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}
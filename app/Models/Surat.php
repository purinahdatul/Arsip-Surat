<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // <-- 1. TAMBAHKAN BARIS INI

class Surat extends Model
{
    use HasFactory, SoftDeletes; // <-- 2. TAMBAHKAN SoftDeletes DI SINI

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nomor_surat',
        'kategori_id',
        'judul',
        'file_path',
    ];

    /**
     * Mendefinisikan relasi ke model Kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
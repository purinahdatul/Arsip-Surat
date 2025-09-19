<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuratController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PageController;

// Halaman utama akan langsung diarahkan ke daftar surat
Route::get('/', [SuratController::class, 'index'])->name('surat.index');

// Resource route untuk semua fungsi CRUD surat dan kategori
Route::resource('surat', SuratController::class);
Route::resource('kategori', KategoriController::class);

// Route khusus untuk mengunduh file
Route::get('surat/{surat}/unduh', [SuratController::class, 'unduh'])->name('surat.unduh');

// Route untuk halaman About
Route::get('/about', [PageController::class, 'about'])->name('about');
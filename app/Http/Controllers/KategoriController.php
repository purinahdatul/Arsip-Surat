<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // ... (method index, create, store, edit, update biarkan saja) ...

    public function index(Request $request)
    {
        $query = Kategori::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('nama_kategori', 'like', '%' . $request->search . '%');
        }
        $kategoris = $query->paginate(10);
        return view('kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('kategori.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);
        Kategori::create($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(Kategori $kategori)
    {
        return view('kategori.form', compact('kategori'));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'required|string',
        ]);
        $kategori->update($request->all());
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui.');
    }
    
    /**
     * Menghapus data kategori dari database.
     */
    public function destroy(Kategori $kategori)
    {
        // Pengecekan sekarang mencakup data yang sudah di soft-delete
        if ($kategori->surats()->withTrashed()->count() > 0) {
            // Jika masih digunakan, proses hapus dihentikan dan pesan error dikirim.
            return back()->with('error', 'Kategori tidak dapat dihapus karena riwayatnya masih digunakan oleh arsip surat.');
        }

        // Jika tidak digunakan, kategori akan dihapus.
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
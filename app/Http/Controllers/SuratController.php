<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Surat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SuratController extends Controller
{
    /**
     * Menampilkan daftar semua arsip surat dengan fitur pencarian.
     */
    public function index(Request $request)
    {
        $query = Surat::with('kategori');

        if ($request->has('search') && $request->search != '') {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $surats = $query->latest()->paginate(10);

        return view('surat.index', compact('surats'));
    }

    /**
     * Menampilkan form untuk membuat arsip surat baru.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('surat.create', compact('kategoris'));
    }

    /**
     * Menyimpan arsip surat baru ke dalam database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'file_surat'  => 'required|mimes:pdf|max:2048', // max 2MB
        ]);

        // Upload file
        $file = $request->file('file_surat');
        $filePath = $file->store('surat_files', 'public');

        Surat::create([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'file_path'   => $filePath,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Menampilkan detail satu arsip surat.
     */
    public function show(Surat $surat)
    {
        return view('surat.show', compact('surat'));
    }

    /**
     * Menampilkan form untuk mengedit arsip surat.
     */
    public function edit(Surat $surat)
    {
        $kategoris = Kategori::all();
        return view('surat.edit', compact('surat', 'kategoris'));
    }

    /**
     * Memperbarui data arsip surat di database.
     */
    public function update(Request $request, Surat $surat)
    {
        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'kategori_id' => 'required|exists:kategoris,id',
            'judul'       => 'required|string|max:255',
            'file_surat'  => 'nullable|mimes:pdf|max:2048', // File boleh tidak diisi jika tidak ingin diganti
        ]);

        $filePath = $surat->file_path;

        // Cek jika ada file baru yang diupload
        if ($request->hasFile('file_surat')) {
            // Hapus file lama
            if (Storage::disk('public')->exists($surat->file_path)) {
                Storage::disk('public')->delete($surat->file_path);
            }

            // Upload file baru
            $file = $request->file('file_surat');
            $filePath = $file->store('surat_files', 'public');
        }

        $surat->update([
            'nomor_surat' => $request->nomor_surat,
            'kategori_id' => $request->kategori_id,
            'judul'       => $request->judul,
            'file_path'   => $filePath,
        ]);

        return redirect()->route('surat.index')->with('success', 'Data berhasil diperbarui!');
    }

    /**
     * Menghapus arsip surat dari database dan storage.
     */
    public function destroy(Surat $surat)
    {
        // Hapus file PDF dari storage
        if (Storage::disk('public')->exists($surat->file_path)) {
            Storage::disk('public')->delete($surat->file_path);
        }

        // Hapus data dari database
        $surat->delete();

        return redirect()->route('surat.index')->with('success', 'Arsip surat berhasil dihapus!');
    }

    /**
     * Mengunduh file PDF yang terkait dengan arsip surat.
     */
    public function unduh(Surat $surat)
    {
        // Path absolut ke file di storage
        $pathToFile = storage_path('app/public/' . $surat->file_path);

        if (!file_exists($pathToFile)) {
            return redirect()->route('surat.index')->with('error', 'File tidak ditemukan.');
        }

        return response()->download($pathToFile);
    }
}
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="breadcrumb-container">
        <a href="{{ route('surat.index') }}">Arsip Surat</a> > <a href="{{ route('surat.show', $surat->id) }}">Lihat</a> > Edit
    </div>

    <h2>Edit Arsip Surat</h2>
    <p class="text-muted">Edit arsip surat. Jika sudah selesai, jangan lupa menekan tombol "Simpan".</p>
    <hr>

    <form action="{{ route('surat.update', $surat->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') <div class="form-group">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" value="{{ $surat->nomor_surat }}" required>
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="custom-select" id="kategori_id" name="kategori_id" required>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}" {{ $surat->kategori_id == $kategori->id ? 'selected' : '' }}>
                        {{ $kategori->nama_kategori }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" value="{{ $surat->judul }}" required>
        </div>
        <div class="form-group">
            <label for="file_surat">Ganti File Surat (PDF)</label>
            <p class="mt-2">
                <a href="{{ asset('storage/' . $surat->file_path) }}" target="_blank">Lihat file saat ini</a>
            </p>
            <input type="file" class="form-control-file" id="file_surat" name="file_surat" accept=".pdf">
            <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti file.</small>
        </div>
        
        <div class="mt-4">
            <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-secondary"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
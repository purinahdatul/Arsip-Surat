@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="breadcrumb-container">
        <a href="{{ route('surat.index') }}">Arsip Surat</a> > Unggah
    </div>

    <h2>Unggah Arsip Surat</h2>
    <p class="text-muted">Unggah surat yang telah terbit pada form ini untuk diarsipkan.</p>

    <hr>

    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nomor_surat">Nomor Surat</label>
            <input type="text" class="form-control" id="nomor_surat" name="nomor_surat" required>
        </div>
        <div class="form-group">
            <label for="kategori_id">Kategori</label>
            <select class="custom-select" id="kategori_id" name="kategori_id" required>
                <option selected disabled>Pilih Kategori...</option>
                @foreach ($kategoris as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="judul">Judul</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="file_surat">File Surat (PDF)</label>
            <input type="file" class="form-control-file" id="file_surat" name="file_surat" required accept=".pdf">
        </div>

        <div class="mt-4">
            <a href="{{ route('surat.index') }}" class="btn btn-secondary"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
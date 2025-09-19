@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="breadcrumb-container">
        <a href="{{ route('kategori.index') }}">Kategori Surat</a> > {{ isset($kategori) ? 'Edit' : 'Tambah' }}
    </div>

    <h2>{{ isset($kategori) ? 'Edit' : 'Tambah' }} Kategori Surat</h2>
    <p class="text-muted">Tambahkan atau edit data kategori. Jika sudah selesai, klik tombol "Simpan".</p>

    <hr>

    <form action="{{ isset($kategori) ? route('kategori.update', $kategori->id) : route('kategori.store') }}" method="POST">
        @csrf
        @if(isset($kategori))
            @method('PUT')
        @endif

        <div class="form-group row">
            <label class="col-sm-3 col-form-label">ID (Auto Increment)</label>
            <div class="col-sm-9">
                <input type="text" readonly class="form-control-plaintext" value="{{ $kategori->id ?? 'Otomatis' }}">
            </div>
        </div>
        <div class="form-group">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ old('nama_kategori', $kategori->nama_kategori ?? '') }}" required>
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea class="form-control" id="keterangan" name="keterangan" rows="4" required>{{ old('keterangan', $kategori->keterangan ?? '') }}</textarea>
        </div>

        <div class="mt-4">
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary"><< Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
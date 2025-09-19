@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="breadcrumb-container">
        <a href="{{ route('surat.index') }}">Arsip Surat</a> > Lihat
    </div>

    <h2>Lihat Arsip Surat</h2>
    <hr>

    {{-- Menggunakan list-group untuk tampilan detail yang lebih rapi --}}
    <ul class="list-group list-group-flush mb-4">
        <li class="list-group-item">
            <strong>Nomor:</strong> {{ $surat->nomor_surat }}
        </li>
        <li class="list-group-item">
            <strong>Kategori:</strong> {{ $surat->kategori->nama_kategori }}
        </li>
        <li class="list-group-item">
            <strong>Judul:</strong> {{ $surat->judul }}
        </li>
        <li class="list-group-item">
            <strong>Waktu Unggah:</strong> {{ $surat->created_at->format('d F Y H:i:s') }}
        </li>
    </ul>

    <iframe src="{{ asset('storage/' . $surat->file_path) }}" style="width: 100%; height: 500px; border: 1px solid #dee2e6; border-radius: 5px;"></iframe>

    <div class="mt-4 d-flex">
        <a href="{{ route('surat.index') }}" class="btn btn-secondary mr-2"><< Kembali</a>
        <a href="{{ route('surat.unduh', $surat->id) }}" class="btn btn-warning mr-2">
            <i class="fas fa-download"></i> Unduh
        </a>
        <a href="{{ route('surat.edit', $surat->id) }}" class="btn btn-primary">
            <i class="fas fa-edit"></i> Edit/Ganti File
        </a>
    </div>
</div>
@endsection
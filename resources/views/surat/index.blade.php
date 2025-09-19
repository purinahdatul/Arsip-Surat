@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Arsip Surat</h2>
        <a href="{{ route('surat.create') }}" class="btn btn-primary">Arsipkan Surat..</a>
    </div>

    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>
    Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>

    <form action="{{ route('surat.index') }}" method="GET" class="mb-3">
        <div class="search-container">
            <i class="fas fa-search search-icon"></i>
            <input class="form-control" type="search" placeholder="Cari surat..." name="search" value="{{ request('search') }}">
        </div>
    </form>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Nomor Surat</th>
                <th>Kategori</th>
                <th>Judul</th>
                <th>Waktu Pengarsipan</th>
                <th style="width: 25%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($surats as $surat)
            <tr>
                <td>{{ $surat->nomor_surat }}</td>
                <td>{{ $surat->kategori->nama_kategori }}</td>
                <td>{{ $surat->judul }}</td>
                <td>{{ $surat->created_at->format('d M Y H:i:s') }}</td>
                <td>
                    <a href="{{ route('surat.show', $surat->id) }}" class="btn btn-info btn-sm mr-1">
                        <i class="fas fa-eye"></i> Lihat
                    </a>
                    <a href="{{ route('surat.unduh', $surat->id) }}" class="btn btn-warning btn-sm mr-1">
                        <i class="fas fa-download"></i> Unduh
                    </a>
                    <form action="{{ route('surat.destroy', $surat->id) }}" method="POST" class="d-inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">
                            <i class="fas fa-trash"></i> Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Tidak ada data surat yang ditemukan.</td>
            </tr>
            @endforelse </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $surats->links() }}
    </div>
</div>
@endsection
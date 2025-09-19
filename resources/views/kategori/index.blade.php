@extends('layouts.app')

@section('content')
<div class="content-wrapper">

    <!-- ====================================================== -->
    <!-- BLOK KODE UNTUK MENAMPILKAN PESAN NOTIFIKASI DITAMBAHKAN DI SINI -->
    <!-- ====================================================== -->
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <!-- ====================================================== -->
    <!-- AKHIR BLOK KODE TAMBAHAN -->
    <!-- ====================================================== -->

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Kategori Surat</h2>
        <a href="{{ route('kategori.create') }}" class="btn btn-success">[+] Tambah Kategori Baru</a>
    </div>
    <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.</p>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th style="width: 15%;">ID Kategori</th>
                <th>Nama Kategori</th>
                <th>Keterangan</th>
                <th style="width: 20%;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($kategoris as $kategori)
            <tr>
                <td>{{ $kategori->id }}</td>
                <td>{{ $kategori->nama_kategori }}</td>
                <td>{{ $kategori->keterangan }}</td>
                <td>
                    <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-primary btn-sm mr-1">
                        <i class="fas fa-edit"></i> Edit
                    </a>

                    <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" class="d-inline delete-form">
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
                <td colspan="4" class="text-center">Tidak ada data kategori.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection

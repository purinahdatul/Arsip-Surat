@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <h2 class="mb-4">About</h2>

    {{-- Layout dua kolom menggunakan Bootstrap Grid --}}
    <div class="row align-items-center">

        <div class="col-md-4 text-center">
            @if (file_exists(public_path('images/foto_anda.jpg')))
                <img src="{{ asset('images/foto_anda.jpg') }}" alt="Foto Profil" class="profile-img-rect">
            @else
                <div class="profile-icon-rect">
                    <i class="fas fa-user"></i>
                </div>
            @endif
        </div>

        <div class="col-md-8">
            <h4 class="profile-text-header">Aplikasi ini dibuat oleh:</h4>
            <table class="table table-borderless profile-text-table">
                <tbody>
                    <tr>
                        <td style="width: 20%;"><strong>Nama</strong></td>
                        <td style="width: 5%;">:</td>
                        <td>Puri Nahdatul</td>
                    </tr>
                    <tr>
                        <td><strong>Prodi</strong></td>
                        <td>:</td>
                        <td>D3-Manajemen Informatika PSDKU Kediri</td>
                    </tr>
                    <tr>
                        <td><strong>NIM</strong></td>
                        <td>:</td>
                        <td>2331730110</td>
                    </tr>
                    <tr>
                        <td><strong>Tanggal</strong></td>
                        <td>:</td>
                        <td>17 September 2025</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
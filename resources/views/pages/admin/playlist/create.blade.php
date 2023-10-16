@extends('layout.simple')
@section('title', 'Tambah Playlist')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    @include('include.navbar.navadmin')
    <form action="{{ route('admin.playlist.store') }}" method="POST" class="row justify-content-center music" enctype='multipart/form-data'>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Nama Playlist</label>
            <input type="text" class="form-control" id="title" placeholder="Tambahkan Playlist Music" name="title">
            @error('title')
            <small role="alert">Pastikan Nama Playlist Telah Dimasukkan</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="thumbnail">Gambar Music</label>
            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            @error('thumbnail')
            <small role="alert">Pastikan File Berformat Gambar (.jpg/.svg/.png/dsb)</small>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </form>
</main>
@endsection


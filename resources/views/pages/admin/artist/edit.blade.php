@extends('layout.simple')
@section('title', 'Edit Penyanyi')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    @include('include.navbar.navadmin')
    <form action="{{ route('admin.artist.update',$artist->slug) }}" method="POST" class="row justify-content-center music" enctype='multipart/form-data'>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Nama Penyanyi / Band</label>
            <input type="text" class="form-control" id="title" placeholder="Tambahkan Penyanyi / Band" name="title" value="{{ $artist->name }}">
            @error('title')
            <small role="alert">Pastikan Nama Penyanyi / Band Telah Dimasukkan</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label w-100" for="thumbnail">Gambar Music</label>
            <img src="{{ $artist->thumbnail }}" alt="{{ $artist->title }}" class="img-thumbnail w-15">
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

@extends('layout.app')
@section('title', 'Tambah Genre')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <form action="{{ route('admin.genre.store') }}" method="POST" class="row justify-content-center music" enctype='multipart/form-data'>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Nama Genre</label>
            <input type="text" class="form-control" id="title" placeholder="Tambahkan Genre Music" name="title">
            @error('title')
            <small role="alert">Pastikan Nama Genre Telah Dimasukkan</small>
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


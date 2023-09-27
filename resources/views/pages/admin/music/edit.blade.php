@extends('layout.app')
@section('title', 'Edit Lagu')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    <form action="{{ route('admin.music.update',$music->slug) }}" method="POST" class="row justify-content-center music" enctype='multipart/form-data'>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Music</label>
            <input type="text" class="form-control" id="title" placeholder="Masukkan Judul Music" name="title" value="{{ $music->title }}">
            @error('title')
            <small role="alert">Pastikan Judul Music Telah Dimasukkan</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="source" class="form-label">Source Music</label>
            <textarea type="text" class="form-control" id="source" placeholder="Masukkan Source Video Music" name="source" rows="3">{{ $music->source_music  }}</textarea>
            @error('source')
            <small role="alert">Pastikan Sumber Music Telah Dimasukkan</small>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label w-100" for="thumbnail">Gambar Music</label>
            @if($music->thumbnail)
            <img src="{{ $music->thumbnail }}" alt="{{ $music->title }}" class="img-thumbnail w-25">
            @endif
            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            @error('thumbnail')
            <small role="alert">Pastikan File Berformat Gambar (.jpg/.svg/.png/dsb)</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="genre" class="form-label">Genre Music</label>
            <select class="form-select" id="genre" name="genre">
                <option selected disabled>Pilih Genre Music</option>
                @foreach ($genres as $genre)
                <option value="{{ $genre->id }}" @selected($genre->id == $music->genre->id)>{{ $genre->name }}</option>
                @endforeach
            </select>
            @error('genre')
            <small role="alert">Pastikan Genre Music Telah Dipilih</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="artist" class="form-label">Penyanyi</label>
            <select class="form-select" id="artist" name="artist">
                <option selected disabled>Masukkan Nama Penyanyi / Band</option>
                @foreach ($artists as $artist)
                <option value="{{ $artist->id }}" @selected($artist->id == $music->artist->id)>{{ $artist->name }}</option>
                @endforeach
            </select>
            @error('artist')
            <small role="alert">Pastikan Artist Music Telah Dipilih</small>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </form>
</main>
@endsection


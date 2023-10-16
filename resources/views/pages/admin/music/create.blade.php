@extends('layout.simple')
@section('title', 'Tambah Music')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    @include('include.navbar.navadmin')
    <form action="{{ route('admin.music.store') }}" method="POST" class="row justify-content-center music" enctype='multipart/form-data'>
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Judul Music</label>
            <input type="text" class="form-control" id="title" placeholder="Masukkan Judul Music" name="title">
            @error('title')
            <small role="alert">Pastikan Judul Music Telah Dimasukkan</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="source" class="form-label">Source Music</label>
            <textarea type="text" class="form-control" id="source" placeholder="Masukkan Source Video Music" name="source" rows="3"></textarea>
            @error('source')
            <small role="alert">Pastikan Sumber Music Telah Dimasukkan</small>
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
            <label for="genre" class="form-label">Genre Music</label>
            <div class="row justify-content-start">
                @foreach ($genres as $genre)
                <div class="col-6 col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="genre" id="{{ $genre->id }}" value="{{ $genre->id }}">
                        <label class="form-check-label" for="{{ $genre->id }}">{{ $genre->name }}</label>
                    </div>
                </div>
                @endforeach
                
				<div class="col-6 col-md-3">
					<div class="form-check">
						<input class="form-check-input" type="radio" name="genre" id="new-genre-radio" value="" aria-label="Radio button for following text input">
						<input type="text" class="form-control form-check-label" aria-label="Text input with radio button" id="new-genre-input" placeholder="Tambahkan Genre Baru">
					</div>
				</div>
			</div>

            @error('genre')
            <small role="alert">Pastikan Genre Music Telah Dipilih</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="artist" class="form-label">Penyanyi</label>
            <div class="row justify-content-start">
                @foreach ($artists as $artist)
                <div class="col-6 col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="artist" id="{{ $artist->id }}" value="{{ $artist->id }}">
                        <label class="form-check-label" for="{{ $artist->id }}">{{ $artist->name }}</label>
                    </div>
                </div>
                @endforeach
                
                <div class="col-6 col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="artist" id="new-artist-radio" value="" aria-label="Radio button for following text input">
                        <input type="text" class="form-control form-check-label" aria-label="Text input with radio button" id="new-artist-input" placeholder="Tambahkan Penyanyi Baru">
                    </div>
                </div>
            </div>

            @error('artist')
            <small role="alert">Pastikan Artist Music Telah Dipilih</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="artist" class="form-label">Playlist</label>
            <div class="row justify-content-start">
                @foreach ($playlists as $playlist)
                @php
                $check = false;
                foreach ($music->playlists as $pk) {
				    if ($playlist->id == $pk->id) {
						$check = true;
						break;
				    }
                }
                @endphp
                <div class="col-6 col-md-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="playlists[]" id="{{ $playlist->id }}" value="{{ $playlist->id }}" @checked($check)>
                        <label class="form-check-label" for="{{ $playlist->id }}">{{ $playlist->name }}</label>
                    </div>
                </div>
                @endforeach
            </div>

            @error('playlists')
            <small role="alert">Pastikan Playlist Lagu Telah Dipilih</small>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">SIMPAN</button>
        </div>
    </form>
</main>
@endsection

@push('add-script')
<script src="{{ url('/user/script/new-input-check.js') }}"></script>
@endpush

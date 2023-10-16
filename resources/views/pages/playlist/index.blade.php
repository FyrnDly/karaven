@extends('layout.app')

{{-- title --}}
@section('title','Playlist')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<main class="container">
    <!-- content card music -->
    @include('include.navbar.navside')
    @if (count($playlists)!=0 or count($playlists)!=null)
    <div class="row justify-content-center align-items-start">
        @foreach ($playlists as $playlist)
        <div class="col-lg-3 col-md-4 p-4">
            <a href="{{ route('playlist.detail',$playlist->slug) }}" class="card card-genre" style="background-image: url({{ $playlist->thumbnail != null ? $playlist->thumbnail : url('user/assets/image/genre.jpg') }});">
                <div class="bg-darken">
                    <h4>{{ $playlist->name }}</h4>
                </div>
            </a>
        </div>
	    @endforeach
    </div>
    @else
    <div class="d-flex flex-column justify-content-center gap-2 my-4 mx-2">
        <img src="{{ url('user/assets/icon/error.svg') }}" alt="Error" class="w-50 mx-auto">
        <span class="text-center">
            <h2><b>Genre Belum Ditambahkan</b> oleh Admin</h2>
            <b>Silahkan Hubungi Admin</b>
        </span>
    </div>
    @endif
</main>
@endsection

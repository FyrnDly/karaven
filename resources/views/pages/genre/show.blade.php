@extends('layout.simple')

{{-- title --}}
@section('title','Daftar Lagu '.$genre->name)

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<header class="d-flex align-items-start detail genre" style="background-image: url({{ $genre->thumbnail != null ? $genre->thumbnail : url('user/assets/image/genre.jpg') }});">
    <div class="bg-darken">
        <div class="container">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('genre.index') }}">Genre</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $genre->name }}</li>
                </ol>
            </div>
            <h2>Daftar Lagu Genre <b>{{ $genre->name }}</b></h2>
        </div>
    </div>
</header>

<main class="container">
    <!-- content card music -->
    <div class="row justify-content-center text-wrap"> @if (count($musics)!=0 or count($musics)!=null)
        @foreach ($musics as $music)
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="{{ route('music',$music->slug) }}">
                    <img src="{{ $music->thumbnail!=null ? $music->thumbnail : url('user/assets/image/music.jpg') }}" alt="{{ $music->title }}">
                </a>
                <div class="text w-100">
                    <a href="{{ route('music',$music->slug) }}" class="w-100">
                        <h4>{{ $music->title }}</h4>
                    </a>
                    <p>
                        <a href="{{ route('artist.detail', $music->artist->slug) }}"><b>{{ $music->artist->name}}</b></a> |
                        <a href="{{ route('genre.detail', $music->genre->slug) }}">{{ $music->genre->name}}</a>
                </div>
            </div>
        </div>
        @endforeach
        @else
        <div class="d-flex flex-column justify-content-center gap-2 my-4 mx-2">
            <img src="{{ url('user/assets/icon/error.svg') }}" alt="Error" class="w-50 mx-auto">
            <span class="text-center">
                <h2><b>Lagu Belum Ditambahkan</b> oleh Admin</h2>
                <b>Silahkan Hubungi Admin</b>
            </span>
        </div>
        @endif
    </div>
</main>
@endsection


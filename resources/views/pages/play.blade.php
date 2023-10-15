@extends('layout.simple')

{{-- title --}}
@section('title','Memutar '.$music->title.'-'.$music->artist->name)

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/play/style.css') }}">
@endpush
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<main class="container-fluid">
    <div class="row justify-content-center align-items-start">
        <div class="col-lg-9 px-2 my-5">
            <div class="play-music">
                {!! $music->source_music !!}
                <div class="d-flex justify-content-start align-items-center w-100 ">
                    <div class="label-music">
                        <h4>{{ $music->title }}</h4>
                        <a href="{{ route('artist.detail',$music->artist->slug) }}">{{ $music->artist->name }}</a> |
                        <a href="{{ route('genre.detail',$music->genre->slug) }}">{{ $music->genre->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@if(count($mr1)!=0 or count($mr2)!=0)
<main class="container">
    <h2><b>Rekomendasi Lagu</b> Untuk Anda</h2>
    <div class="row justify-content-start text-wrap">
        @foreach ($mr1 as $music)
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

        @foreach ($mr2 as $music)
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
    </div>
</main>
@endif


@endsection

@push('add-script')
<script src="{{ url('user/script/play.js') }}"></script>
@endpush

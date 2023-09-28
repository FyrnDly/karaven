@extends('layout.app')

{{-- title --}}
@section('title','Lagu {{ $artist->name }}')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush
{{-- Content --}}
@section('content')
<main class="container">
    <!-- content card music -->
    <h2>Daftar Lagu <b>{{ $artist->name }}</b></h2>
    <div class="row justify-content-center">
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
                        <a href="#"><b>{{ $music->artist->name}}</b></a> |
                        <a href="#">{{ $music->genre->name}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection

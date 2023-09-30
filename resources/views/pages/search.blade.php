@extends('layout.app')

{{-- title --}}
@section('title','Hasil Pencarian "'.$key.'"')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush
@push('add-style')
<style>
    header {
        height: 25vh;
    }
    @media screen and (max-width: 480px) {
        header {
            height: 65vh;
        }
    }
</style>
@endpush

{{-- Content --}}
@section('content')
<main class="container">
    @if (count($musics)!=0 or count($musics)!=null)
    <h2>Hasil Pencarian Untuk <b>"{{ $key }}"</b></h2>
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
                        <a href="{{ route('artist.detail', $music->artist->slug) }}"><b>{{ $music->artist->name}}</b></a> |
                        <a href="{{ route('genre.detail', $music->genre->slug) }}">{{ $music->genre->name}}</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <div class="d-flex flex-column justify-content-center gap-2 my-4 mx-2">
        <span class="text-center">
            <h2>Hasil Pencarian <b>"{{ $key }}"</b> Tidak Ditemukan</h2>
            <b>Silahkan Hubungi Admin Untuk Menambahkan "{{ $key }}"</b>
        </span>
        <img src="{{ url('user/assets/icon/error.svg') }}" alt="Error" class="w-50 w-md-10 mx-auto">
    </div>
    @endif
</main>
@endsection


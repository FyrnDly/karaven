@extends('layout.app')

{{-- title --}}
@section('title','Beranda')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<main class="container">
    <!-- content card music -->
    @include('include.navbar.navside')
    @if (count($musics)!=0 or count($musics)!=null)
    <h2>Lagu Paling <b>Sering Diputar</b></h2>
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
    @else
    <div class="d-flex flex-column justify-content-center gap-2 my-4 mx-2">
        <img src="{{ url('user/assets/icon/error.svg') }}" alt="Error" class="w-50 mx-auto">
        <span class="text-center">
            <h2><b>Lagu Belum Ditambahkan</b> oleh Admin</h2>
            <b>Silahkan Hubungi Admin</b>
        </span>
    </div>
    @endif
    {{-- <h2>Lagu Baru <b>Ditambahkan</b></h2>
    <div class="d-flex">
        <a href="#" class="mx-auto btn btn-white">Tampilkan Lagu Lainnya</a>
    </div> --}}
</main>
@endsection

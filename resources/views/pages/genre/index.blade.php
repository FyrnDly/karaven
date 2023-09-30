@extends('layout.app')

{{-- title --}}
@section('title','Genre')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<main class="container">
    <!-- content card music -->
    @include('include.navbar.navside')
    @if (count($genres)!=0 or count($genres)!=null)
    <div class="row justify-content-center align-items-start">
        @foreach ($genres as $genre)
        <div class="col-lg-3 col-md-4 p-4">
            <a href="{{ route('genre.detail',$genre->slug) }}" class="card card-genre" style="background-image: url({{ $genre->thumbnail != null ? $genre->thumbnail : url('user/assets/image/genre.jpg') }});">
                <h4>{{ $genre->name }}</h4>
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

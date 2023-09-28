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
    <div class="row justify-content-center align-items-start">
        @foreach ($genres as $genre)
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url({{ $genre->thumbnail != null ? $genre->thumbnail : url('user/assets/image/genre.jpg') }});">
                <h4>{{ $genre->name }}</h4>
            </a>
        </div>
        @endforeach
    </div>
</main>
@endsection

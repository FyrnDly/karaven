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

    <div class="row justify-content-center align-items-start">
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/indonesia2000.jpg);">
                <h4>Indonesia 2000an</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/koplo.jpg);">
                <h4>Koplo</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/religi.jpg);">
                <h4>Religi</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/wibu.jpg);">
                <h4>Wibu</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/senja.jpg);">
                <h4>Anak Senja</h4>
            </a>
        </div>
    </div>
</main>
@endsection


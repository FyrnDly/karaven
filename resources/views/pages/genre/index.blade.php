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
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/jpop.jpg);">
                <h4>JPOP</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/kpop.jpg);">
                <h4>KPOP</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/dangdut.jpg);">
                <h4>Dangdut</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/pop-indonesia.jpg);">
                <h4>POP Indonesia</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/galau.jpg);">
                <h4>Galau</h4>
            </a>
        </div>
        <div class="col-lg-3 col-md-4 p-4">
            <a href="#" class="card card-genre" style="background-image: url(assets/image/2000s.jpg);">
                <h4>2000s</h4>
            </a>
        </div>
    </div>
</main>
@endsection


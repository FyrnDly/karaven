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

    <div class="row justify-content-center mt-4">
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="assets/image/takane-no-nadeshiko.jpg" alt="Gambar Takane no Nadeshiko">
                <h4>Takane no Nadeshiko</h4>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="assets/image/harutya.jpg" alt="Gambar Harutya">
                <h4>Harutya</h4>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="assets/image/fifty-fifty.jpg" alt="Gambar Fifty Fifty">
                <h4>Fifty Fifty</h4>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="assets/image/blackpink.jpg" alt="Gambar Black Pink">
                <h4>Black Pink</h4>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="assets/image/kobasolo.jpg" alt="Gambar Kobasolo">
                <h4>Kobasolo</h4>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="assets/image/ujita-mai.jpg" alt="Gambar Mai Ujita">
                <h4>Mai Ujita</h4>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="assets/image/new-jeans.jpg" alt="Gambar New Jeans">
                <h4>New Jeans</h4>
            </a>
        </div>
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="assets/image/honey-works.jpg" alt="Gambar Honey Works">
                <h4>Honey Works</h4>
            </a>
        </div>

    </div>
    <div class="d-flex">
        <a href="#" class="mx-auto btn btn-white">Tampilkan Lagu Lainnya</a>
    </div>
</main>
@endsection


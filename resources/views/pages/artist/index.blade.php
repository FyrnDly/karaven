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
        @foreach ($artists as $artist)

        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="#" class="card card-artist">
                <img src="{{ $artist->thumbnail!=null ? $artist->thumbnail : url('user/assets/icon/artist.svg')}}" alt="{{ $artist->name }}">

                <h4>{{ $artist->name }}</h4>

            </a>
        </div>
        @endforeach

    </div>
    <div class="d-flex">
        <a href="#" class="mx-auto btn btn-white">Tampilkan Lagu Lainnya</a>
    </div>
</main>
@endsection


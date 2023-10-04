@extends('layout.simple')

{{-- title --}}
@section('title','Error 403')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<main class="container">
    <div class="d-flex flex-column justify-content-center gap-2 align-items-center pt-4">
        <img src="{{ url('user/assets/icon/error.svg') }}" alt="Error" width="35%">
        <span class="text-center">
            <h2>Error 429<b>Server Sedang Sibuk</b></h2>
            <p>Maaf atas ketidaknyamanan anda, silahkan tunggu beberapa saat dan muat ulang halaman website</p>
            <br>
            <a href="{{ route('home') }}" class="btn btn-primary mt-4">Halaman Awal</a>
        </span>
    </div>
</main>
@endsection


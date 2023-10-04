@extends('layout.simple')

{{-- title --}}
@section('title','Error 404')

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
            <h2>Error 404 <b>Halaman Tidak Ditemukan</b></h2>
            <p>Periksa kembali url atau tautan yang kamu masukkan, pastikan tidak ada kesalahan pada tautan yang anda masukkan</p>
            <br>
            <a href="{{ route('home') }}" class="btn btn-primary mt-4">Halaman Awal</a>
        </span>
    </div>
</main>
@endsection


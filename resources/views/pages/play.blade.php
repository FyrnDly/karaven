@extends('layout.app')

{{-- title --}}
@section('title','Beranda')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/play/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<main class="container-fluid">
    <div class="row justify-content-center align-items-start">
        <div class="col-lg-9 px-2 my-5">
            <div class="play-music">
                {!! $music->source_music !!}
                {{-- <div class="d-flex justify-content-end align-items-center w-100">
                    <a href="#" class="btn btn-white"><i class="bi bi-arrow-bar-left"></i>
                        <p class="d-none d-md-inline-block">Lagu Sebelumnya</p>
                    </a>
                    <a href="#" class="btn btn-primary">
                        <p class="d-none d-md-inline-block">Lagu Berikutnya</p> <i class="bi bi-arrow-bar-right"></i>
                    </a>
                </div> --}}
            </div>
        </div>
    </div>
</main>
@endsection

@push('add-script')
<script src="{{ url('user/script/play.js') }}"></script>
@endpush


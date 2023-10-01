@extends('layout.app')

{{-- title --}}
@section('title','Memutar '.$music->title.'-'.$music->artist->name)

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
                <div class="d-flex justify-content-start align-items-center w-100 ">
                    <div class="label-music">
                        <h4>{{ $music->title }}</h4>
                        <a href="{{ route('artist.detail',$music->artist->slug) }}">{{ $music->artist->name }}</a> |
                        <a href="{{ route('genre.detail',$music->genre->slug) }}">{{ $music->genre->name }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@push('add-script')
<script src="{{ url('user/script/play.js') }}"></script>
@endpush

@extends('layout.app')

{{-- title --}}
@section('title','Penyanyi')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<main class="container">
    <!-- content card music -->
    @include('include.navbar.navside')
    @if (count($artists)!=0 or count($artists)!=null)
    <div class="row justify-content-center mt-4">
	@foreach ($artists as $artist)
        <div class="col-md-4 col-lg-3 px-2 py-3">
            <a href="{{ route('artist.detail',$artist->slug) }}" class="card card-artist">
                <img src="{{ $artist->thumbnail!=null ? $artist->thumbnail : url('user/assets/icon/artist.svg')}}" alt="{{ $artist->name }}">
                <h4>{{ $artist->name }}</h4>
            </a>
        </div>
	@endforeach
    </div>
    	@if($artists->count() < $artists->total())
        <div class="text-center mt-4">
            <button class="btn btn-white" onclick="window.location.href='{{ url('/artists?per_page='.($artists->count()+8).'&page='.$artists->currentPage()) }}'">Tampilkan lebih banyak</button>
        </div>
        @endif
    @else
    <div class="d-flex flex-column justify-content-center gap-2 my-4 mx-2">
        <img src="{{ url('user/assets/icon/error.svg') }}" alt="Error" class="w-50 mx-auto">
        <span class="text-center">
            <h2><b>Penyanyi Belum Ditambahkan</b> oleh Admin</h2>
            <b>Silahkan Hubungi Admin</b>
        </span>
    </div>
    @endif
</main>
@endsection

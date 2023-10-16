@extends('layout.simple')
@section('title', 'Daftar Playlist '.$playlist->name."-Admin")

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<header class="d-flex align-items-start detail genre" style="background-image: url({{ $playlist->thumbnail != null ? $playlist->thumbnail : url('user/assets/image/genre.jpg') }});">
    <div class="bg-darken">
        <div class="container">
            <div aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.playlist.show') }}">Playlist</a></li>
                    <li class="breadcrumb-item active" aria-current="page">{{ $playlist->name }}</li>
                </ol>
            </div>
        </div>
    </div>
</header>

<main class="container">
    @include('include.navbar.navadmin')
    @if (session('status') === 'add')
    <div class="success-feedback" role="alert">
        <p><b>{{ session('music')->title }}</b> berhasil ditambahkan pada daftar playlist lagu {{ $playlist->name }}</p>
    </div>
    @endif
    @if (session('status') === 'remove')
    <div class="invalid-feedback d-block" role="alert">
        <p><b>{{ session('music')->title }}</b> berhasil dihapus dari daftar playlist lagu {{ $playlist->name }}</p>
    </div>
    @endif

    <div class="row justify-content-between gap-2 mt-4">
        <div class="col">
            <input type="text" id="filterInput" placeholder="Cari cepat..." class="filter">
        </div>
        <div class="col text-md-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMusic">Tambahkan Lagu Baru</button>

            <!-- Modal -->
            <div class="modal fade" id="addMusic" tabindex="-1" aria-labelledby="addMusicLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="text-start modal-title fs-4" id="addMusicLabel">Tambahkan Lagu Kedalam <b class="fs-4">Playlist {{ $playlist->name }}</b></h2>
                            <button type="button" class="btn-close btn btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{ route('admin.playlist.music.add', $playlist->slug) }}" method="post" class="music">
                            @csrf
                            <div class="modal-body text-start">
                                <label for="music" class="form-label fs-5">Tambahkan Lagu</label>
                                <select class="form-select" id="music" name="music">
                                    <option selected disabled hidden>Pilih Lagu yang Ingin Ditambahkan</option>
                                    @foreach ($musics as $music)
                                    @php
                                    $check = true;
                                    foreach ($playlist->music as $mk) {
	                                    if ($music->id == $mk->id) {
				                            $check = false;
				                            break;
                                    	}
                                    }
                                    @endphp
                                    @if($check)<option value="{{ $music->id }}">{{ $music->title }}</option>@endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Tambahkan Lagu</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @error('music')
    <div class="invalid-feedback d-block" role="alert">
        <p>Pilih Lagu yang Ingin Ditambahkan Kedalam Playlist</p>
    </div>
    @enderror
    <div class="table-responsive">
        <table class="table table-striped table-dark table-hover table-borderless">
            <thead>
                <tr class="text-center">
                    <th scope="col">Judul Lagu</th>
                    <th scope="col">Penyanyi</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Diputar</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($playlist->music)!=0)
                @foreach ($playlist->music as $music)
                <tr>
                    <td>{{ $music->title }}</td>
                    <td class="text-center">{{ $music->artist->name }}</td>
                    <td class="text-center">{{ $music->genre->name }}</td>
                    <td class="text-center">{{ $music->log }}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-black outline" data-bs-toggle="modal" data-bs-target="#{{ $music->slug }}">
                            <i class="bi bi-trash2"></i>
                        </button>

                        <div class="modal fade" id="{{ $music->slug }}" tabindex="-1" aria-labelledby="{{ $music->slug }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="{{ $music->slug }}Label">Hapus Lagu {{ $music->title }}</h1>
                                        <button type="button" class="btn-close btn btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin <b>menghapus Lagu {{ $music->title }}</b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.playlist.music.remove',['slug'=>$playlist->slug, 'id'=>$music->id]) }}" method="post" class="d-inline-block m-2">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td colspan="5" class="text-center">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMusic">Tambahkan Lagu Baru</button>
                    </td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>

</main>
@endsection

@push('add-script')
@include('include.scriptfilter')
@endpush


@extends('layout.simple')
@section('title', 'Daftar Playlist-Admin')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    @include('include.navbar.navadmin')
    @if (session('status') === 'create')
    <div class="success-feedback" role="alert">
        <p>Playlist <b>{{ session('playlist')->name }}</b> berhasil ditambahkan</p>
    </div>
    @endif
    @if (session('status') === 'update')
    <div class="success-feedback" role="alert">
        <p>Playlist <b>{{ session('playlist')->name }}</b> berhasil diperbarui</p>
    </div>
    @endif
    @if (session('status') === 'destroy')
    <div class="invalid-feedback d-block" role="alert">
        <p>Playlist <b>{{ session('playlist')->name; }}</b> berhasil dihapus</p>
    </div>
    @endif

    <div class="row justify-content-between gap-2 mt-4">
        <div class="col">
            <input type="text" id="filterInput" placeholder="Cari cepat..." class="filter">
        </div>
        <div class="col text-md-end">
            <a href="{{ route('admin.playlist.create') }}" class="btn btn-primary">Tambah Playlist Baru</a>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped table-dark table-hover table-borderless ">
            <thead>
                <tr class="text-center">
                    <th scope="col">Playlist</th>
                    <th scope="col">Gambar</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($playlists)!=0)
                @foreach ($playlists as $playlist)
                <tr>
                    <td>{{ $playlist->name }}</td>
                    <td class="text-center">
                        @if($playlist->thumbnail)
                        <img src="{{ $playlist->thumbnail }}" alt="{{ $playlist->name }}" width="50px" height="40px">
                        @endif
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.playlist.edit',$playlist->slug) }}" class="btn btn-primary d-inline-block m-2">
                            <i class="bi bi-pencil"></i>
                        </a>
                        <a href="{{ route('admin.playlist.music',$playlist->slug) }}" class="btn btn-white d-inline-block m-2">
                            <i class="bi bi-eye"></i>
                        </a>
                        <button type="button" class="btn btn-black outline" data-bs-toggle="modal" data-bs-target="#{{ $playlist->slug }}">
                            <i class="bi bi-trash2"></i>
                        </button>

                        <div class="modal fade" id="{{ $playlist->slug }}" tabindex="-1" aria-labelledby="{{ $playlist->slug }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="{{ $playlist->slug }}Label">Hapus Playlist {{ $playlist->name }}</h1>
                                        <button type="button" class="btn-close btn btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin menghapus Playlist {{ $playlist->name }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('admin.playlist.delete',$playlist->id) }}" method="post" class="d-inline-block m-2">
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
                    <td colspan="4" class="text-center">
                        <a href="{{ route('admin.playlist.create') }}" class="btn btn-primary">Tambahkan Playlist Baru</a>
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


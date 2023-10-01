@extends('layout.simple')
@section('title', 'Dashboard-Admin')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    @include('include.navbar.navadmin')
    <div class="my-4 row justify-content-between aligin-items-start">
        <div class="col-md-4 p-2">
            <a href="{{ route('admin.music.show') }}" class="card text-center p-2">
                <h4>Jumlah Lagu</h4>
                <h2 class="m-0">{{ $musics->count() }}</h2>
            </a>
        </div>
        <div class="col-md-4 p-2">
            <a href="{{ route('admin.genre.show') }}" class="card text-center p-2">
                <h4>Genre</h4>
                <h2 class="m-0">{{ $genres->count() }}</h2>
            </a>
        </div>
        <div class="col-md-4 p-2">
            <a href="{{ route('admin.artist.show') }}" class="card text-center p-2">
                <h4>Jumlah Penyanyi</h4>
                <h2 class="m-0">{{ $artists->count() }}</h2>
            </a>
        </div>
    </div>
    <h2>Lagu Paling <b>Sering Diputar</b></h2>
    <div class="table-responsive">
        <table class="table table-striped table-dark table-hover table-borderless ">
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
                @foreach ($popular as $music)
                <tr>
                    <td>{{ $music->title }}</td>
                    <td class="text-center">{{ $music->artist->name }}</td>
                    <td class="text-center">{{ $music->genre->name }}</td>
                    <td class="text-center">{{ $music->log }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.music.edit',$music->slug) }}" class="btn btn-primary m-2">
                            <i class="bi bi-pencil"></i>
                        </a>
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
                                        <form action="{{ route('admin.music.delete',$music->id) }}" method="post" class="d-inline-block m-2">
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
            </tbody>
        </table>
    </div>

    <h2>Lagu <b>Jarang Diputar</b></h2>
    <div class="table-responsive">
        <table class="table table-striped table-dark table-hover table-borderless ">
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
                @foreach ($unpopular as $music)
                <tr>
                    <td>{{ $music->title }}</td>
                    <td class="text-center">{{ $music->artist->name }}</td>
                    <td class="text-center">{{ $music->genre->name }}</td>
                    <td class="text-center">{{ $music->log }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.music.edit',$music->slug) }}" class="btn btn-primary m-2">
                            <i class="bi bi-pencil"></i>
                        </a>
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
                                        <form action="{{ route('admin.music.delete',$music->id) }}" method="post" class="d-inline-block m-2">
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
            </tbody>
        </table>
    </div>
</main>
@endsection


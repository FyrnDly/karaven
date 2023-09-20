@extends('layout.app')

{{-- title --}}
@section('title','Beranda')

{{-- add style landing page --}}
@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

{{-- Content --}}
@section('content')
<main class="container">
    <!-- content card music -->
    @include('include.navbar.navside')

    <h2>Lagu Paling <b>Sering Diputar</b></h2>
    <div class="row justify-content-between">
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="play.html">
                    <img src="assets/image/takane-no-nadeshiko.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="play.html" class="w-100">
                        <h4>Kawaikute Gomen</h4>
                    </a>
                    <p>
                        <a href="#"><b>Takane No Nadeshiko</b></a> |
                        <a href="#">JPOP</a> |
                        <a href="#">Wibu</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <h2>Lagu Baru <b>Ditambahkan</b></h2>
    <div class="row justify-content-between">
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <div class="card card-lagu">
                <a href="#lagu">
                    <img src="assets/image/music.jpg" alt="Gambar Lagu">
                </a>
                <div class="text w-100">
                    <a href="#lagu" class="w-100">
                        <h4>Judul Lagu</h4>
                    </a>
                    <p>
                        <a href="#"><b>Nama Penyanyi</b></a> |
                        <a href="#">Nama Genre</a> |
                        <a href="#">Nama Playlist</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex">
        <a href="#" class="mx-auto btn btn-white">Tampilkan Lagu Lainnya</a>
    </div>
</main>
@endsection


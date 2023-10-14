@extends('layout.simple')
@section('title', 'Daftar Lagu-Admin')

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
	    <p>Music <b>{{ session('music')->title }}</b> berhasil ditambahkan</p>
	</div>
	@endif
	@if (session('status') === 'update')
	<div class="success-feedback" role="alert">
	    <p>Music <b>{{ session('music')->title }}</b> berhasil diperbarui</p>
	</div>
	@endif
	@if (session('status') === 'destroy')
	<div class="invalid-feedback d-block" role="alert">
	    <p>Music <b>{{ session('music')->title; }}</b> berhasil dihapus</p>
	</div>
	@endif

	<div class="row justify-content-between gap-2 mt-4">
        <div class="col">
            <input type="text" id="filterInput" placeholder="Cari cepat..." class="filter">
        </div>
        <div class="col text-md-end">
            <a href="{{ route('admin.music.create') }}" class="btn btn-primary">Tambah Lagu Baru</a>
        </div>
    </div>
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
		        @if (count($musics)!=0)
		        @foreach ($musics as $music)
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
		        @else
		        <tr>
		            <td colspan="4" class="text-center">
		                <a href="{{ route('admin.music.create') }}" class="btn btn-primary">Tambahkan Lagu Baru</a>
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

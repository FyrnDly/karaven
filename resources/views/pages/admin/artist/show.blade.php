@extends('layout.simple')
@section('title', 'Daftar Pennyanyi-Admin')

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
		<p>Artist <b>{{ session('artist')->name }}</b> berhasil ditambahkan</p>
	</div>
	@endif
	@if (session('status') === 'update')
	<div class="success-feedback" role="alert">
		<p>Artist <b>{{ session('artist')->name }}</b> berhasil diperbarui</p>
	</div>
	@endif
	@if (session('status') === 'destroy')
	<div class="invalid-feedback d-block" role="alert">
		<p>Artist <b>{{ session('artist')->name; }}</b> berhasil dihapus</p>
	</div>
	@endif

    <div class="row justify-content-between gap-2 mt-4">
        <div class="col">
            <input type="text" id="filterInput" placeholder="Cari cepat..." class="filter">
        </div>
        <div class="col text-md-end">
            <a href="{{ route('admin.artist.create') }}" class="btn btn-primary">Tambah Penyanyi Baru</a>
        </div>
    </div>
    <div class="table-responsive">
		<table class="table table-striped table-dark table-hover table-borderless ">
		    <thead>
		        <tr class="text-center">
		            <th scope="col">Nama Penyanyi</th>
		            <th scope="col">Gambar</th>
		            <th scope="col"></th>
		        </tr>
		    </thead>
		    <tbody>
		        @if (count($artists)!=0)
		        @foreach ($artists as $artist)
		        <tr>
		            <td>{{ $artist->name }}</td>
		            <td class="text-center">
		                @if($artist->thumbnail)
		                <img src="{{ $artist->thumbnail }}" alt="{{ $artist->name }}" width="50px" height="50px">
		                @endif
		            </td>
		            <td class="text-center">
		                <a href="{{ route('admin.artist.edit',$artist->slug) }}" class="btn btn-primary d-inline-block m-2">
		                    <i class="bi bi-pencil"></i>
		                </a>
		                <button type="button" class="btn btn-black outline" data-bs-toggle="modal" data-bs-target="#{{ $artist->slug }}">
		                    <i class="bi bi-trash2"></i>
		                </button>

		                <div class="modal fade" id="{{ $artist->slug }}" tabindex="-1" aria-labelledby="{{ $artist->slug }}Label" aria-hidden="true">
		                    <div class="modal-dialog">
		                        <div class="modal-content">
		                            <div class="modal-header">
		                                <h1 class="modal-title fs-5" id="{{ $artist->slug }}Label">Hapus Penyanyi {{ $artist->name }}</h1>
		                                <button type="button" class="btn-close btn btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
		                            </div>
		                            <div class="modal-body">
		                                Apakah anda yakin ingin menghapus penyanyi {{ $artist->name }}
		                                <br>
		                                Perlu Diingat Menghapus Penyanyi, <b>maka menghapus lagunya juga</b>
		                            </div>
		                            <div class="modal-footer">
		                                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
		                                <form action="{{ route('admin.artist.delete',$artist->id) }}" method="post" class="d-inline-block m-2">
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
		                <a href="{{ route('admin.artist.create') }}" class="btn btn-primary">Tambahkan Penyanyi Baru</a>
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

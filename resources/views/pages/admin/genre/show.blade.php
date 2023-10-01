@extends('layout.simple')
@section('title', 'Daftar Gnere-Admin')

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/landing-page/style.css') }}">
@endpush

@push('add-style')
<link rel="stylesheet" href="{{ url('user/style/admin/style.css') }}">
@endpush

@section('content')
<main class="container">
    @include('include.navbar.navadmin')
    <div class="row justify-content-between gap-2 mt-4">
        <div class="col">
            <input type="text" id="filterInput" placeholder="Cari cepat..." class="filter">
        </div>
        <div class="col text-md-end">
            <a href="{{ route('admin.genre.create') }}" class="btn btn-primary">Tambah Genre Baru</a>
        </div>
    </div>
    <div class="table-responsive">
		<table class="table table-striped table-dark table-hover table-borderless ">
		    <thead>
		        <tr class="text-center">
		            <th scope="col">Genre</th>
		            <th scope="col">Gambar</th>
		            <th scope="col"></th>
		        </tr>
		    </thead>
		    <tbody>
		        @if (count($genres)!=0)
		        @foreach ($genres as $genre)
		        <tr>
		            <td>{{ $genre->name }}</td>
		            <td class="text-center">
		                @if($genre->thumbnail)
		                <img src="{{ $genre->thumbnail }}" alt="{{ $genre->name }}" width="50px" height="40px">
		                @endif
		            </td>
		            <td class="text-center">
		                <a href="{{ route('admin.genre.edit',$genre->slug) }}" class="btn btn-primary d-inline-block m-2">
		                    <i class="bi bi-pencil"></i>
		                </a>
		                <button type="button" class="btn btn-black outline" data-bs-toggle="modal" data-bs-target="#{{ $genre->slug }}">
		                    <i class="bi bi-trash2"></i>
		                </button>

		                <div class="modal fade" id="{{ $genre->slug }}" tabindex="-1" aria-labelledby="{{ $genre->slug }}Label" aria-hidden="true">
		                    <div class="modal-dialog">
		                        <div class="modal-content">
		                            <div class="modal-header">
		                                <h1 class="modal-title fs-5" id="{{ $genre->slug }}Label">Hapus Genre {{ $genre->name }}</h1>
		                                <button type="button" class="btn-close btn btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
		                            </div>
		                            <div class="modal-body">
		                                Apakah anda yakin ingin menghapus Genre {{ $genre->name }}
		                                <br>
		                                Perlu Diingat Menghapus {{ $genre->name }}, <b>maka menghapus lagu didalamnya juga</b>
		                            </div>
		                            <div class="modal-footer">
		                                <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
		                                <form action="{{ route('admin.genre.delete',$genre->id) }}" method="post" class="d-inline-block m-2">
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
		                <a href="{{ route('admin.genre.create') }}" class="btn btn-primary">Tambahkan Genre Baru</a>
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

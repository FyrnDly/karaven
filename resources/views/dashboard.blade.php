@extends('layout.simple')
@section('title', 'Dashboard')
@section('content')
<main class="container">
    <div class="table-responsive mt-5">
        @if (session('status') === 'update')
        <div class="success-feedback" role="alert">
            <p>Status user <b>{{ session('user')->name }}</b> berhasil berubah menjadi <b>{{ session('user')->role }}</b></p>
        </div>
        @endif
        @if (session('status') === 'remove')
        <div class="success-feedback" role="alert">
            <p>User <b>{{ session('user')->name }}</b> berhasil dihapus</b></p>
        </div>
        @endif
        <table class="table table-striped table-dark table-hover table-borderless">
            <thead>
                <tr class="text-center">
                    <th scope="col">Nama User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Status</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @if (count($users)!=0)
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td class="text-center">{{ $user->email }}</td>
                    <td class="text-center">{{ $user->role }}</td>
                    <td class="text-center">
                        <!-- Button trigger access -->
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal{{ $user->id }}"><i class="bi bi-arrow-clockwise"></i></button>

                        <!-- Modal access -->
                        <div class="modal fade" id="modal{{ $user->id }}" tabindex="-1" aria-labelledby="modal{{ $user->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modal{{ $user->id }}Label">Ubah Status {{ $user->name }}</h1>
                                        <button type="button" class="btn-close btn btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin ingin mengubah status {{ $user->name }} menjadi @if($user->role == 'admin') <b>user atau lepas status admin</b>@else <b>admin</b>@endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-white" data-bs-dismiss="modal">Batal</button>
                                        <form action="{{ route('dashboard.update',$user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Ubah</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Button trigger remove -->
                        <button type="button" class="btn btn-black outline" data-bs-toggle="modal" data-bs-target="#modalRemove{{ $user->id }}"><i class="bi bi-trash3"></i></button>

                        <!-- Modal remove -->
                        <div class="modal fade" id="modalRemove{{ $user->id }}" tabindex="-1" aria-labelledby="modalRemove{{ $user->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalRemove{{ $user->id }}Label">Hapus User {{ $user->name }}</h1>
                                        <button type="button" class="btn-close btn btn-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah anda yakin menghapus user {{ $user->name }}. <b>User yang dihapus tidak dapat dipulihkan</b>
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{ route('dashboard.delete',$user->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Hapus</button>

                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
					</td>
				</tr>
				@endforeach
				@else
				<tr>
					<td colspan="4" class="text-center">Tidak Ada User Terdaftar</td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</main>
@endsection
